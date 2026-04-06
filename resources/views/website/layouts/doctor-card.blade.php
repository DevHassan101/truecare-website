@forelse ($doctors as $doctor)
    <div class="w-full flex flex-col md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] overflow-hidden shadow-xl">
        <div class="w-full md:h-[20vw] sm:h-[35vw] xs:h-[75vw] relative">
            <img src="{{ asset($doctor->profile_image) }}" alt="" class="object-cover w-full h-full" />
            <div
                class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full px-2 bg-theme-blue text-white absolute top-5 right-5 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                ${{ $doctor->appointment_fees }}
            </div>
        </div>
        <div class="md:p-[1vw] sm:p-[2vw] xs:p-[3vw]">
            <!-- Rattings -->
            <div class="flex items-center gap-2">
                <div class="flex items-center gap-1">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= round($doctor->ratings['average']))
                            <i class="fa-solid fa-star text-yellow-400"></i>
                        @else
                            <i class="fa-regular fa-star text-gray-400"></i>
                        @endif
                    @endfor
                </div>

                <p class="py-0.5 px-3 bg-theme-blue rounded-full md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw]">
                    {{ $doctor->ratings['average'] }}
                </p>
            </div>
            <div class="flex flex-col w-full py-2">
                <h2 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                    {{ $doctor->name }}
                </h2>
                <p class="md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw] text-gray-500">
                    {{ $doctor->qualifications }} - {{ $doctor->specialization }}
                </p>
            </div>
            <div class="flex items-center justify-between w-full py-2 text-gray-500">
                <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                    <i class="fa-solid fa-location-dot text-theme-blue"></i>
                    <p>{{ $doctor->state?->name }} - {{ $doctor->country?->name }}</p>
                </div>
            </div>
            <div class="flex items-center w-full gap-2 py-3 border-t border-gray-400">
                <a href="{{ route('doctor.details', ['username' => $doctor->uid]) }}"
                    class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white hover:text-theme-blue bg-theme-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-blue hover:bg-transparent">
                    View Profile
                </a>
                <a href="{{ route('patient.book-appointment', ['username' => $doctor->uid]) }}"
                    class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-navi-blue hover:text-[#041e42] md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-navi-blue hover:bg-transparent">
                    Book Now
                </a>
            </div>
        </div>
    </div>

@empty
@endforelse
