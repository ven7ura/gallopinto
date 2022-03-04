<nav x-data="{ navOpen: false }" class="bg-white shadow-lg dark:bg-slate-700">
    <div class="max-w-screen-lg mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button @click="navOpen = !navOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <!--
                    Icon when menu is closed.

                    Heroicon name: outline/menu

                    Menu open: "hidden", Menu closed: "block"
                -->
                <svg x-cloak x-show="!navOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <!--
                    Icon when menu is open.

                    Heroicon name: outline/x

                    Menu open: "block", Menu closed: "hidden"
                -->
                <svg x-cloak x-show="navOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('page.home') }}">
                        <img class="block lg:hidden h-10 w-auto" src="{{ asset('img/gp.svg') }}" alt="GalloPinto">
                        <img class="hidden lg:block h-10 w-auto" src="{{ asset('img/gp.svg')}}" alt="GalloPinto">
                    </a>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('page.project.list') }}" class="{{ (request()->routeIs('page.project*')) ? 'bg-gray-700 text-white dark:bg-slate-800' : 'text-gray-900 hover:bg-slate-800 hover:text-white dark:text-white dark:hover:text-orange-300' }} px-3 py-2 rounded-md text-sm font-medium">Proyectos</a>
                            <a href="#" class="{{ (request()->routeIs('page.contact')) ? 'bg-gray-700 text-white' : 'text-gray-900 hover:bg-slate-800 hover:text-white dark:text-white dark:hover:text-orange-300' }} px-3 py-2 rounded-md text-sm font-medium">Contacto</a>
                            <button
                                x-data="{
                                    toggleTheme: () => {
                                        if (localStorage.theme === 'dark') {
                                            localStorage.theme = 'light';
                                            document.documentElement.classList.remove('dark');
                                        } else {
                                            localStorage.theme = 'dark';
                                            document.documentElement.classList.add('dark');
                                        }
                                    },
                                    isDark: localStorage.theme === 'dark',
                                }"
                                class="text-gray-900 hover:bg-slate-800 hover:text-white dark:text-white dark:hover:text-orange-300 dark:hover:bg-slate-800 px-3 py-2 rounded-md text-sm font-medium"
                                x-on:click="toggleTheme()"
                            >
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-cloak x-show="navOpen" class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('page.home') }}" class="{{ (request()->routeIs('page.home')) ? 'bg-slate-700 text-white block dark:bg-slate-800' : 'text-gray-900 hover:bg-gray-700 hover:text-white dark:hover:bg-slate-900' }} block px-3 py-2 rounded-md text-base font-medium">Inicio</a>
            <a href="{{ route('page.project.list') }}" class="{{ (request()->routeIs('page.project.*')) ? 'bg-gray-700 text-white block dark:bg-slate-800' : 'text-gray-900 hover:bg-gray-700 hover:text-white dark:hover:bg-slate-900' }} block px-3 py-2 rounded-md text-base font-medium">Proyectos</a>
            <a href="#" class="{{ (request()->routeIs('page.contact')) ? 'bg-gray-700 text-white block dark:bg-slate-800' : 'text-gray-900 hover:bg-gray-700 hover:text-white dark:hover:bg-slate-900' }} block px-3 py-2 rounded-md text-base font-medium">Contacto</a>
        </div>
    </div>
</nav>