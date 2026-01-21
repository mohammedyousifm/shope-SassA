@extends('clients.layouts.app')

@section('title', 'نقطه ويب سيرفر - شحن الألعاب')

@section('contain')

    <div class="min-h-screen  rounded-2xl p-4">

        {{-- Tabs --}}
        <div class="flex justify-start gap-2 mb-6 text-sm">

            <button id="tab-info" type="button"
                class="tab-btn flex items-center gap-1 px-4 py-2 rounded-lg
                                                                                                                                                                                                                                                                                                                                           bg-gradient-to-b from-teal-500 to-teal-600 text-white">
                شحن عبر 🆔
            </button>

            <button id="tab-edit" type="button"
                class="tab-btn flex items-center gap-1 px-4 py-2 rounded-lg
                                                                                                                                                                                                                                                                                                                                           bg-white text-teal-600 shadow">
                شراء بطاقات الألعاب
                <i class="fa-solid fa-list"></i>
            </button>

        </div>



        {{-- Profile Info (افتراضي) --}}
        <div id="games-select">
            @include('clients.models.games-select')
            @include('clients.models.orders')
        </div>

        {{-- Profile Edit --}}
        <div id="games-orders" class="hidden">
            @include('clients.models.gift-cards-select')
            @include('clients.models.gift-cards-orders')
        </div>
    </div>

    <script>
        const tabInfo = document.getElementById('tab-info');
        const tabEdit = document.getElementById('tab-edit');

        const profileInfo = document.getElementById('games-select');
        const profileEdit = document.getElementById('games-orders');

        const STORAGE_KEY = 'active_games_tab';

        function activateTab(activeBtn, inactiveBtn) {
            activeBtn.classList.remove('bg-white', 'text-teal-600', 'shadow');
            activeBtn.classList.add(
                'bg-gradient-to-b',
                'from-teal-500',
                'to-teal-600',
                'text-white'
            );

            inactiveBtn.classList.remove(
                'bg-gradient-to-b',
                'from-teal-500',
                'to-teal-600',
                'text-white'
            );
            inactiveBtn.classList.add('bg-white', 'text-teal-600', 'shadow');
        }

        function showInfoTab(save = true) {
            profileInfo.classList.remove('hidden');
            profileEdit.classList.add('hidden');
            activateTab(tabInfo, tabEdit);

            if (save) localStorage.setItem(STORAGE_KEY, 'info');
        }

        function showEditTab(save = true) {
            profileEdit.classList.remove('hidden');
            profileInfo.classList.add('hidden');
            activateTab(tabEdit, tabInfo);

            if (save) localStorage.setItem(STORAGE_KEY, 'edit');
        }

        // Click handlers
        tabInfo.addEventListener('click', () => showInfoTab(true));
        tabEdit.addEventListener('click', () => showEditTab(true));

        // Restore tab on page load
        document.addEventListener('DOMContentLoaded', () => {
            const savedTab = localStorage.getItem(STORAGE_KEY);

            if (savedTab === 'edit') {
                showEditTab(false);
            } else {
                showInfoTab(false); // default
            }
        });
    </script>


    <script>
        /**
         * Generic handler for game/package select
         *
         * @param {string} gameSelectId
         * @param {string} packageSelectId
         * @param {string|null} noPackagesAlertId
         * @param {Function} labelBuilder
         */
        function initGamePackageSelect(
            gameSelectId,
            packageSelectId,
            noPackagesAlertId = null,
            labelBuilder
        ) {
            const gameSelect = document.getElementById(gameSelectId);
            const packageSelect = document.getElementById(packageSelectId);
            const noPackagesAlert = noPackagesAlertId
                ? document.getElementById(noPackagesAlertId)
                : null;

            if (!gameSelect || !packageSelect) return;

            gameSelect.addEventListener('change', function () {

                // reset
                packageSelect.innerHTML = '';
                packageSelect.disabled = true;

                if (noPackagesAlert) {
                    noPackagesAlert.classList.add('hidden');
                }

                const selectedOption = this.options[this.selectedIndex];
                if (!selectedOption?.dataset.packages) {
                    addEmptyOption(packageSelect);
                    return;
                }

                let packages = [];
                try {
                    packages = JSON.parse(selectedOption.dataset.packages);
                } catch {
                    addEmptyOption(packageSelect);
                    return;
                }

                if (!Array.isArray(packages) || packages.length === 0) {
                    if (noPackagesAlert) {
                        noPackagesAlert.classList.remove('hidden');
                    } else {
                        addNoPackagesOption(packageSelect);
                    }
                    return;
                }

                // default option
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'اختر الباقة';
                defaultOption.disabled = true;
                defaultOption.selected = true;
                packageSelect.appendChild(defaultOption);

                // fill packages
                packages.forEach(pkg => {
                    const option = document.createElement('option');
                    option.value = pkg.id;
                    option.textContent = labelBuilder(pkg);
                    packageSelect.appendChild(option);
                });

                packageSelect.disabled = false;
            });
        }

        function addNoPackagesOption(select) {
            const option = document.createElement('option');
            option.value = '';
            option.textContent = 'لا توجد باقات متاحة لهذه اللعبة';
            option.disabled = true;
            option.selected = true;
            select.appendChild(option);
        }

        function addEmptyOption(select) {
            const option = document.createElement('option');
            option.value = '';
            option.textContent = 'اختر الباقة';
            option.disabled = true;
            option.selected = true;
            select.appendChild(option);
        }

        /* ===============================
           INIT – FIRST SELECT (Packages)
        ================================ */
        initGamePackageSelect(
            'game-select',
            'package-select',
            null,
            pkg => `${pkg.name} - ${parseInt(pkg.price)} ج.س`
        );

        /* ===============================
           INIT – SECOND SELECT (GiftCards)
        ================================ */
        initGamePackageSelect(
            'game-card-select',
            'package-card-select',
            'no-packages-card-alert',
            pkg => `${pkg.value}$ - ${parseInt(pkg.price)} ج.س`
        );
    </script>


@endsection