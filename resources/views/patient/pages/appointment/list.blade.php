@forelse ($appointments as $appointment)
    <div class="w-full bg-white border-2 border-gray-200 rounded-2xl p-6 hover:border-[#4F46E5] hover:shadow-lg transition-all duration-300">
        <div class="flex items-center justify-between gap-6 flex-wrap">
            
            <!-- Doctor Info Section -->
            <div class="flex items-center gap-4 min-w-[200px]">
                <div class="w-16 h-16 overflow-hidden rounded-xl border-2 border-gray-100 flex-shrink-0">
                    <img src="{{ asset($appointment->doctor->profile_image) }}"
                        class="w-full h-full object-cover" 
                        alt="{{ $appointment->doctor?->name ?? 'Doctor' }}" />
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-sm font-semibold text-gray-500">#{{ $appointment->id * 1 }}</span>
                    </div>
                    <h4 class="font-bold text-lg text-[#312E81]">{{ $appointment->doctor?->name ?? 'N/A' }}</h4>
                </div>
            </div>

            <!-- Date & Time Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center gap-2 text-gray-600">
                    <iconify-icon icon="mdi:calendar-outline" width="18" height="18" class="text-[#4F46E5]"></iconify-icon>
                    <span class="font-medium">{{ date('d M Y', strtotime($appointment->date)) }}</span>
                </div>
                <div class="flex items-center gap-2 text-gray-600">
                    <iconify-icon icon="mdi:clock-outline" width="18" height="18" class="text-[#4F46E5]"></iconify-icon>
                    <span class="font-medium">{{ date('h:i A', strtotime($appointment->availableTiming->time)) }}</span>
                </div>
                
                <!-- Status Badge -->
                <div class="mt-1">
                    @if ($appointment->status == 'upcoming')
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white rounded-full text-sm font-semibold">
                            <iconify-icon icon="mdi:clock-outline" width="16" height="16"></iconify-icon>
                            Upcoming
                        </span>
                    @elseif($appointment->status == 'completed')
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-gradient-to-r from-[#EC4899] to-[#DB2777] text-white rounded-full text-sm font-semibold">
                            <iconify-icon icon="mdi:check-circle" width="16" height="16"></iconify-icon>
                            Completed
                        </span>
                    @elseif($appointment->status == 'cancelled')
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-red-100 text-red-700 rounded-full text-sm font-semibold border-2 border-red-200">
                            <iconify-icon icon="mdi:close-circle" width="16" height="16"></iconify-icon>
                            Cancelled
                        </span>
                    @elseif($appointment->status == 'started')
                        <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white rounded-full text-sm font-semibold animate-pulse">
                            <iconify-icon icon="mdi:play-circle" width="16" height="16"></iconify-icon>
                            Ongoing
                        </span>
                    @endif
                </div>
            </div>

            <!-- Contact Section -->
            <div class="flex flex-col gap-2 min-w-[220px]">
                <div class="flex items-center gap-2 text-gray-600">
                    <iconify-icon icon="mdi:email-outline" width="18" height="18" class="text-[#4F46E5]"></iconify-icon>
                    <span class="text-sm">{{ $appointment->doctor?->email ?? 'N/A' }}</span>
                </div>
                <div class="flex items-center gap-2 text-gray-600">
                    <iconify-icon icon="mdi:phone" width="18" height="18" class="text-[#4F46E5]"></iconify-icon>
                    <span class="text-sm">+{{ $appointment->doctor?->contact_number ?? 'N/A' }}</span>
                </div>
            </div>

            <!-- Action Button -->
            <div class="flex items-center gap-2">
                <a href="{{ route('patient.appointment.show', ['appointment' => $appointment]) }}"
                    class="group cursor-pointer w-12 h-12 rounded-xl flex items-center justify-center bg-gradient-to-br from-[#4F46E5] to-[#312E81] hover:shadow-lg hover:scale-110 transition-all duration-300">
                    <iconify-icon icon="mdi:eye-outline" width="24" height="24" class="text-white group-hover:scale-110 transition-transform"></iconify-icon>
                </a>
            </div>
            
        </div>

        <!-- Additional Info (Types & Services) -->
        @php
            $types = json_decode($appointment->types, true) ?? [];
            $services = json_decode($appointment->services, true) ?? [];
        @endphp
        
        @if(!empty($types) || !empty($services))
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex flex-wrap gap-2">
                    @foreach($types as $type)
                        <span class="px-3 py-1 bg-indigo-50 text-[#4F46E5] rounded-lg text-xs font-medium">
                            {{ $type }}
                        </span>
                    @endforeach
                    @foreach($services as $service)
                        <span class="px-3 py-1 bg-pink-50 text-[#EC4899] rounded-lg text-xs font-medium">
                            {{ $service }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@empty
    <div class="bg-white rounded-2xl border-2 border-gray-200 p-16 text-center">
        <div class="w-24 h-24 bg-gradient-to-br from-[#4F46E5]/10 to-[#312E81]/10 rounded-full flex items-center justify-center mx-auto mb-6">
            <iconify-icon icon="mdi:calendar-blank-outline" width="48" height="48" class="text-[#4F46E5]"></iconify-icon>
        </div>
        <h3 class="text-2xl font-bold text-[#312E81] mb-3">No Appointments Found</h3>
        <p class="text-gray-600 mb-8 max-w-md mx-auto">You don't have any appointments matching your search criteria. Start by booking your first appointment.</p>
        <a href="{{ route('patient.appointment.index') }}" 
           class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white font-semibold rounded-xl hover:shadow-xl hover:scale-105 transition-all duration-300">
            <iconify-icon icon="mdi:calendar-plus" width="22" height="22"></iconify-icon>
            Book New Appointment
        </a>
    </div>
@endforelse