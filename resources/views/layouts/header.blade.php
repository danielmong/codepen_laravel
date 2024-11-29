<div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow">
    <!-- Primary Navigation Menu -->
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
                <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <span class="font-black text-2xl cursor-pointer text-black">Codepen</span>
                </a>
            </div>

            <!-- Settings Dropdown -->
            <div class="group flex items-center ms-6 relative">
                <div class="flex items-center">
                    <div class="rounded-full border bg-purple-700 text-white w-9 h-9 flex items-center justify-center">
                        <span>A</span>
                    </div>
                    <button class="inline-flex items-center px-1 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </div>

                <div class="hidden absolute top-14 group-hover:block">
                    <div class="flex flex-col rounded bg-white shadow-md py-3 w-24">
                        <a href="route('profile.edit')" class="hover:bg-gray-100 px-4 rounded py-1 text-sm">
                            {{ __('Profile') }}
                        </a>
                        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" class="hover:bg-gray-100 px-4 rounded py-1">
                            @csrf
                            <a href="route('logout')"
                                class="text-sm"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
