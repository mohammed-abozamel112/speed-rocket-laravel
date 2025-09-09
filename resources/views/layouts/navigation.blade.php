@php
    $isRtl = app()->getLocale() === 'ar';
@endphp

<nav x-data="{ open: false }" :dir="$isRtl ? 'rtl' : 'ltr'"
    class="bg-gradient-to-br from-[#FCF7F8] via-white to-red-50 w-full fixed z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div :class="{ 'flex-row-reverse': $isRtl, 'flex-row': !$isRtl }" class="flex justify-between h-16">
            <div class="flex gap-2">
                <div class="shrink-0 flex items-center h-12 w-12 justify-center">
                    <a href="{{ route('dashboard', ['lang' => app()->getLocale()]) }}">
                        <img src="{{ asset('storage/logo.png') }}" alt="">
                    </a>
                </div>

                <div class="hidden gap-3 sm:-my-px {{ $isRtl ? 'sm:me-10' : 'sm:ms-10' }} sm:flex">
                    <x-nav-link :href="route('dashboard', ['lang' => app()->getLocale()])" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('services.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('services.*')">
                        {{ __('Services') }}
                    </x-nav-link>
                    <x-nav-link :href="route('blogs.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('blogs.*')">
                        {{ __('Blogs') }}
                    </x-nav-link>
                    <x-nav-link :href="route('categories.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('categories.*')">
                        {{ __('Categories') }}
                    </x-nav-link>
                    <x-nav-link :href="route('clients.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('clients.*')">
                        {{ __('Clients') }}
                    </x-nav-link>
                    <x-nav-link :href="route('projects.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('projects.*')">
                        {{ __('Projects') }}
                    </x-nav-link>
                    <x-nav-link :href="route('reviews.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('reviews.*')">
                        {{ __('Reviews') }}
                    </x-nav-link>
                    <x-nav-link :href="route('images.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('images.*')">
                        {{ __('Images') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tags.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('tags.*')">
                        {{ __('Tags') }}
                    </x-nav-link>
                    <x-nav-link :href="route('about', ['lang' => app()->getLocale()])" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-nav-link>
                    <x-nav-link :href="route('contact.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('contact.*')">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center {{ $isRtl ? 'sm:me-6' : 'sm:ms-6' }} space-x-4">
                <x-dropdown align="right" width="32">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ strtoupper(app()->getLocale()) }}</div>
                            <div :class="$isRtl ? 'me-1' : 'ms-1'">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @php
                            // Explicitly define only English and Arabic
                            $locales = ['en' => 'English', 'ar' => 'العربية'];
                            $currentRoute = request()->route();
                            $currentRouteName = $currentRoute->getName();
                            $currentRouteParameters = $currentRoute->parameters();
                        @endphp
                        @foreach ($locales as $localeCode => $localeName)
                            @php
                                $params = array_merge($currentRouteParameters, ['lang' => $localeCode]);
                                try {
                                    $url = route($currentRouteName, $params);
                                } catch (\Exception $e) {
                                    // Fallback if the route doesn't support the 'lang' parameter for some reason
    $url = url('/' . $localeCode);
                                }
                            @endphp
                            <x-dropdown-link :href="$url" :active="$localeCode === app()->getLocale()">
                                {{ $localeName }}
                            </x-dropdown-link>
                        @endforeach
                    </x-slot>
                </x-dropdown>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div :class="$isRtl ? 'me-1' : 'ms-1'">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit', ['lang' => app()->getLocale()])">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout', ['lang' => app()->getLocale()]) }}">
                            @csrf
                            <x-dropdown-link :href="route('logout', ['lang' => app()->getLocale()])"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div :class="{ '-me-2': $isRtl, '-ms-2': !$isRtl }" class="flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard', ['lang' => app()->getLocale()])" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('services.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('services.*')">
                {{ __('Services') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('blogs.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('blogs.*')">
                {{ __('Blogs') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('categories.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('categories.*')">
                {{ __('Categories') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('clients.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('clients.*')">
                {{ __('Clients') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('projects.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('projects.*')">
                {{ __('Projects') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('reviews.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('reviews.*')">
                {{ __('Reviews') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('images.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('images.*')">
                {{ __('Images') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tags.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('tags.*')">
                {{ __('Tags') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about', ['lang' => app()->getLocale()])" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact.index', ['lang' => app()->getLocale()])" :active="request()->routeIs('contact.*')">
                {{ __('Contact') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit', ['lang' => app()->getLocale()])">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout', ['lang' => app()->getLocale()]) }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout', ['lang' => app()->getLocale()])" @click.prevent="event.target.closest('form').submit()">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
