<x-master-layout>
    <form method="POST" action="{{ route('register', ['lang' => app()->getLocale()]) }}">
        @csrf

        <!-- Name Arabic -->
        <div>
            <x-input-label for="name_ar" :value="__('Name (Arabic)')" />
            <x-text-input id="name_ar" class="block mt-1 w-full" type="text" name="name_ar" :value="old('name_ar')" required
                autofocus autocomplete="name_ar" />
            <x-input-error :messages="$errors->get('name_ar')" class="mt-2" />
        </div>

        <!-- Name English -->
        <div class="mt-4">
            <x-input-label for="name_en" :value="__('Name (English)')" />
            <x-text-input id="name_en" class="block mt-1 w-full" type="text" name="name_en" :value="old('name_en')"
                required autocomplete="name_en" />
            <x-input-error :messages="$errors->get('name_en')" class="mt-2" />
        </div>

        <!-- Role Arabic -->
        <div class="mt-4">
            <x-input-label for="role_ar" :value="__('Role (Arabic)')" />
            <select id="role_ar" name="role_ar" class="block mt-1 w-full" required>
                <option value="مسئول" {{ old('role_ar') == 'مسئول' ? 'selected' : '' }}>مسئول</option>
                <option value="عميل" {{ old('role_ar') == 'عميل' ? 'selected' : '' }}>عميل</option>
                <option value="ضيف" {{ old('role_ar') == 'ضيف' ? 'selected' : '' }}>ضيف</option>
            </select>
            <x-input-error :messages="$errors->get('role_ar')" class="mt-2" />
        </div>

        <!-- Role English -->
        <div class="mt-4">
            <x-input-label for="role_en" :value="__('Role (English)')" />
            <select id="role_en" name="role_en" class="block mt-1 w-full" required>
                <option value="admin" {{ old('role_en') == 'admin' ? 'selected' : '' }}>admin</option>
                <option value="client" {{ old('role_en') == 'client' ? 'selected' : '' }}>client</option>
                <option value="guest" {{ old('role_en') == 'guest' ? 'selected' : '' }}>guest</option>
            </select>
            <x-input-error :messages="$errors->get('role_en')" class="mt-2" />
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const roleArSelect = document.getElementById('role_ar');
                const roleEnSelect = document.getElementById('role_en');

                const roleMap = {
                    'مسئول': 'admin',
                    'عميل': 'client',
                    'ضيف': 'guest',
                    'admin': 'مسئول',
                    'client': 'عميل',
                    'guest': 'ضيف'
                };

                roleArSelect.addEventListener('change', function() {
                    const selectedAr = roleArSelect.value;
                    const correspondingEn = roleMap[selectedAr];
                    if (roleEnSelect.value !== correspondingEn) {
                        roleEnSelect.value = correspondingEn;
                    }
                });

                roleEnSelect.addEventListener('change', function() {
                    const selectedEn = roleEnSelect.value;
                    const correspondingAr = roleMap[selectedEn];
                    if (roleArSelect.value !== correspondingAr) {
                        roleArSelect.value = correspondingAr;
                    }
                });
            });
        </script>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login', ['lang' => app()->getLocale()]) }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-master-layout>
