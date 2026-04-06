@extends('website.layouts.app')
@section('content')
    <!-- Doctor Profile Details Section -->
    <section class="w-full bg-[#F5F3FF] py-20">
        <div class="max-w-[82rem] mx-auto bg-white border-2 border-[#4F46E5]/30 p-5 rounded-3xl">
            <section
                class="w-full bg-gradient-to-tl from-[#4F46E5] to-[#312E81] rounded-3xl py-8 mb-8 shadow-lg relative overflow-hidden">
                <!-- Decorative Background Elements -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
                    <div class="absolute bottom-10 right-10 w-40 h-40 bg-pink-300 rounded-full blur-3xl"></div>
                    <div class="absolute top-1/2 left-1/2 w-48 h-48 bg-purple-300 rounded-full blur-3xl"></div>
                </div>

                <div class="max-w-7xl mx-auto flex flex-col justify-center items-center px-6 relative z-10">
                    <!-- Icon Container -->
                    <div
                        class="bg-white/20 backdrop-blur-lg p-3 mb-5 flex justify-center items-center rounded-2xl shadow-xl border-2 border-white/30 hover:scale-110 transition-transform duration-300">
                        <iconify-icon icon="healthicons:doctor-male" width="46" height="46"
                            style="color: white"></iconify-icon>
                    </div>

                    <!-- Title -->
                    <h1 class="text-5xl md:text-5xl font-bold text-white text-center mb-3 tracking-tight">
                        DOCTOR PROFILE
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg md:text-lg text-white/90 font-medium text-center">
                        Welcome back, manage your bookings here..
                    </p>

                    <!-- Decorative Line -->
                    <div class="mt-5 w-24 h-1 bg-gradient-to-r from-transparent via-white to-transparent rounded-full">
                    </div>
                </div>
            </section>
            <div class="doctor-box">

                <!-- Main Profile Card -->
                <div class="bg-white rounded-2xl border-2 border-[#4F46E5]/20 overflow-hidden mb-4">

                    <!-- Top Section with Doctor Info -->
                    <div class="p-8 border-b-2 border-gray-100">
                        <div class="flex flex-col lg:flex-row gap-8 items-start">

                            <!-- Left: Doctor Image & Basic Info -->
                            <div class="flex flex-col sm:flex-row gap-6 items-center sm:items-start flex-shrink-0">
                                <div class="relative">
                                    <img class="w-48 h-48 rounded-2xl object-cover ring-4 ring-[#4F46E5]/30 shadow-xl"
                                        src="{{ asset($doctor->profile_image) }}" alt="{{ $doctor->name }}" />
                                    <!-- Available Badge -->
                                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-green-500 text-white text-sm font-bold rounded-full shadow-lg">
                                            <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                            Available Now
                                        </span>
                                    </div>
                                </div>

                                <div class="text-center sm:text-left">
                                    <h2 class="text-3xl font-bold text-[#312E81] mb-2">{{ $doctor->name }}</h2>
                                    <p class="text-gray-600 text-lg mb-4">{{ $doctor->qualifications }} -
                                        {{ $doctor->specialization }}</p>

                                    <!-- Location -->
                                    <div class="flex items-center gap-2 text-gray-600 mb-3">
                                        <iconify-icon icon="material-symbols:map-rounded" width="20" height="20"
                                            style="color: #EC4899"></iconify-icon>
                                        <p>{{ $doctor->state?->name }} - {{ $doctor->country?->name }}</p>
                                    </div>

                                    <!-- Rating -->
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="flex items-center ">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= round($doctor->ratings['average']))
                                                    <iconify-icon icon="material-symbols-light:star-rounded" width="24"
                                                        height="24" style="color: rgb(250, 204, 21)"></iconify-icon>
                                                @else
                                                    <iconify-icon icon="material-symbols-light:star-rounded" width="32"
                                                        height="32" style="color: rgb(250, 204, 21)"></iconify-icon>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="px-3 py-1 bg-[#4F46E5] text-white rounded-full text-sm font-bold">
                                            {{-- {{ $doctor->ratings['average'] }} --}}
                                            4.5
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Middle: Key Stats -->
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">

                                @if ($doctor->available_full_time)
                                    <div
                                        class="flex items-center gap-3 p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200">
                                        <div
                                            class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <iconify-icon icon="mdi:clock-check" width="28" height="28"
                                                style="color: white"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-600 font-semibold uppercase">Availability</p>
                                            <p class="text-sm font-bold text-green-700">Full Time, Online Available</p>
                                        </div>
                                    </div>
                                @endif

                                <div
                                    class="flex items-center gap-3 p-4 bg-gradient-to-r from-[#4F46E5]/5 to-[#F5F3FF] rounded-xl border border-[#4F46E5]/20">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-xl flex items-center justify-center flex-shrink-0">
                                        <iconify-icon icon="healthicons:i-schedule-school-date-time" width="28"
                                            height="28" style="color: white"></iconify-icon>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 font-semibold uppercase">Experience</p>
                                        <p class="text-sm font-bold text-[#312E81]">{{ $doctor->years_of_experience }} Years
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center gap-3 p-4 bg-gradient-to-r from-[#EC4899]/5 to-[#F5F3FF] rounded-xl border border-[#EC4899]/20">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-xl flex items-center justify-center flex-shrink-0">
                                        <iconify-icon icon="mdi:account-circle" width="28" height="28"
                                            style="color: white"></iconify-icon>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-600 font-semibold uppercase">Age</p>
                                        <p class="text-sm font-bold text-[#312E81]">
                                            {{ $doctor->getFormattedAgeAttribute() }}
                                        </p>
                                    </div>
                                </div>

                                @if ($recommendedPercentage > 0)
                                    <div
                                        class="flex items-center gap-3 p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200">
                                        <div
                                            class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <iconify-icon icon="mdi:thumb-up" width="28" height="28"
                                                style="color: white"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-600 font-semibold uppercase">Recommended</p>
                                            <p class="text-sm font-bold text-green-700">{{ $recommendedPercentage }}%
                                                Recommended</p>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                        <div class="flex justify-between items-center border-t border-[#dfdfdf] mt-10 pt-5">
                            <span></span>

                            <!-- Right: Actions -->
                            <div class="flex flex-col gap-4 justify-end lg:items-end">

                                <div class="flex flex-wrap gap-2">
                                    <div
                                        class="px-8 py-3 bg-[#4F46E5]/10 rounded-full text-md font-semibold text-[#4F46E5] border border-[#4F46E5]/20 flex items-center gap-2">
                                        <iconify-icon icon="mdi:chat" width="22" height="22"></iconify-icon>
                                        <span>Chat</span>
                                    </div>
                                    <div
                                        class="px-8 py-3 bg-[#4F46E5]/10 rounded-full text-md font-semibold text-[#4F46E5] border border-[#4F46E5]/20 flex items-center gap-2">
                                        <iconify-icon icon="mdi:phone" width="18" height="18"></iconify-icon>
                                        <span>Voice</span>
                                    </div>
                                    <div
                                        class="px-8 py-3 bg-[#4F46E5]/10 rounded-full text-md font-semibold text-[#4F46E5] border border-[#4F46E5]/20 flex items-center gap-2">
                                        <iconify-icon icon="mdi:video" width="18" height="18"></iconify-icon>
                                        <span>Video</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <!-- Bottom: Price & Booking -->
                    <div
                        class="p-6 bg-gradient-to-r from-[#F5F3FF] to-white flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600 text-lg">Consultation Fee:</span>
                            <span class="text-3xl font-bold text-[#EC4899]">${{ $doctor->appointment_fees ?? 0 }}</span>
                            <span class="text-gray-600">per session</span>
                        </div>
                        <a href="{{ route('patient.book-appointment', ['username' => $doctor->uid]) }}"
                            class="px-8 py-4 bg-gradient-to-r from-[#EC4899] to-[#DB2777] text-white font-bold text-lg rounded-full hover:shadow-2xl hover:shadow-[#EC4899]/50 transition-all duration-300 hover:scale-105 flex items-center gap-3">
                            <iconify-icon icon="healthicons:i-schedule-school-date-time" width="24"
                                height="24"></iconify-icon>
                            <span>Book Appointment</span>
                        </a>
                    </div>

                </div>

                <div
                    class="flex justify-start items-start bg-white rounded-2xl w-full border-2 border-[#4F46E5]/20 gap-10 p-8 mb-4">
                    <!-- Specializations -->
                    <div class="pr-5">
                        <h3 class="text-2xl font-bold text-[#312E81] mb-6 flex items-center gap-3">
                            <iconify-icon icon="healthicons:health-worker" width="32" height="32"
                                style="color: #EC4899"></iconify-icon>
                            Specializations
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            @php
                                $specializations = explode(',', $doctor->specialization) ?? [];
                            @endphp
                            @foreach ($specializations as $specialization)
                                <span
                                    class="px-5 py-3 bg-gradient-to-r from-[#EC4899]/10 to-[#F5F3FF] border border-[#EC4899]/20 rounded-full text-base font-semibold text-[#312E81]">
                                    {{ trim($specialization) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <!-- Qualifications -->
                    <div>
                        <h3 class="text-2xl font-bold text-[#312E81] mb-6 flex items-center gap-3">
                            <iconify-icon icon="mdi:certificate" width="32" height="32"
                                style="color: #EC4899"></iconify-icon>
                            Qualifications
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            @php
                                $qualifications = explode(',', $doctor->qualifications) ?? [];
                            @endphp
                            @foreach ($qualifications as $qualification)
                                <span
                                    class="px-5 py-3 bg-gradient-to-r from-[#4F46E5]/10 to-[#F5F3FF] border border-[#4F46E5]/20 rounded-full text-base font-semibold text-[#312E81]">
                                    {{ trim($qualification) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Doctor Bio -->
                <div class="bg-white rounded-2xl border-2 border-[#4F46E5]/20 p-8 mb-4">
                    <h3 class="text-2xl font-bold text-[#312E81] mb-4 flex items-center gap-3">
                        <iconify-icon icon="vaadin:doctor-briefcase" width="30" height="30"
                            style="color: #EC4899"></iconify-icon>
                        Doctor Bio
                    </h3>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        "{{ $doctor->bio }}"
                    </p>
                </div>

                <!-- Availability Schedule -->
                <div class="bg-white rounded-2xl border-2 border-[#4F46E5]/20 p-8">
                    <h3 class="text-2xl font-bold text-[#312E81] mb-6 flex items-center gap-3">
                        <iconify-icon icon="mdi:calendar-clock" width="32" height="32"
                            style="color: #EC4899"></iconify-icon>
                        Availability Schedule
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-4">
                        @php
                            $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                        @endphp
                        @foreach ($days as $day)
                            <div
                                class="bg-gradient-to-br from-[#F5F3FF] to-white p-4 rounded-xl border-2 border-[#4F46E5]/10">
                                <h4
                                    class="font-bold text-[#312E81] text-lg capitalize mb-3 pb-2 border-b-2 border-[#4F46E5]/20">
                                    {{ $day }}
                                </h4>
                                @php
                                    $availableTimings = $doctor->availableTimings->where('day', $day)->first();
                                    $slots = json_decode($availableTimings->slots ?? '', true) ?? [];
                                @endphp
                                @forelse ($slots as $slot)
                                    <div
                                        class="mb-2 px-3 py-2 bg-white rounded-lg border border-[#EC4899]/20 text-sm font-semibold text-[#312E81] text-center">
                                        {{ \Carbon\Carbon::createFromFormat('H:i', $slot)->format('h:i A') }}
                                    </div>
                                @empty
                                    <p class="text-gray-400 text-sm text-center italic">Not Available</p>
                                @endforelse
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- TelemedMenu Member Reviews Slider Section -->
    {{-- <section class="w-full bg-theme-blue/10">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw]">
            <h2 class="md:text-[2.5vw] sm:text-[3.5vw] xs:text-[5vw] font-semibold text-center">
                TelemedMenu Member Reviews
            </h2>

            <div class="w-full md:py-[1.5vw] sm:py-[2.5vw] xs:py-[3.5vw]">
                <div class="swiper reviewSlider w-full h-full relative">
                    <button id="review-next"
                        class="md:w-[3.5vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3.5vw] sm:h-[5.5vw] xs:h-[7.5vw] text-gray-500 bg-gray-300 cursor-pointer transition-all duration-300 hide rounded-full absolute left-0 z-10 top-1/2 -translate-y-1/2 md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] flex items-center justify-center">
                        <i class="bx bx-chevron-left"></i>
                    </button>
                    <button id="review-prev"
                        class="md:w-[3.5vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3.5vw] sm:h-[5.5vw] xs:h-[7.5vw] text-gray-500 bg-gray-300 cursor-pointer transition-all duration-300 rounded-full absolute right-0 z-10 top-1/2 -translate-y-1/2 md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] flex items-center justify-center">
                        <i class="bx bx-chevron-right"></i>
                    </button>
                    <div class="swiper-wrapper w-full flex h-full">
                        <!-- Slide Start -->
                        <div
                            class="swiper-slide md:min-h-[20vw] sm:min-h-[35vw] xs:min-h-[75vw] bg-white rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] flex flex-col">
                            <div class="w-full h-full md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] flex flex-col">
                                <div class="w-full flex items-center justify-between">
                                    <div class="w-full flex items-center gap-4">
                                        <div
                                            class="md:w-[5vw] sm:w-[7vw] xs:w-[9vw] md:h-[5vw] sm:h-[7vw] xs:h-[9vw] md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] overflow-hidden">
                                            <img class="w-full h-full object-cover"
                                                src="{{ asset('website/images/reviewSlider/f1971badac0011288d240a10aff07b98be0a65ec.jpg') }}"
                                                alt="" />
                                        </div>
                                        <div>
                                            <h3 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                                                Dr. Rivanur R. Rafi
                                            </h3>
                                            <p class="md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw] text-gray-500">
                                                Cardiologist
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <img class="md:w-[8vw] sm:w-[10vw] xs:w-[12vw]"
                                            src="{{ asset('website/images/reviewSlider/comma.png') }}" alt="" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-1 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] py-3">
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                </div>
                                <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-gray-500">
                                    “I will get you 5 of these from the patient encounters and
                                    the education as well as the products.”
                                </p>
                            </div>
                        </div>
                        <!-- Slide End -->

                        <!-- Duplicate the above slide and change only the content inside -->
                        <!-- Slide 2 -->
                        <div
                            class="swiper-slide md:min-h-[20vw] sm:min-h-[35vw] xs:min-h-[75vw] w-full bg-white md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] flex flex-col">
                            <div class="w-full h-full md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] flex flex-col">
                                <div class="w-full flex items-center justify-between">
                                    <div class="w-full flex items-center gap-4">
                                        <div
                                            class="md:w-[5vw] sm:w-[7vw] xs:w-[9vw] md:h-[5vw] sm:h-[7vw] xs:h-[9vw] md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] overflow-hidden">
                                            <img class="w-full h-full object-cover"
                                                src="{{ asset('website/images/reviewSlider/f1971badac0011288d240a10aff07b98be0a65ec.jpg') }}"
                                                alt="" />
                                        </div>
                                        <div>
                                            <h3 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                                                Dr. Rivanur R. Rafi
                                            </h3>
                                            <p class="md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw] text-gray-500">
                                                Cardiologist
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <img class="md:w-[8vw] sm:w-[10vw] xs:w-[12vw]"
                                            src="{{ asset('website/images/reviewSlider/comma.png') }}" alt="" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-1 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] py-3">
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                </div>
                                <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-gray-500">
                                    “Varius sit amet mattis vulputate. Nulla posuere
                                    sollicitudin on The aliquam ultrices sagittis orci a. Nunc
                                    non blandit massa enim. Fermentum posuere urna nec
                                    tincidunt praesent semper feugiat nibh. Dolor magna eget
                                    est lorem ipsum dolor sit amet endrerit dolor.”
                                </p>
                            </div>
                        </div>

                        <!-- Slide 3 (same structure) -->
                        <div
                            class="swiper-slide md:min-h-[20vw] sm:min-h-[35vw] xs:min-h-[75vw] w-full bg-white md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] flex flex-col">
                            <div class="w-full h-full md:p-[1.5vw] sm:p-[2.5vw] xs:p-[3.5vw] flex flex-col">
                                <div class="w-full flex items-center justify-between">
                                    <div class="w-full flex items-center gap-4">
                                        <div
                                            class="md:w-[5vw] sm:w-[7vw] xs:w-[9vw] md:h-[5vw] sm:h-[7vw] xs:h-[9vw] md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] overflow-hidden">
                                            <img class="w-full h-full object-cover"
                                                src="{{ asset('website/images/reviewSlider/f1971badac0011288d240a10aff07b98be0a65ec.jpg') }}"
                                                alt="" />
                                        </div>
                                        <div>
                                            <h3 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                                                Dr. Rivanur R. Rafi
                                            </h3>
                                            <p class="md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw] text-gray-500">
                                                Cardiologist
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <img class="md:w-[8vw] sm:w-[10vw] xs:w-[12vw]"
                                            src="{{ asset('website/images/reviewSlider/comma.png') }}" alt="" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-1 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] py-3">
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                </div>
                                <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-gray-500">
                                    “I will get you 5 of these from the patient encounters and
                                    the education as well as the products.”
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Frequently Asked Questions Sections -->
    {{-- <section class="w-full">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw]">
            <h2 class="md:text-[2.5vw] sm:text-[3.5vw] xs:text-[5vw] font-semibold text-center">
                Frequently Asked Questions
            </h2>
            <div class="md:py-[2.5vw] sm:py-[3.5vw] xs:py-[4.5vw] w-full flex flex-col gap-2">
                <div id="faq1" style="box-shadow: 0 0 10px rgb(205, 205, 205)"
                    class="w-full flex flex-col md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw]">
                    <div
                        class="w-full flex items-center flex-wrap xs:justify-end sm:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
                        <h4 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            How is Telemed Menu different from other telehealth services?
                        </h4>
                        <div id="faqButton" onclick="openFAQ('faq1')"
                            class="md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] md:w-[3.5vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3.5vw] sm:h-[5.5vw] xs:h-[7.5vw] flex items-center justify-center text-white md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw] cursor-pointer bg-theme-blue">
                            <i class="bx bx-plus"></i>
                        </div>
                    </div>
                    <div id="FAQShow" class="overflow-hidden h-0">
                        <div class="md:p-[1vw] border-t border-gray-300 sm:p-[1.5vw] xs:p-[2vw]">
                            <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] md:w-[75%]">
                                Telemed Menu experienced licensed professionals go through
                                special training so they can analyze all the factors like
                                stress that affect your health problem. Unlike other
                                telemedicine companies, there is timely follow-up to make
                                sure your health issue was indeed resolved.
                            </p>
                        </div>
                    </div>
                </div>

                <div id="faq2" style="box-shadow: 0 0 10px rgb(205, 205, 205)"
                    class="w-full flex flex-col md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw]">
                    <div
                        class="w-full flex items-center flex-wrap xs:justify-end sm:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
                        <h4 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            Does TeleMed Menu address both your physical and mental health
                            concerns?
                        </h4>
                        <div id="faqButton" onclick="openFAQ('faq2')"
                            class="md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] md:w-[3.5vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3.5vw] sm:h-[5.5vw] xs:h-[7.5vw] flex items-center justify-center text-white md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw] cursor-pointer bg-theme-blue">
                            <i class="bx bx-plus"></i>
                        </div>
                    </div>
                    <div id="FAQShow" class="overflow-hidden h-0">
                        <div class="md:p-[1vw] border-t border-gray-300 sm:p-[1.5vw] xs:p-[2vw]">
                            <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] md:w-[75%]">
                                Telemed Menu experienced licensed professionals go through
                                special training so they can analyze all the factors like
                                stress that affect your health problem. Unlike other
                                telemedicine companies, there is timely follow-up to make
                                sure your health issue was indeed resolved.
                            </p>
                        </div>
                    </div>
                </div>

                <div id="faq3" style="box-shadow: 0 0 10px rgb(205, 205, 205)"
                    class="w-full flex flex-col md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw]">
                    <div
                        class="w-full flex items-center flex-wrap xs:justify-end sm:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
                        <h4 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            Is it free to have an account and be a member of TeleMed Menu?
                        </h4>
                        <div id="faqButton" onclick="openFAQ('faq3')"
                            class="md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] md:w-[3.5vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3.5vw] sm:h-[5.5vw] xs:h-[7.5vw] flex items-center justify-center text-white md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw] cursor-pointer bg-theme-blue">
                            <i class="bx bx-plus"></i>
                        </div>
                    </div>
                    <div id="FAQShow" class="overflow-hidden h-0">
                        <div class="md:p-[1vw] border-t border-gray-300 sm:p-[1.5vw] xs:p-[2vw]">
                            <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] md:w-[75%]">
                                Telemed Menu experienced licensed professionals go through
                                special training so they can analyze all the factors like
                                stress that affect your health problem. Unlike other
                                telemedicine companies, there is timely follow-up to make
                                sure your health issue was indeed resolved.
                            </p>
                        </div>
                    </div>
                </div>

                <div id="faq4" style="box-shadow: 0 0 10px rgb(205, 205, 205)"
                    class="w-full flex flex-col md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw]">
                    <div
                        class="w-full flex items-center flex-wrap xs:justify-end sm:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
                        <h4 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            Who are the healthcare professionals that I interact with on
                            Telemed Menu ?
                        </h4>
                        <div id="faqButton" onclick="openFAQ('faq4')"
                            class="md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] md:w-[3.5vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3.5vw] sm:h-[5.5vw] xs:h-[7.5vw] flex items-center justify-center text-white md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw] cursor-pointer bg-theme-blue">
                            <i class="bx bx-plus"></i>
                        </div>
                    </div>
                    <div id="FAQShow" class="overflow-hidden h-0">
                        <div class="md:p-[1vw] border-t border-gray-300 sm:p-[1.5vw] xs:p-[2vw]">
                            <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] md:w-[75%]">
                                Telemed Menu experienced licensed professionals go through
                                special training so they can analyze all the factors like
                                stress that affect your health problem. Unlike other
                                telemedicine companies, there is timely follow-up to make
                                sure your health issue was indeed resolved.
                            </p>
                        </div>
                    </div>
                </div>

                <div id="faq6" style="box-shadow: 0 0 10px rgb(205, 205, 205)"
                    class="w-full flex flex-col md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw]">
                    <div class="w-full flex items-center flex-wrap justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
                        <h4 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            how much are telehealth visits?
                        </h4>
                        <div id="faqButton" onclick="openFAQ('faq6')"
                            class="md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] md:w-[3.5vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3.5vw] sm:h-[5.5vw] xs:h-[7.5vw] flex items-center justify-center text-white md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw] cursor-pointer bg-theme-blue">
                            <i class="bx bx-plus"></i>
                        </div>
                    </div>
                    <div id="FAQShow" class="overflow-hidden h-0">
                        <div class="md:p-[1vw] border-t border-gray-300 sm:p-[1.5vw] xs:p-[2vw]">
                            <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] md:w-[75%]">
                                Telemed Menu experienced licensed professionals go through
                                special training so they can analyze all the factors like
                                stress that affect your health problem. Unlike other
                                telemedicine companies, there is timely follow-up to make
                                sure your health issue was indeed resolved.
                            </p>
                        </div>
                    </div>
                </div>

                <div id="faq7" style="box-shadow: 0 0 10px rgb(205, 205, 205)"
                    class="w-full flex flex-col md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw]">
                    <div
                        class="w-full flex items-center flex-wrap xs:justify-end sm:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
                        <h4 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            How is Telemed Menu different from other telehealth services?
                        </h4>
                        <div id="faqButton" onclick="openFAQ('faq7')"
                            class="md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] md:w-[3.5vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3.5vw] sm:h-[5.5vw] xs:h-[7.5vw] flex items-center justify-center text-white md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw] cursor-pointer bg-theme-blue">
                            <i class="bx bx-plus"></i>
                        </div>
                    </div>
                    <div id="FAQShow" class="overflow-hidden h-0">
                        <div class="md:p-[1vw] border-t border-gray-300 sm:p-[1.5vw] xs:p-[2vw]">
                            <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] md:w-[75%]">
                                Telemed Menu experienced licensed professionals go through
                                special training so they can analyze all the factors like
                                stress that affect your health problem. Unlike other
                                telemedicine companies, there is timely follow-up to make
                                sure your health issue was indeed resolved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Become a Member Section -->
    {{-- <section class="w-full bg-white">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw]">
            <div
                class="md:py-[5vw] sm:py-[6vw] xs:py-[7vw] xs:px-[2vw] xs:px-[3vw] xs:px-[4vw] bg-theme-blue md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2.5vw] text-white">
                <h3
                    class="md:text-[1.7vw] sm:text-[2.7vw] xs:text-[4.2vw] md:leading-[2.2vw] xs:text-[3.2vw] xs:text-[4.7vw] font-semibold md:w-[78%]">
                    We solve your unique health problems and have personalized plans
                    and programs to maintain your optimal wellness , come join us
                </h3>
                <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] py-6">
                    It's free to become a member , come be part of our community
                </p>
                <a href="{{ route('doctors') }}"
                    class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1.5vw] sm:px-[2.5w] xs:px-[3.5vw] rounded-full md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border border-white hover:bg-theme-navi-blue">
                    Book Appointment
                </a>
            </div>
        </div>
    </section> --}}
@endsection
