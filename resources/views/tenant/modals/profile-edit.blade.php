<div class="bg-white rounded-2xl shadow p-6 mb-8">
    <div class="flex items-center gap-3 mb-4">
        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-teal-500 text-white">
            <i class="fa-solid fa-user"></i>
        </div>
        <div>
            <h2 class="font-bold text-gray-800 text-sm">تعديل البيانات الشخصية</h2>
            <p class="text-xs text-gray-500">قم بتحديث معلوماتك الشخصية</p>
        </div>
    </div>


    <form action="{{ route('home.profile.update') }}" method="post">
        @csrf
        @method('patch')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

            <div>
                <label class="block mb-1 text-gray-600">اسم المستخدم</label>
                <input type="text" name="name" value="{{ $user->name }}"
                    class="w-full rounded-lg border border-gray-200 bg-teal-50 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>

            <div>
                <label class="block mb-1 text-gray-600">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ $user->email }}"
                    class="w-full rounded-lg border border-gray-200 bg-teal-50 px-3 py-2">
            </div>

            <div class="md:col-span-2">
                <label class="block mb-1 text-gray-600">رقم الهاتف</label>
                <input type="text" name="phone" value="{{ $user->phone }}"
                    class="w-full rounded-lg border border-gray-200 bg-teal-50 px-3 py-2">
            </div>

        </div>
        <button type="submit"
            class="mt-6 w-full bg-gradient-to-r from-teal-500 to-green-500 text-white py-2 rounded-lg text-sm font-semibold hover:opacity-90">
            حفظ التعديلات
        </button>
    </form>
</div>


<div class="bg-white rounded-2xl shadow p-6">
    <div class="flex items-center gap-3 mb-4">
        <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-yellow-500 text-white">
            <i class="fa-solid fa-shield-halved"></i>
        </div>
        <div>
            <h2 class="font-bold text-gray-800 text-sm">إعدادات الأمان</h2>
            <p class="text-xs text-gray-500">قم بتغيير كلمة المرور للحفاظ على أمان حسابك</p>
        </div>
    </div>

    <div class="space-y-4 text-sm">
        <form action="{{ route('home.profile.password') }}" method="post">
            @csrf
            @method('patch')
            <div>
                <label class="block mb-1 text-gray-600">كلمة المرور الحالية</label>
                <input type="password" name="current_password"
                    class="w-full rounded-lg border border-gray-200 bg-teal-50 px-3 py-2">
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block mb-1 text-gray-600">كلمة المرور الجديدة</label>
                    <input type="password" name="password"
                        class="w-full rounded-lg border border-gray-200 bg-teal-50 px-3 py-2">
                </div>
            </div>
    </div>

    <button
        class="mt-6 w-full bg-gradient-to-r from-yellow-400 to-orange-500 text-white py-2 rounded-lg text-sm font-semibold hover:opacity-90">
        تحديث كلمة المرور
    </button>
    </form>
</div>
