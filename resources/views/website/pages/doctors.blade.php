@extends('website.layouts.app')
@section('content')
    <!-- Doctor Profile Hero Section -->
    <section class="w-full bg-theme-blue/10">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw] text-center">
            <h1 class="md:text-[2vw] sm:text-[3vw] xs:text-[4.5vw] font-semibold">
                Doctor Listing
            </h1>
        </div>
    </section>

    <!-- Doctor Listing Details Section -->
    <section class="w-full">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw]">
            <div class="flex items-center justify-center w-full">
                <div
                    class="md:w-[80%] xs:w-full flex md:flex-row xs:flex-col md:gap-0 xs:gap-3 items-center border-2 border-theme-blue xs:rounded-xl md:rounded-full justify-between md:text-[1.1vw] sm:text-[2.1vw] x:text-[3.6vw] md:p-[0.5vw] sm:p-[1vw] xs:p-[1.5vw]">

                    <!-- Name Field -->
                    <div
                        class="flex items-center w-full gap-2 border-gray-300 rounded-md xs:border md:border-none md:px-2 xs:px-3 md:border-r">
                        <i class="bx bx-user"></i>
                        <input type="text" name="name"
                            class="filter-option md:py-[1vw] sm:py-[1.5vw] xs:py-[2vw] outline-none w-full"
                            placeholder="Name" />
                    </div>

                    <!-- Qualification Field -->
                    <div
                        class="flex items-center w-full gap-2 border-gray-300 rounded-md xs:border md:border-none md:px-2 xs:px-3 md:border-r">
                        <i class="fa-solid fa-user-graduate"></i>
                        <input name="qualification" type="text"
                            class="filter-option md:py-[1vw] sm:py-[1.5vw] xs:py-[2vw] outline-none w-full"
                            placeholder="Qualification" />
                    </div>

                    <!-- Specialization Field -->
                    <div
                        class="flex items-center w-full gap-2 border-gray-300 rounded-md xs:border md:border-none md:px-2 xs:px-3 md:border-r">
                        <i class="fa-solid fa-stethoscope"></i>
                        <input type="text" name="specialization"
                            class="filter-option md:py-[1vw] sm:py-[1.5vw] xs:py-[2vw] outline-none w-full"
                            placeholder="Specialization" />
                    </div>

                    <!-- Search Button -->
                    <div>
                        <button
                            class="search-button h-full bg-search-gardient md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw] md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] rounded-full text-white flex items-center gap-3 md:px-[2vw] sm:px-[3vw] xs:px-[4vw]">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Search
                        </button>
                    </div>
                </div>

            </div>
            <div class="w-full grid md:grid-cols-4 gap-4 text-left md:py-[4.5vw] sm:py-[5.5vw] xs:py-[6.5vw]">
                <div class="col-span-3">
                    <h2 class="md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.3vw] font-semibold">
                        Doctors For You
                    </h2>
                    <!-- <div
                                class="w-full py-8 flex items-center xs:gap-2 md:gap-4 md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw]">
                                <div class="w-full">
                                    <select
                                        class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] bg-gray-100 border border-gray-300 md:rounded-[0.5vw] sm:rounded-[1vw] x:rounded-[2vw] xs:px-1 md:px-3 outline-none w-full">
                                        <option value="Specialities">Specialities</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <select
                                        class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] bg-gray-100 border border-gray-300 md:rounded-[0.5vw] sm:rounded-[1vw] x:rounded-[2vw] xs:px-1 md:px-3 outline-none w-full">
                                        <option value="Specialities">Specialities</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <select
                                        class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] bg-gray-100 border border-gray-300 md:rounded-[0.5vw] sm:rounded-[1vw] x:rounded-[2vw] xs:px-1 md:px-3 outline-none w-full">
                                        <option value="Specialities">Specialities</option>
                                    </select>
                                </div>
                            </div> -->
                    <h4
                        class="md:text-[1.2vw] py-3 w-full border-b border-gray-300 sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                        Availability
                    </h4>

                    <div id="doctors-loader" class="flex justify-center hidden w-full py-6">
                        <svg class="w-10 h-10 animate-spin text-theme-blue" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z">
                            </path>
                        </svg>
                    </div>
                    <div class="grid w-full gap-4 md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1" id="doctors-list">

                        {{-- <div
                            class="w-full flex flex-col md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] overflow-hidden shadow-xl">
                            <div class="w-full md:h-[20vw] sm:h-[35vw] xs:h-[75vw] relative">
                                <img src="{{ asset('website/images/Provider/f913dcbb3afdf86d490cc82e2bf43d3411f40aac.png') }}"
                    alt="" class="object-cover w-full h-full" />
                    <div
                        class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full px-2 bg-theme-blue text-white absolute top-5 right-5 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                        $15 - $30
                    </div>
                </div>
                <div class="md:p-[1vw] sm:p-[2vw] xs:p-[3vw]">
                    <!-- Rattings -->
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1 md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw]">
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                        </div>
                        <p
                            class="py-0.5 px-3 bg-theme-blue rounded-full md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] text-white">
                            3.5
                        </p>
                    </div>
                    <div class="flex flex-col w-full py-2">
                        <h2 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            Donna H. Murphy
                        </h2>
                        <p class="md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw] text-gray-500">
                            BDS, MDS - Oral & Maxillofacial Surgery
                        </p>
                    </div>
                    <div class="flex items-center justify-between w-full py-2 text-gray-500">
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-location-dot text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-user-doctor text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full gap-2 py-3 border-t border-gray-400">
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-blue hover:bg-transparent">
                            View Profile
                        </button>
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-navi-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-navi-blue hover:bg-transparent">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="w-full flex flex-col md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] overflow-hidden shadow-xl">
                <div class="w-full md:h-[20vw] sm:h-[35vw] xs:h-[75vw] relative">
                    <img src="{{ asset('website/images/Provider/f913dcbb3afdf86d490cc82e2bf43d3411f40aac.png') }}"
                        alt="" class="object-cover w-full h-full" />
                    <div
                        class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full px-2 bg-theme-blue text-white absolute top-5 right-5 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                        $15 - $30
                    </div>
                </div>
                <div class="md:p-[1vw] sm:p-[2vw] xs:p-[3vw]">
                    <!-- Rattings -->
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1 md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw]">
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                        </div>
                        <p
                            class="py-0.5 px-3 bg-theme-blue rounded-full md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] text-white">
                            3.5
                        </p>
                    </div>
                    <div class="flex flex-col w-full py-2">
                        <h2 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            Donna H. Murphy
                        </h2>
                        <p class="md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw] text-gray-500">
                            BDS, MDS - Oral & Maxillofacial Surgery
                        </p>
                    </div>
                    <div class="flex items-center justify-between w-full py-2 text-gray-500">
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-location-dot text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-user-doctor text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full gap-2 py-3 border-t border-gray-400">
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-blue hover:bg-transparent">
                            View Profile
                        </button>
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-navi-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-navi-blue hover:bg-transparent">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="w-full flex flex-col md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] overflow-hidden shadow-xl">
                <div class="w-full md:h-[20vw] sm:h-[35vw] xs:h-[75vw] relative">
                    <img src="{{ asset('website/images/Provider/f913dcbb3afdf86d490cc82e2bf43d3411f40aac.png') }}"
                        alt="" class="object-cover w-full h-full" />
                    <div
                        class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full px-2 bg-theme-blue text-white absolute top-5 right-5 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                        $15 - $30
                    </div>
                </div>
                <div class="md:p-[1vw] sm:p-[2vw] xs:p-[3vw]">
                    <!-- Rattings -->
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1 md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw]">
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                        </div>
                        <p
                            class="py-0.5 px-3 bg-theme-blue rounded-full md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] text-white">
                            3.5
                        </p>
                    </div>
                    <div class="flex flex-col w-full py-2">
                        <h2 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            Donna H. Murphy
                        </h2>
                        <p class="md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw] text-gray-500">
                            BDS, MDS - Oral & Maxillofacial Surgery
                        </p>
                    </div>
                    <div class="flex items-center justify-between w-full py-2 text-gray-500">
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-location-dot text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-user-doctor text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full gap-2 py-3 border-t border-gray-400">
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-blue hover:bg-transparent">
                            View Profile
                        </button>
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-navi-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-navi-blue hover:bg-transparent">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="w-full flex flex-col md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] overflow-hidden shadow-xl">
                <div class="w-full md:h-[20vw] sm:h-[35vw] xs:h-[75vw] relative">
                    <img src="{{ asset('website/images/Provider/f913dcbb3afdf86d490cc82e2bf43d3411f40aac.png') }}"
                        alt="" class="object-cover w-full h-full" />
                    <div
                        class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full px-2 bg-theme-blue text-white absolute top-5 right-5 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                        $15 - $30
                    </div>
                </div>
                <div class="md:p-[1vw] sm:p-[2vw] xs:p-[3vw]">
                    <!-- Rattings -->
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1 md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw]">
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                        </div>
                        <p
                            class="py-0.5 px-3 bg-theme-blue rounded-full md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] text-white">
                            3.5
                        </p>
                    </div>
                    <div class="flex flex-col w-full py-2">
                        <h2 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            Donna H. Murphy
                        </h2>
                        <p class="md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw] text-gray-500">
                            BDS, MDS - Oral & Maxillofacial Surgery
                        </p>
                    </div>
                    <div class="flex items-center justify-between w-full py-2 text-gray-500">
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-location-dot text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-user-doctor text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full gap-2 py-3 border-t border-gray-400">
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-blue hover:bg-transparent">
                            View Profile
                        </button>
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-navi-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-navi-blue hover:bg-transparent">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="w-full flex flex-col md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2vw] overflow-hidden shadow-xl">
                <div class="w-full md:h-[20vw] sm:h-[35vw] xs:h-[75vw] relative">
                    <img src="{{ asset('website/images/Provider/f913dcbb3afdf86d490cc82e2bf43d3411f40aac.png') }}"
                        alt="" class="object-cover w-full h-full" />
                    <div
                        class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full px-2 bg-theme-blue text-white absolute top-5 right-5 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                        $15 - $30
                    </div>
                </div>
                <div class="md:p-[1vw] sm:p-[2vw] xs:p-[3vw]">
                    <!-- Rattings -->
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1 md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw]">
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                            <i class="text-yellow-400 fa-solid fa-star"></i>
                        </div>
                        <p
                            class="py-0.5 px-3 bg-theme-blue rounded-full md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] text-white">
                            3.5
                        </p>
                    </div>
                    <div class="flex flex-col w-full py-2">
                        <h2 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                            Donna H. Murphy
                        </h2>
                        <p class="md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw] text-gray-500">
                            BDS, MDS - Oral & Maxillofacial Surgery
                        </p>
                    </div>
                    <div class="flex items-center justify-between w-full py-2 text-gray-500">
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-location-dot text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                        <div class="flex items-center gap-1 md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                            <i class="fa-solid fa-user-doctor text-theme-blue"></i>
                            <p>Georgia, USA</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full gap-2 py-3 border-t border-gray-400">
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-blue hover:bg-transparent">
                            View Profile
                        </button>
                        <button
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] md:px-[1vw] sm:px-[2w] xs:px-[3vw] rounded-full text-white bg-theme-navi-blue md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] transition-all duration-300 border-2 border-theme-navi-blue hover:bg-transparent">
                            Book Now
                        </button>
                    </div>
                </div>
            </div> --}}
                    </div>
                </div>
                <div class="w-full h-full md:block xs:hidden">
                    <div class="flex items-center w-full gap-2 pb-4">
                        <div class="w-[85%]">
                            <select name="sort"
                                class="sort-option md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] bg-gray-100 border border-gray-300 md:rounded-[0.5vw] sm:rounded-[1vw] x:rounded-[2vw] px-3 outline-none w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw]">
                                <option value="">Sort By</option>
                                <option value="price_low_high">Price (Low to High)</option>
                                <option value="price_high_low">Price (High to Low)</option>
                            </select>
                        </div>
                        <div
                            class="md:w-[2.5vw] sm:w-[4.5vw] xs:w-[6.5vw] md:h-[2.5vw] sm:h-[4.5vw] xs:h-[6.5vw] flex items-center justify-center border border-gray-400 rounded-md bg-theme-blue md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-white">
                            <i class="bxr bx-location-alt-2"></i>
                        </div>
                    </div>
                    <div class="w-full h-full">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.05065497156!2d-74.30917427741898!3d40.69719334199166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1749713028168!5m2!1sen!2s"
                            class="w-full h-full" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="w-full flex items-center justify-center py-5 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw]">
                <div class="flex items-center gap-3">
                    <div class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full border border-gray-300 px-4">
                        Prev
                    </div>
                    <div
                        class="md:w-[2.3vw] md:h-[2.3vw] sm:w-[4.3vw] sm:h-[4.3vw] xs:w-[6.3vw] xs:h-[6.3vw] flex items-center justify-center transition-all duration-300 hover:bg-theme-blue hover:text-white rounded-full border border-gray-300">
                        1
                    </div>
                    <div
                        class="md:w-[2.3vw] md:h-[2.3vw] sm:w-[4.3vw] sm:h-[4.3vw] xs:w-[6.3vw] xs:h-[6.3vw] flex items-center justify-center transition-all duration-300 hover:bg-theme-blue hover:text-white rounded-full border border-gray-300">
                        2
                    </div>
                    <div
                        class="md:w-[2.3vw] md:h-[2.3vw] sm:w-[4.3vw] sm:h-[4.3vw] xs:w-[6.3vw] xs:h-[6.3vw] flex items-center justify-center transition-all duration-300 hover:bg-theme-blue hover:text-white rounded-full border border-gray-300">
                        3
                    </div>
                    <div
                        class="md:w-[2.3vw] md:h-[2.3vw] sm:w-[4.3vw] sm:h-[4.3vw] xs:w-[6.3vw] xs:h-[6.3vw] flex items-center justify-center transition-all duration-300 hover:bg-theme-blue hover:text-white rounded-full border border-gray-300">
                        4
                    </div>
                    <div class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full border border-gray-300 px-4">
                        Next
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('script')
        <script>
            $(document).ready(function() {
                let searchTimeout;

                // Debounced filter input listener
                /* $('.filter-option, .sort-option').on('input change', function(e) {
                    e.preventDefault();
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(function() {
                        getDoctors();
                    }, 300);
                });
                */

                // Manual trigger via button (optional)
                $('.search-button').on('click', function(e) {
                    e.preventDefault();
                    clearTimeout(searchTimeout);
                    getDoctors();
                });

                // Initial load
                getDoctors();

                function getDoctors() {
                    $('#doctors-list').empty();
                    $('#doctors-loader').removeClass('hidden'); // Show loader

                    const name = $('input[name="name"]').val().trim();
                    const qualification = $('input[name="qualification"]').val().trim();
                    const specialization = $('input[name="specialization"]').val().trim();
                    const sort = $('select[name="sort"]').val(); // 💡 Get selected sort value

                    $.ajax({
                        type: "GET",
                        url: "{{ route('get-doctors') }}",
                        data: {
                            name: name,
                            qualification: qualification,
                            specialization: specialization,
                            sort: sort // 💡 Send sort to backend
                        },
                        success: function(response) {
                            $('#doctors-loader').addClass('hidden'); // Hide loader
                            if (response.error) {
                                alert(response.message);
                                return;
                            }
                            $('#doctors-list').html(response.html);
                        },
                        error: function() {
                            $('#doctors-loader').addClass('hidden'); // Hide loader
                            alert('Something went wrong while loading doctors.');
                        }
                    });
                }
            });
        </script>
    @endpush

    @push('head')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush
@endsection
