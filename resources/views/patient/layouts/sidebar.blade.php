<!-- Patient Sidebar -->
<aside class="col-span-3 sticky top-24 h-full">
    <!-- Profile Card -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm  overflow-hidden h-full">
        <!-- Banner Background -->
        <div class="h-40 bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#312E81] relative">
            <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <!-- Profile Image -->
        <div class="relative -mt-16 flex justify-center">
            <div class="w-32 h-32 rounded-full overflow-hidden ring-5 ring-white shadow-lg">
                <img src="{{ asset(auth()->user()->profile_image ?? 'website/images/oppointmens/doctor.jpg') }}" 
                     class="w-full h-full object-cover" 
                     alt="{{ auth()->user()->name }}" />
            </div>
        </div>

        <!-- Profile Info -->
        <div class="px-5 pt-4 pb-6 text-center">
            <h3 class="text-2xl font-bold text-[#312E81] mb-2">
                {{ auth()->user()->name }}
            </h3>
            
            <!-- Patient Badge -->
            <div class="flex justify-center mb-2">
                <span class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#4F46E5]/10 to-[#EC4899]/10 border border-[#4F46E5]/20 rounded-full text-sm font-semibold text-[#312E81]">
                    <span class="w-2 h-2 bg-[#4F46E5] rounded-full"></span>
                    Patient
                </span>
            </div>
            
            <p class="text-gray-600 text-sm mb-1">
                Patient ID: {{ auth()->user()->uid }}
            </p>
            
            <!-- Gender & Age -->
            <div class="flex items-center justify-center gap-2 text-sm text-gray-600 mb-4">
                <span class="font-semibold capitalize">{{ auth()->user()->gender }}</span>
                <div class="w-1.5 h-1.5 rounded-full bg-[#4F46E5]"></div>
                <span>{{ auth()->user()->formatted_age }}</span>
            </div>

            <!-- Navigation Menu -->
            <div class="flex flex-col gap-2">
                <!-- Dashboard Link -->
                <a href="{{ route('patient.dashboard') }}"
                   class="{{ request()->is('patient/dashboard') ? 'bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white shadow-lg shadow-[#4F46E5]/30' : 'text-gray-700 hover:bg-[#F5F3FF]' }} flex items-center gap-3 px-5 py-3 rounded-lg font-semibold tracking-wide transition-all duration-300 group">
                    <iconify-icon icon="mage:dashboard-fill" width="22" height="22" class="{{ request()->is('patient/dashboard') ? 'text-white' : 'text-[#4F46E5]' }}"></iconify-icon>
                    <span>Dashboard</span>
                </a>

                <!-- My Appointments Link -->
                <a href="{{ route('patient.appointment.index') }}"
                   class="{{ request()->is('patient/appointments') ? 'bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white shadow-lg shadow-[#4F46E5]/30' : 'text-gray-700 hover:bg-[#F5F3FF]' }} flex items-center gap-3 px-5 py-3 rounded-lg font-semibold tracking-wide transition-all duration-300 group">
                    <iconify-icon icon="mage:calendar-plus-fill" width="22" height="22" class="{{ request()->is('patient/appointments') ? 'text-white' : 'text-[#4F46E5]' }}"></iconify-icon>
                    <span>My Appointments</span>
                </a>

                <!-- Profile Settings Link -->
                <a href="{{ route('patient.profile-settings.index') }}"
                   class="{{ request()->is('patient/profile-settings') ? 'bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white shadow-lg shadow-[#4F46E5]/30' : 'text-gray-700 hover:bg-[#F5F3FF]' }} flex items-center gap-3 px-5 py-3 rounded-lg font-semibold tracking-wide transition-all duration-300 group">
                    <iconify-icon icon="solar:settings-bold" width="22" height="22" class="{{ request()->is('patient/profile-settings') ? 'text-white' : 'text-[#4F46E5]' }}"></iconify-icon>
                    <span>Profile Settings</span>
                </a>

                <!-- Log Out Link -->
                <form action="{{ route('logout') }}" method="post" class="mt-2">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center gap-3 px-5 py-3 rounded-lg font-semibold text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-300 group">
                        <iconify-icon icon="garden:exit-fill-12" width="22" height="22" class="text-red-500"></iconify-icon>
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>