<header class="relative isolate z-10 bg-white" x-data="{ openMenu: false, openProductSubMenu: false }">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5 flex flex-row items-center">
                <img class="h-10" src="{{ asset('img/logo.png') }}">
                <span class="ml-2 font-bold font-serif">storyduo</span>
            </a>
        </div>
        <div class="flex lg:hidden">
            <button @click="openMenu = !openMenu" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg x-show="!openMenu" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div x-data="{ openDropdown: false }" class="hidden lg:flex lg:gap-x-12">
            <div>
                <button @click="openDropdown = !openDropdown" type="button" class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900" aria-expanded="false">
                    Pick a Language
                    <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-cloak x-show="openDropdown" class="absolute inset-x-0 top-0 -z-10 bg-white pt-14 shadow-lg ring-1 ring-gray-900/5 transition ease-out duration-200" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1">
                    @if(isset($languages) && count($languages) > 0)
                    <div class="mx-auto grid max-w-7xl grid-cols-6 gap-4 px-6 py-10 lg:px-8 xl:gap-8">
                        @foreach($languages as $language)
                        <div class="group relative rounded-lg p-6 text-sm leading-6 hover:bg-gray-50 flex flex-row items-center">
                            <img src="{{ asset('img/languages/square/' . $language->flag_code . '.png') }}" class="h-6 w-6 rounded-full">
                            <div class="ml-3">
                                <a href="{{ route('stories.index', $language) }}" class="font-semibold text-gray-900 group-hover:text-primary-600">
                                    {{ $language->name }}
                                    <span class="absolute inset-0"></span>
                                </a>
                                <p class="text-gray-600 text-xs">{{ $language->stories_count }} stories</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="bg-gray-50">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <div class="grid grid-cols-3 divide-x divide-gray-900/5 border-x border-gray-900/5">
                                <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                    Contribute
                                </a>
                                <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                    Find a teacher
                                </a>
                                <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                    View all languages
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('contributions.create') }}" class="text-sm font-semibold leading-6 text-gray-900">Write your Story</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center">
            @if (Route::has('login'))
                @auth
                    <div x-data="{ open: false }" class="relative ml-3">
                        <div>
                            <button @click="open = !open" type="button" class="relative flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
                        </div>


                        <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-muted mr-2">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div x-show="openMenu" class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <x-logo class="w-auto h-8 text-primary-600" />
                </a>
                <button @click="openMenu = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        @if(isset($languages) && count($languages) > 0)
                        <div x-data="{ openDropdown: false }" class="-mx-3">
                            <button @click="openDropdown = !openDropdown" type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                                Pick a Language
                                <svg class="h-5 w-5 flex-none" :class="{ 'rotate-180': openDropdown }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <!-- 'Product' sub-menu, show/hide based on menu state. -->
                            <div x-show="openDropdown" class="mt-2 space-y-2" id="disclosure-1">
                                @foreach($languages as $language)
                                    <a href="{{ route('stories.index', $language) }}" class="block rounded-lg py-2 pl-6 pr-3 hover:bg-gray-50 flex flex-row">
                                        <img src="{{ asset('img/languages/square/' . $language->flag_code . '.png') }}" class="h-6 w-6 rounded-full">
                                        <span class="ml-2 text-sm font-semibold leading-7 text-gray-900">{{ $language->name }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <a href="{{ route('contributions.create') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Write a Story</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Stories</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Vocabulary</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Find a Teacher</a>
                    </div>
                    <div class="py-6 space-y-2">
                        @if (Route::has('login'))
                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full btn btn-muted">
                                        <span>Sign out</span>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="block btn btn-muted">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block btn btn-primary">Register</a>
                                @endif
                            @endauth
                        @endif
                        <!-- <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
