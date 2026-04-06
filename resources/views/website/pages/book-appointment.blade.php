@extends('website.layouts.app')
@section('content')
    <style>
        /* Active Step Styling */
        .tab-button .circle.active {
            background: linear-gradient(to bottom right, #4F46E5, #312E81);
            color: white;
            border-color: transparent;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3), 0 4px 6px -2px rgba(79, 70, 229, 0.05);
            ring: 4px;
            ring-color: rgba(79, 70, 229, 0.1);
        }

        .tab-button .tabText.active {
            color: #312E81;
            font-weight: 700;
        }

        /* Completed Step Styling */
        .tab-button .circle.completed {
            background: linear-gradient(to bottom right, #EC4899, #DB2777);
            color: white;
            border-color: transparent;
            box-shadow: 0 4px 6px -1px rgba(236, 72, 153, 0.3);
        }

        .tab-button .tabText.completed {
            color: #DB2777;
            font-weight: 600;
        }

        /* Hover Effects */
        .tab-button:hover .circle:not(.active):not(.completed) {
            border-color: #4F46E5;
            background: #F5F3FF;
        }

        .tab-button:hover .tabText:not(.active):not(.completed) {
            color: #4F46E5;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .tab-button .circle {
                width: 48px;
                height: 48px;
            }

            .tab-button .tabText {
                font-size: 11px;
                max-width: 80px;
            }
        }
    </style>
    <section class="w-full bg-[#F5F3FF]">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw]">
            <!-- Progress Steps -->
            <div class="max-w-6xl mx-auto mb-12">
                <div class="relative">
                    <!-- Progress Line Background -->
                    <div class="hidden md:block absolute top-[28px] left-[10%] right-[10%] h-1 bg-gray-200 rounded-full">
                        <div class="h-full bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#DB2777] rounded-full transition-all duration-500 ease-out"
                            id="progress-line" style="width: 0%"></div>
                    </div>

                    <!-- Steps Container -->
                    <div class="flex items-start justify-between relative z-10">
                        <!-- Step 1: Appointment Type -->
                        <button data-tab="tab1"
                            class="flex flex-col items-center gap-2 tab-button flex-1 group transition-all">
                            <div
                                class="circle active w-14 h-14 rounded-full flex items-center justify-center bg-gradient-to-br from-[#4F46E5] to-[#312E81] text-white shadow-lg ring-4 ring-indigo-100 transition-all duration-300 group-hover:scale-110">
                                <span class="iconify text-2xl" data-icon="mdi:clipboard-check-outline"></span>
                            </div>
                            <p
                                class="tabText active text-sm font-bold text-[#312E81] text-center transition-colors max-w-[100px]">
                                Appointment Type
                            </p>
                        </button>

                        <!-- Step 2: Specialty -->
                        <button data-tab="tab2"
                            class="flex flex-col items-center gap-2 tab-button flex-1 group transition-all">
                            <div
                                class="circle w-14 h-14 rounded-full flex items-center justify-center bg-white text-gray-400 shadow-md border-2 border-gray-300 transition-all duration-300 group-hover:scale-110 group-hover:border-[#4F46E5]">
                                <span class="iconify text-2xl" data-icon="mdi:stethoscope"></span>
                            </div>
                            <p
                                class="tabText text-sm font-semibold text-gray-400 text-center transition-colors max-w-[100px]">
                                Specialty
                            </p>
                        </button>

                        <!-- Step 3: Date & Time -->
                        <button data-tab="tab3"
                            class="flex flex-col items-center gap-2 tab-button flex-1 group transition-all">
                            <div
                                class="circle w-14 h-14 rounded-full flex items-center justify-center bg-white text-gray-400 shadow-md border-2 border-gray-300 transition-all duration-300 group-hover:scale-110 group-hover:border-[#4F46E5]">
                                <span class="iconify text-2xl" data-icon="mdi:calendar-clock"></span>
                            </div>
                            <p
                                class="tabText text-sm font-semibold text-gray-400 text-center transition-colors max-w-[100px]">
                                Date & Time
                            </p>
                        </button>

                        <!-- Step 4: Payment -->
                        <button data-tab="tab4"
                            class="flex flex-col items-center gap-2 tab-button flex-1 group transition-all">
                            <div
                                class="circle w-14 h-14 rounded-full flex items-center justify-center bg-white text-gray-400 shadow-md border-2 border-gray-300 transition-all duration-300 group-hover:scale-110 group-hover:border-[#4F46E5]">
                                <span class="iconify text-2xl" data-icon="mdi:credit-card-outline"></span>
                            </div>
                            <p
                                class="tabText text-sm font-semibold text-gray-400 text-center transition-colors max-w-[100px]">
                                Payment
                            </p>
                        </button>

                        <!-- Step 5: Confirmation -->
                        <button data-tab="tab5"
                            class="flex flex-col items-center gap-2 tab-button flex-1 group transition-all">
                            <div
                                class="circle w-14 h-14 rounded-full flex items-center justify-center bg-white text-gray-400 shadow-md border-2 border-gray-300 transition-all duration-300 group-hover:scale-110 group-hover:border-[#4F46E5]">
                                <span class="iconify text-2xl" data-icon="mdi:check-circle-outline"></span>
                            </div>
                            <p
                                class="tabText text-sm font-semibold text-gray-400 text-center transition-colors max-w-[100px]">
                                Confirmation
                            </p>
                        </button>
                    </div>
                </div>
            </div>

            <form action="{{ route('patient.appointment.store', ['doctor' => $doctor->uid]) }}" method="POST">
                @csrf

                <!-- Tab 1: Appointment Type -->
                <div id="tab1" data-tab="1" class="content active">
                    <div class="bg-white rounded-2xl shadow-xl border-2 border-[#4F46E5]/30 overflow-hidden">
                        <!-- Doctor Info Card -->
                        <div
                            class="p-8 bg-gradient-to-r from-purple-50 via-indigo-50 to-pink-50 border-b border-purple-100">
                            <div class="flex sm:flex-row xs:flex-col items-center gap-6 max-w-4xl">
                                <div class="relative flex-shrink-0">
                                    <div
                                        class="w-28 h-28 rounded-3xl overflow-hidden border-4 border-white shadow-xl ring-4 ring-[#4F46E5]/20">
                                        <img src="{{ asset($doctor->profile_image) }}" class="w-full h-full object-cover"
                                            alt="{{ $doctor->name }}" />
                                    </div>
                                    <!-- Online Status Badge (optional) -->
                                    <div
                                        class="absolute -bottom-1 -right-1 w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                                        <span class="iconify text-white text-sm" data-icon="mdi:check"></span>
                                    </div>
                                </div>

                                <div class="flex-1 text-center sm:text-left">
                                    <h3 class="text-3xl font-bold text-[#312E81] mb-2 tracking-tight">{{ $doctor->name }}
                                    </h3>
                                    <p class="text-xl text-gray-700 font-semibold mb-3">{{ $doctor->specialization }}</p>
                                    <div class="flex items-center gap-2 justify-center sm:justify-start text-gray-600">
                                        <div
                                            class="w-6 h-6 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center shadow-sm">
                                            <iconify-icon icon="material-symbols:map-rounded" width="14" height="14"
                                                style="color: white"></iconify-icon>
                                        </div>
                                        <span class="font-medium">{{ $doctor->state?->name }} -
                                            {{ $doctor->country?->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Appointment Type Selection -->
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-[#1f1d65] mb-3 flex items-center gap-3">
                                <div
                                    class="w-12 h-12 bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center">
                                    <span class="iconify text-white text-xl" data-icon="mdi:clipboard-check-outline"></span>
                                </div>
                                Select Appointment Type
                            </h3>
                            <p class="text-gray-600 mb-6 ml-15">Choose how you'd like to consult with your doctor</p>

                            <div class="grid md:grid-cols-3 gap-6">
                                <!-- Video Call -->
                                <label class="relative cursor-pointer group">
                                    <input type="checkbox" name="types[]" value="video call"
                                        class="peer absolute opacity-0 w-0 h-0" />
                                    <div
                                        class="h-full p-6 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border-2 border-green-200 transition-all duration-300 peer-checked:border-[#4F46E5] peer-checked:bg-gradient-to-br peer-checked:from-indigo-50 peer-checked:to-purple-50 hover:shadow-lg hover:scale-105">
                                        <div class="flex flex-col items-center gap-4">
                                            <div
                                                class="w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg transition-all duration-300 peer-checked:from-[#4F46E5] peer-checked:to-[#312E81]">
                                                <span class="iconify text-white text-4xl"
                                                    data-icon="mdi:video-outline"></span>
                                            </div>
                                            <div class="text-center">
                                                <p
                                                    class="font-bold text-xl text-green-700 peer-checked:text-[#312E81] transition-colors">
                                                    Video Call</p>
                                                <p class="text-sm text-gray-600 mt-2">Face-to-face virtual consultation</p>
                                            </div>
                                        </div>
                                        <div
                                            class="hidden peer-checked:flex absolute top-3 right-3 w-7 h-7 bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-full items-center justify-center shadow-md">
                                            <span class="iconify text-white text-lg" data-icon="mdi:check-bold"></span>
                                        </div>
                                    </div>
                                </label>

                                <!-- Audio Call -->
                                <label class="relative cursor-pointer group">
                                    <input type="checkbox" name="types[]" value="audio call"
                                        class="peer absolute opacity-0 w-0 h-0" />
                                    <div
                                        class="h-full p-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border-2 border-blue-200 transition-all duration-300 peer-checked:border-purple-500 peer-checked:bg-gradient-to-br peer-checked:from-purple-50 peer-checked:to-pink-50 hover:shadow-lg hover:scale-105">
                                        <div class="flex flex-col items-center gap-4">
                                            <div
                                                class="w-20 h-20 bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-full flex items-center justify-center shadow-lg transition-all duration-300 peer-checked:from-purple-400 peer-checked:to-purple-600">
                                                <span class="iconify text-white text-4xl"
                                                    data-icon="mdi:phone-outline"></span>
                                            </div>
                                            <div class="text-center">
                                                <p
                                                    class="font-bold text-xl text-[#312E81] peer-checked:text-purple-700 transition-colors">
                                                    Audio Call</p>
                                                <p class="text-sm text-gray-600 mt-2">Voice-only consultation</p>
                                            </div>
                                        </div>
                                        <div
                                            class="hidden peer-checked:flex absolute top-3 right-3 w-7 h-7 bg-gradient-to-r from-purple-500 to-purple-700 rounded-full items-center justify-center shadow-md">
                                            <span class="iconify text-white text-lg" data-icon="mdi:check-bold"></span>
                                        </div>
                                    </div>
                                </label>

                                <!-- Chat Messages -->
                                <label class="relative cursor-pointer group">
                                    <input type="checkbox" name="types[]" value="chat messages"
                                        class="peer absolute opacity-0 w-0 h-0" />
                                    <div
                                        class="h-full p-6 bg-gradient-to-br from-pink-50 to-rose-50 rounded-xl border-2 border-pink-200 transition-all duration-300 peer-checked:border-pink-500 peer-checked:bg-gradient-to-br peer-checked:from-pink-50 peer-checked:to-rose-50 hover:shadow-lg hover:scale-105">
                                        <div class="flex flex-col items-center gap-4">
                                            <div
                                                class="w-20 h-20 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-full flex items-center justify-center shadow-lg transition-all duration-300">
                                                <span class="iconify text-white text-4xl"
                                                    data-icon="mdi:message-text-outline"></span>
                                            </div>
                                            <div class="text-center">
                                                <p class="font-bold text-xl text-[#DB2777] transition-colors">Chat Messages
                                                </p>
                                                <p class="text-sm text-gray-600 mt-2">Text-based consultation</p>
                                            </div>
                                        </div>
                                        <div
                                            class="hidden peer-checked:flex absolute top-3 right-3 w-7 h-7 bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-full items-center justify-center shadow-md">
                                            <span class="iconify text-white text-lg" data-icon="mdi:check-bold"></span>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- Info Message -->
                            <div class="mt-6 bg-indigo-50 border-l-4 border-[#4F46E5] p-4 rounded-r-lg">
                                <div class="flex items-start gap-3">
                                    <span class="iconify text-[#4F46E5] text-xl mt-0.5"
                                        data-icon="mdi:information"></span>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold text-[#312E81]">Note:</span> You can select multiple
                                        appointment types. The doctor will contact you through your preferred method.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="p-6 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                            <button type="button" disabled
                                class="px-6 py-3 rounded-xl font-medium text-gray-400 bg-gray-200 cursor-not-allowed flex items-center gap-2">
                                <span class="iconify" data-icon="mdi:chevron-left"></span>
                                <span>Back</span>
                            </button>
                            <button type="button" onclick="changeTab('tab2')"
                                class="px-8 py-3 rounded-xl font-medium text-white bg-gradient-to-r from-[#EC4899] to-[#DB2777] hover:from-indigo-700 hover:to-purple-700 shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
                                <span>Next</span>
                                <span class="iconify" data-icon="mdi:chevron-right"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Specialty (Services) -->
                <div id="tab2" data-tab="2" class="content hidden">
                    <div class="bg-white rounded-2xl shadow-xl border-2 border-[#4F46E5]/30 overflow-hidden">
                        <!-- Doctor Info Card -->
                        <div
                            class="p-8 bg-gradient-to-r from-purple-50 via-indigo-50 to-pink-50 border-b border-purple-100">
                            <div class="flex sm:flex-row xs:flex-col items-center gap-6 max-w-4xl">
                                <div class="relative flex-shrink-0">
                                    <div
                                        class="w-28 h-28 rounded-3xl overflow-hidden border-4 border-white shadow-xl ring-4 ring-[#4F46E5]/20">
                                        <img src="{{ asset($doctor->profile_image) }}" class="w-full h-full object-cover"
                                            alt="{{ $doctor->name }}" />
                                    </div>
                                    <!-- Online Status Badge (optional) -->
                                    <div
                                        class="absolute -bottom-1 -right-1 w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                                        <span class="iconify text-white text-sm" data-icon="mdi:check"></span>
                                    </div>
                                </div>

                                <div class="flex-1 text-center sm:text-left">
                                    <h3 class="text-3xl font-bold text-[#312E81] mb-2 tracking-tight">{{ $doctor->name }}
                                    </h3>
                                    <p class="text-xl text-gray-700 font-semibold mb-3">{{ $doctor->specialization }}</p>
                                    <div class="flex items-center gap-2 justify-center sm:justify-start text-gray-600">
                                        <div
                                            class="w-6 h-6 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center shadow-sm">
                                            <iconify-icon icon="material-symbols:map-rounded" width="14"
                                                height="14" style="color: white"></iconify-icon>
                                        </div>
                                        <span class="font-medium">{{ $doctor->state?->name }} -
                                            {{ $doctor->country?->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Services Selection -->
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-[#1f1d65] mb-3 flex items-center gap-3">
                                <div
                                    class="w-12 h-12 bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center">
                                    <span class="iconify text-white text-xl" data-icon="mdi:stethoscope"></span>
                                </div>
                                Select Services
                            </h3>
                            <p class="text-gray-600 mb-6 ml-15">Choose the medical services you need</p>

                            <div class="grid md:grid-cols-3 gap-6">
                                @php
                                    $specializations = explode(',', $doctor->specialization) ?? [];
                                @endphp
                                @foreach ($specializations as $index => $specialization)
                                    <label class="relative cursor-pointer group">
                                        <input type="checkbox" value="{{ $specialization }}" name="services[]"
                                            class="peer absolute opacity-0 w-0 h-0" />
                                        <div
                                            class="h-full p-6 bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl border-2 border-pink-200 transition-all duration-300 peer-checked:border-[#4F46E5] peer-checked:bg-gradient-to-br peer-checked:from-indigo-50 peer-checked:to-purple-50 hover:shadow-lg hover:scale-105">
                                            <div class="flex flex-col gap-4">
                                                <div
                                                    class="w-16 h-16 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-xl flex items-center justify-center shadow-md transition-all duration-300 peer-checked:from-[#4F46E5] peer-checked:to-[#312E81]">
                                                    <span class="iconify text-white text-3xl"
                                                        data-icon="mdi:medical-bag"></span>
                                                </div>
                                                <p
                                                    class="font-bold text-lg text-[#DB2777] peer-checked:text-[#312E81] transition-colors">
                                                    {{ trim($specialization) }}
                                                </p>
                                            </div>
                                            <div
                                                class="hidden peer-checked:flex absolute top-3 right-3 w-7 h-7 bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-full items-center justify-center shadow-md">
                                                <span class="iconify text-white text-lg"
                                                    data-icon="mdi:check-bold"></span>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>

                            <!-- Info Message -->
                            <div class="mt-6 bg-purple-50 border-l-4 border-purple-500 p-4 rounded-r-lg">
                                <div class="flex items-start gap-3">
                                    <span class="iconify text-purple-600 text-xl mt-0.5"
                                        data-icon="mdi:information"></span>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold text-[#312E81]">Tip:</span> Select all services that
                                        apply to your appointment for a comprehensive consultation.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="p-6 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                            <button type="button" onclick="changeTab('tab1')"
                                class="px-6 py-3 rounded-xl font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors flex items-center gap-2">
                                <span class="iconify" data-icon="mdi:chevron-left"></span>
                                <span>Back</span>
                            </button>
                            <button type="button" onclick="changeTab('tab3')"
                                class="px-8 py-3 rounded-xl font-medium text-white bg-gradient-to-r from-[#EC4899] to-[#DB2777] hover:from-indigo-700 hover:to-purple-700 shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
                                <span>Next</span>
                                <span class="iconify" data-icon="mdi:chevron-right"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Date & Time -->
                <div id="tab3" data-tab="3" class="content hidden">
                    <div class="bg-white rounded-2xl shadow-xl border-2 border-[#4F46E5]/30 overflow-hidden">
                        <!-- Doctor Info Card -->
                        <div
                            class="p-8 bg-gradient-to-r from-purple-50 via-indigo-50 to-pink-50 border-b border-purple-100">
                            <div class="flex sm:flex-row xs:flex-col items-center gap-6 max-w-4xl">
                                <div class="relative flex-shrink-0">
                                    <div
                                        class="w-28 h-28 rounded-3xl overflow-hidden border-4 border-white shadow-xl ring-4 ring-[#4F46E5]/20">
                                        <img src="{{ asset($doctor->profile_image) }}" class="w-full h-full object-cover"
                                            alt="{{ $doctor->name }}" />
                                    </div>
                                    <!-- Online Status Badge (optional) -->
                                    <div
                                        class="absolute -bottom-1 -right-1 w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                                        <span class="iconify text-white text-sm" data-icon="mdi:check"></span>
                                    </div>
                                </div>

                                <div class="flex-1 text-center sm:text-left">
                                    <h3 class="text-3xl font-bold text-[#312E81] mb-2 tracking-tight">{{ $doctor->name }}
                                    </h3>
                                    <p class="text-xl text-gray-700 font-semibold mb-3">{{ $doctor->specialization }}</p>
                                    <div class="flex items-center gap-2 justify-center sm:justify-start text-gray-600">
                                        <div
                                            class="w-6 h-6 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center shadow-sm">
                                            <iconify-icon icon="material-symbols:map-rounded" width="14"
                                                height="14" style="color: white"></iconify-icon>
                                        </div>
                                        <span class="font-medium">{{ $doctor->state?->name }} -
                                            {{ $doctor->country?->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Date & Time Selection -->
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-[#1f1d65] mb-3 flex items-center gap-3">
                                <div
                                    class="w-12 h-12 bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center">
                                    <span class="iconify text-white text-xl" data-icon="mdi:calendar-clock"></span>
                                </div>
                                Select Date & Time
                            </h3>
                            <p class="text-gray-600 mb-6 ml-15">Choose your preferred appointment date and time slot</p>

                            <div class="grid lg:grid-cols-2 gap-6">
                                <!-- Date Picker Section -->
                                <div class="lg:col-span-1">
                                    <div
                                        class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-6 border-2 border-indigo-100 h-full">
                                        <label class="block text-lg font-bold text-[#312E81] mb-4 flex items-center gap-2">
                                            <span
                                                class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm">
                                                <span class="iconify text-[#EC4899] text-xl"
                                                    data-icon="mdi:calendar"></span>
                                            </span>
                                            Appointment Date
                                        </label>
                                        <div class="relative">
                                            <input type="date" name="date"
                                                class="date w-full px-5 py-4 border-2 border-indigo-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-indigo-100 transition-all outline-none bg-white text-gray-800 font-semibold text-base shadow-sm hover:border-[#4F46E5]">
                                        </div>
                                        <div
                                            class="mt-4 bg-white/70 backdrop-blur-sm rounded-lg p-3 border border-indigo-100">
                                            <p class="text-sm text-gray-700 flex items-center gap-2">
                                                <span class="iconify text-indigo-500 text-lg flex-shrink-0"
                                                    data-icon="mdi:information"></span>
                                                <span>Select a date to view available time slots for booking</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Time Slots Section -->
                                <div class="lg:col-span-1">
                                    <div
                                        class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl p-6 border-2 border-pink-100 h-full">
                                        <h4 id="day-name"
                                            class="text-lg font-bold text-[#312E81] mb-4 flex items-center gap-2">
                                            <span
                                                class="w-10 h-10 bg-white rounded-lg flex items-center justify-center shadow-sm">
                                                <span class="iconify text-[#EC4899] text-xl"
                                                    data-icon="mdi:clock-outline"></span>
                                            </span>
                                            Available Time Slots
                                        </h4>

                                        <!-- Slots Container -->
                                        <div id="slot-list" class="min-h-[200px] flex items-center justify-center">
                                            <div class="text-center py-8">
                                                <div
                                                    class="w-20 h-20 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-md">
                                                    <span class="iconify text-gray-400 text-4xl"
                                                        data-icon="mdi:calendar-clock"></span>
                                                </div>
                                                <p class="text-gray-600 font-semibold text-base mb-2">No Date Selected</p>
                                                <p class="text-gray-500 text-sm">Please select a date above to
                                                    view<br />available appointment slots</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Info Message -->
                            <div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                                <div class="flex items-start gap-3">
                                    <span class="iconify text-blue-600 text-xl mt-0.5"
                                        data-icon="mdi:lightbulb-on"></span>
                                    <div>
                                        <p class="font-semibold text-blue-800 mb-1">Booking Tip</p>
                                        <p class="text-sm text-gray-700">Morning slots (9 AM - 12 PM) are typically less
                                            busy. Book early to secure your preferred time!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Navigation Buttons -->
                        <div class="p-6 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                            <button type="button" onclick="changeTab('tab2')"
                                class="px-6 py-3 rounded-xl font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors flex items-center gap-2">
                                <span class="iconify" data-icon="mdi:chevron-left"></span>
                                <span>Back</span>
                            </button>
                            <button type="button" onclick="changeTab('tab4')"
                                class="px-8 py-3 rounded-xl font-medium text-white bg-gradient-to-r from-[#EC4899] to-[#DB2777] hover:from-indigo-700 hover:to-purple-700 shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
                                <span>Next</span>
                                <span class="iconify" data-icon="mdi:chevron-right"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tab 4: Payment -->
                <div id="tab4" data-tab="4" class="content hidden">
                    <div class="bg-white rounded-2xl shadow-xl border-2 border-[#4F46E5]/30 overflow-hidden">
                        <!-- Doctor Info Card -->
                        <div
                            class="p-8 bg-gradient-to-r from-purple-50 via-indigo-50 to-pink-50 border-b border-purple-100">
                            <div class="flex sm:flex-row xs:flex-col items-center gap-6 max-w-4xl">
                                <div class="relative flex-shrink-0">
                                    <div
                                        class="w-28 h-28 rounded-3xl overflow-hidden border-4 border-white shadow-xl ring-4 ring-[#4F46E5]/20">
                                        <img src="{{ asset($doctor->profile_image) }}" class="w-full h-full object-cover"
                                            alt="{{ $doctor->name }}" />
                                    </div>
                                    <!-- Online Status Badge (optional) -->
                                    <div
                                        class="absolute -bottom-1 -right-1 w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                                        <span class="iconify text-white text-sm" data-icon="mdi:check"></span>
                                    </div>
                                </div>

                                <div class="flex-1 text-center sm:text-left">
                                    <h3 class="text-3xl font-bold text-[#312E81] mb-2 tracking-tight">{{ $doctor->name }}
                                    </h3>
                                    <p class="text-xl text-gray-700 font-semibold mb-3">{{ $doctor->specialization }}</p>
                                    <div class="flex items-center gap-2 justify-center sm:justify-start text-gray-600">
                                        <div
                                            class="w-6 h-6 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center shadow-sm">
                                            <iconify-icon icon="material-symbols:map-rounded" width="14"
                                                height="14" style="color: white"></iconify-icon>
                                        </div>
                                        <span class="font-medium">{{ $doctor->state?->name }} -
                                            {{ $doctor->country?->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Content -->
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-[#1f1d65] mb-6 flex items-center gap-3">
                                <div
                                    class="w-12 h-12 bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center">
                                    <span class="iconify text-white text-xl" data-icon="mdi:credit-card-outline"></span>
                                </div>
                                Payment Information
                            </h3>

                            <div class="grid lg:grid-cols-2 gap-8">
                                <!-- Payment Form Column -->
                                <div class="space-y-6">
                                    <!-- Payment Method Selection -->
                                    <div>
                                        <h4 class="text-lg font-bold text-[#312E81] mb-4">Select Payment Method</h4>
                                        <div class="grid grid-cols-3 gap-3">
                                            <div tabindex="0"
                                                class="group p-4 border-2 border-gray-200 focus:border-[#4F46E5] hover:border-[#4F46E5] rounded-xl flex flex-col items-center gap-2 cursor-pointer transition-all duration-200 hover:shadow-md">
                                                <div
                                                    class="w-12 h-12 bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-lg flex items-center justify-center">
                                                    <span class="iconify text-white text-2xl"
                                                        data-icon="mdi:credit-card"></span>
                                                </div>
                                                <p class="text-xs font-semibold text-gray-700">Credit Card</p>
                                            </div>

                                            <div tabindex="0"
                                                class="group p-4 border-2 border-gray-200 focus:border-[#4F46E5] hover:border-[#4F46E5] rounded-xl flex flex-col items-center gap-2 cursor-pointer transition-all duration-200 hover:shadow-md">
                                                <div
                                                    class="w-12 h-12 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center">
                                                    <span class="iconify text-white text-2xl"
                                                        data-icon="mdi:wallet"></span>
                                                </div>
                                                <p class="text-xs font-semibold text-gray-700">Debit Card</p>
                                            </div>

                                            <div tabindex="0"
                                                class="group p-4 border-2 border-gray-200 focus:border-[#4F46E5] hover:border-[#4F46E5] rounded-xl flex flex-col items-center gap-2 cursor-pointer transition-all duration-200 hover:shadow-md">
                                                <div
                                                    class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                                    <span class="iconify text-white text-2xl" data-icon="mdi:bank"></span>
                                                </div>
                                                <p class="text-xs font-semibold text-gray-700">Bank</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Card Details Form -->
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-semibold text-[#312E81] mb-2">Card Holder
                                                Name</label>
                                            <input type="text" name="cardHolderName" placeholder="John Doe"
                                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-[#4F46E5]/10 transition-all outline-none" />
                                        </div>

                                        <div>
                                            <label class="block text-sm font-semibold text-[#312E81] mb-2">Card
                                                Number</label>
                                            <div class="relative">
                                                <input type="text" name="cardNumber" placeholder="1234 5678 9012 3456"
                                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-[#4F46E5]/10 transition-all outline-none" />
                                                <span
                                                    class="iconify absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl"
                                                    data-icon="mdi:credit-card-outline"></span>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-semibold text-[#312E81] mb-2">Expiry
                                                    Date</label>
                                                <input type="text" name="ExpiryDate" placeholder="MM/YY"
                                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-[#4F46E5]/10 transition-all outline-none" />
                                            </div>

                                            <div>
                                                <label class="block text-sm font-semibold text-[#312E81] mb-2">CVV</label>
                                                <input type="text" name="cvv" maxlength="3" placeholder="123"
                                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-[#4F46E5]/10 transition-all outline-none" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Security Badge -->
                                    <div
                                        class="bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-xl p-4 flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                            <span class="iconify text-white text-xl" data-icon="mdi:shield-check"></span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-green-800">Secure Payment</p>
                                            <p class="text-xs text-green-600">Your payment information is encrypted and
                                                secure</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Booking Summary Column -->
                                <div
                                    class="bg-gradient-to-br from-[#F5F3FF] to-pink-50 rounded-2xl p-6 border-2 border-[#4F46E5]/20 h-fit">
                                    <div class="flex items-center gap-3 mb-6">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-lg flex items-center justify-center">
                                            <span class="iconify text-white text-xl"
                                                data-icon="mdi:file-document-outline"></span>
                                        </div>
                                        <h4 class="text-xl font-bold text-[#312E81]">Booking Summary</h4>
                                    </div>

                                    <!-- Appointment Details -->
                                    <div class="space-y-4 mb-6">
                                        <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="iconify text-[#EC4899]"
                                                    data-icon="mdi:calendar-clock"></span>
                                                <p class="text-sm font-semibold text-gray-600">Date & Time</p>
                                            </div>
                                            <p id="date-time" class="font-bold text-[#312E81] text-lg">Not selected</p>
                                        </div>

                                        <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="iconify text-[#EC4899]"
                                                    data-icon="mdi:clipboard-check"></span>
                                                <p class="text-sm font-semibold text-gray-600">Appointment Type</p>
                                            </div>
                                            <p id="appointment-types" class="font-bold text-[#312E81] text-lg">Not
                                                selected</p>
                                        </div>
                                    </div>

                                    <!-- Price Breakdown -->
                                    <div class="border-t-2 border-[#4F46E5]/20 pt-4 mb-6 space-y-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-700 font-medium">Consultation Fee</span>
                                            <span
                                                class="font-bold text-[#312E81]">${{ $doctor->appointment_fees ?? 0 }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-700 font-medium">Tax (10%)</span>
                                            <span class="font-bold text-[#312E81]">$18</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-700 font-medium">Discount</span>
                                            <span class="font-bold text-green-600">-$18</span>
                                        </div>
                                    </div>

                                    <!-- Total Amount -->
                                    <div
                                        class="bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-xl p-5 text-white shadow-lg">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="text-sm opacity-90">Total Amount</p>
                                                <p class="text-3xl font-bold">${{ $doctor->appointment_fees ?? 0 }}</p>
                                            </div>
                                            <div
                                                class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                                <span class="iconify text-white text-2xl" data-icon="mdi:cash"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Payment Note -->
                                    <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                        <div class="flex items-start gap-2">
                                            <span class="iconify text-yellow-600 mt-0.5"
                                                data-icon="mdi:information"></span>
                                            <p class="text-xs text-yellow-800">You will be charged after the consultation
                                                is completed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="p-6 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                            <button type="button" onclick="changeTab('tab3')"
                                class="px-6 py-3 rounded-xl font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors flex items-center gap-2">
                                <span class="iconify" data-icon="mdi:chevron-left"></span>
                                <span>Back</span>
                            </button>
                            <button type="button" onclick="changeTab('tab5')"
                                class="px-8 py-3 rounded-xl font-medium text-white bg-gradient-to-r from-[#EC4899] to-[#DB2777] hover:from-[#DB2777] hover:to-[#BE185D] shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
                                <span>Next</span>
                                <span class="iconify" data-icon="mdi:chevron-right"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tab 5: Confirmation -->
                <div id="tab5" data-tab="5" class="content hidden">
                    <div class="bg-white rounded-2xl shadow-xl border-2 border-[#4F46E5]/30 overflow-hidden">
                        <!-- Doctor Info Card -->
                        <div
                            class="p-8 bg-gradient-to-r from-purple-50 via-indigo-50 to-pink-50 border-b border-purple-100">
                            <div class="flex sm:flex-row xs:flex-col items-center gap-6 max-w-4xl">
                                <div class="relative flex-shrink-0">
                                    <div
                                        class="w-28 h-28 rounded-3xl overflow-hidden border-4 border-white shadow-xl ring-4 ring-[#4F46E5]/20">
                                        <img src="{{ asset($doctor->profile_image) }}" class="w-full h-full object-cover"
                                            alt="{{ $doctor->name }}" />
                                    </div>
                                    <!-- Online Status Badge (optional) -->
                                    <div
                                        class="absolute -bottom-1 -right-1 w-8 h-8 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                                        <span class="iconify text-white text-sm" data-icon="mdi:check"></span>
                                    </div>
                                </div>

                                <div class="flex-1 text-center sm:text-left">
                                    <h3 class="text-3xl font-bold text-[#312E81] mb-2 tracking-tight">{{ $doctor->name }}
                                    </h3>
                                    <p class="text-xl text-gray-700 font-semibold mb-3">{{ $doctor->specialization }}</p>
                                    <div class="flex items-center gap-2 justify-center sm:justify-start text-gray-600">
                                        <div
                                            class="w-6 h-6 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center shadow-sm">
                                            <iconify-icon icon="material-symbols:map-rounded" width="14"
                                                height="14" style="color: white"></iconify-icon>
                                        </div>
                                        <span class="font-medium">{{ $doctor->state?->name }} -
                                            {{ $doctor->country?->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Confirmation Content -->
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-[#1f1d65] mb-3 flex items-center gap-3">
                                <div
                                    class="w-12 h-12 bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center">
                                    <span class="iconify text-white text-xl" data-icon="mdi:check-circle-outline"></span>
                                </div>
                                Review & Confirm
                            </h3>
                            <p class="text-gray-600 mb-6 ml-15">Please review your appointment details and add any
                                additional notes</p>

                            <!-- Additional Notes -->
                            <div
                                class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-6 border-2 border-indigo-100">
                                <label class="block text-lg font-bold text-[#312E81] mb-3 flex items-center gap-2">
                                    <span class="iconify text-[#EC4899]" data-icon="mdi:message-text"></span>
                                    Additional Notes (Optional)
                                </label>
                                <textarea name="description" rows="6"
                                    class="w-full px-4 py-4 border-2 border-indigo-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-indigo-100 outline-none bg-white text-gray-800 transition-all resize-none"
                                    placeholder="Share any symptoms, concerns, or specific questions you'd like to discuss with the doctor..."></textarea>
                                <p class="text-sm text-gray-600 mt-3 flex items-center gap-2">
                                    <span class="iconify text-indigo-500" data-icon="mdi:lightbulb-outline"></span>
                                    Include relevant medical history, current medications, or specific concerns
                                </p>
                            </div>

                            <!-- Privacy Notice -->
                            <div class="mt-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                                <div class="flex items-start gap-3">
                                    <span class="iconify text-green-600 text-xl mt-0.5"
                                        data-icon="mdi:shield-check"></span>
                                    <div>
                                        <p class="font-semibold text-green-800 mb-1">Your information is secure</p>
                                        <p class="text-sm text-gray-700">All your medical information is encrypted and
                                            handled according to HIPAA guidelines.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="p-6 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                            <button type="button" onclick="changeTab('tab4')"
                                class="px-6 py-3 rounded-xl font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors flex items-center gap-2">
                                <span class="iconify" data-icon="mdi:chevron-left"></span>
                                <span>Back</span>
                            </button>
                            <button type="submit"
                                class="px-8 py-3 rounded-xl font-medium text-white bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2">
                                <span class="iconify" data-icon="mdi:check-circle"></span>
                                <span>Confirm Appointment</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @push('head')
        <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('website/static/js/appointment.js') }}"></script>
    @endpush

    @push('script')
        <script>
            $('.date').change(function(e) {
                e.preventDefault();
                let val = $(this).val();

                // Show loading state
                $('#slot-list').html(`
        <div class="text-center py-8 w-full">
            <div class="w-12 h-12 border-4 border-indigo-200 border-t-indigo-600 rounded-full animate-spin mx-auto mb-3"></div>
            <p class="text-gray-600 font-medium">Loading available slots...</p>
        </div>
    `);

                $.ajax({
                    type: "GET",
                    url: "{{ route('get-slots') }}",
                    data: {
                        date: val,
                        doctor_id: "{{ $doctor->id }}"
                    },
                    success: function(response) {
                        if (response.error) {
                            $('#slot-list').html(`
                    <div class="text-center py-8 w-full">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="iconify text-red-500 text-3xl" data-icon="mdi:alert-circle"></span>
                        </div>
                        <p class="text-red-600 font-semibold">Something went wrong</p>
                        <p class="text-gray-500 text-sm mt-2">Please try again</p>
                    </div>
                `);
                            return;
                        }

                        $('#day-name').html(`
                <span class="iconify text-[#EC4899]" data-icon="mdi:clock-outline"></span>
                ${response.day}
            `);

                        $('#slot-list').empty();

                        if (response.availableTimings.length == 0) {
                            $('#slot-list').html(`
                    <div class="text-center py-8 w-full">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="iconify text-orange-500 text-3xl" data-icon="mdi:calendar-remove"></span>
                        </div>
                        <p class="text-orange-600 font-semibold">No slots available</p>
                        <p class="text-gray-500 text-sm mt-2">Please choose another date</p>
                    </div>
                `);
                            return;
                        }

                        // Create slots grid
                        let slotsHTML =
                            '<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 w-full">';
                        response.availableTimings.forEach(timing => {
                            slotsHTML += `
                    <label class="relative cursor-pointer group">
                        <input type="radio" name="available_timing_id" value="${timing.id}" class="peer absolute opacity-0 w-0 h-0" />
                        <div class="px-4 py-3 rounded-lg border-2 border-gray-200 bg-white peer-checked:border-[#4F46E5] peer-checked:bg-gradient-to-br peer-checked:from-indigo-50 peer-checked:to-purple-50 transition-all hover:border-indigo-300 hover:shadow-md text-center group-hover:scale-105 duration-200">
                            <div class="flex items-center justify-center gap-2">
                                <span class="iconify text-gray-400 peer-checked:text-[#EC4899]" data-icon="mdi:clock-outline"></span>
                                <span class="font-semibold text-gray-700 peer-checked:text-[#4F46E5]">${timing.time}</span>
                            </div>
                        </div>
                        <div class="hidden peer-checked:flex absolute -top-1 -right-1 w-5 h-5 bg-gradient-to-r from-[#EC4899] to-[#DB2777] rounded-full items-center justify-center shadow-md">
                            <span class="iconify text-white text-xs" data-icon="mdi:check"></span>
                        </div>
                    </label>
                `;
                        });
                        slotsHTML += '</div>';

                        $('#slot-list').html(slotsHTML);
                    },
                    error: function() {
                        $('#slot-list').html(`
                <div class="text-center py-8 w-full">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="iconify text-red-500 text-3xl" data-icon="mdi:alert-circle"></span>
                    </div>
                    <p class="text-red-600 font-semibold">Connection error</p>
                    <p class="text-gray-500 text-sm mt-2">Please check your internet and try again</p>
                </div>
            `);
                    }
                });
            });
        </script>
    @endpush
@endsection
