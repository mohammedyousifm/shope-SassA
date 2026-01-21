<script>
    // Dropdown functionality
    document.querySelectorAll('button[aria-controls]').forEach(button => {
        button.addEventListener('click', () => {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';
            const dropdownContent = document.getElementById(button.getAttribute('aria-controls'));

            button.setAttribute('aria-expanded', !isExpanded);
            dropdownContent.classList.toggle('hidden');
            button.querySelector('svg:last-child').classList.toggle('rotate-180');
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.prevent-double-click').forEach(button => {

            button.addEventListener('click', function () {

                if (this.disabled) return;

                this.disabled = true;
                this.classList.add('opacity-60', 'cursor-not-allowed');

                // لو الزر داخل form → أرسل الفورم
                const form = this.closest('form');
                if (form) {
                    form.submit();
                }

            });
        });

    });
</script>