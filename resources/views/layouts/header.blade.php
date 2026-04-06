<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-[#0e82fd]">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <div class="flex items-center">
        <x-dropdown>
            <x-slot name="trigger">
                <button @click="dropdownOpen = ! dropdownOpen"
                    class="relative block  text-black overflow-hidden md:py-[0.4vw] md:block xs:hidden sm:py-[1.1vw] xs:py-[1.5vw] md:px-[2.9vw] sm:px-[2.9w] rounded-full md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-[#0e82fd] hover:bg-transparent">
                    {{ Auth::user()->name }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link href="{{ route('profile.edit') }}">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</header>
