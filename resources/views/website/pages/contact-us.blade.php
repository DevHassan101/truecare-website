@extends('website.layouts.app')
@section('content')
    <!-- About Hero Section -->
    <section class="w-full bg-theme-blue/10">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw] text-center">
            <h1 class="md:text-[2vw] sm:text-[3vw] xs:text-[4.5vw] font-semibold">
                Contact Us
            </h1>
        </div>
    </section>

    <!-- Have Any question Details section -->
    <section class="w-full">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw]">
            <div class="w-full h-full xs:flex flex-col md:grid grid-cols-5 md:gap-[3vw] sm:gap-[4vw] xs:gap-[5vw]">
                <div class="w-full col-span-2">
                    <p class="md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw] font-semibold text-theme-blue">
                        Get In Touch
                    </p>
                    <h2 class="md:text-[2vw] sm:text-[3vw] xs:text-[4.5vw] font-semibold py-2">
                        Have Any Question?
                    </h2>
                    <div class="w-full flex flex-col gap-2">
                        <div
                            class="w-full md:p-[1vw] sm:p-[2vw] xs:p-[3vw] flex items-center gap-3 border border-gray-300 rounded-md">
                            <div
                                class="md:w-[3vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3vw] sm:h-[5.5vw] xs:h-[7.5vw] flex items-center justify-center rounded-md bg-theme-blue/20 text-theme-blue md:text-[1.3vw] sm:text-[2.3vw] xs:text-[3.8vw]">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <h4 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                                    Address
                                </h4>
                                <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-gray-500">
                                    1234 Willow Cove Dr. Springfield, IL 62704
                                </p>
                            </div>
                        </div>

                        <div
                            class="w-full md:p-[1vw] sm:p-[2vw] xs:p-[3vw] flex items-center gap-3 border border-gray-300 rounded-md">
                            <div
                                class="md:w-[3vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3vw] sm:h-[5.5vw] xs:h-[7.5vw] flex items-center justify-center rounded-md bg-theme-blue/20 text-theme-blue md:text-[1.3vw] sm:text-[2.3vw] xs:text-[3.8vw]">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <h4 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                                    Phone Number
                                </h4>
                                <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-gray-500">
                                    +213 (1234) 1235 456
                                </p>
                            </div>
                        </div>

                        <div
                            class="w-full md:p-[1vw] sm:p-[2vw] xs:p-[3vw] flex items-center gap-3 border border-gray-300 rounded-md">
                            <div
                                class="md:w-[3vw] sm:w-[5.5vw] xs:w-[7.5vw] md:h-[3vw] sm:h-[5.5vw] xs:h-[7.5vw] flex items-center justify-center rounded-md bg-theme-blue/20 text-theme-blue md:text-[1.3vw] sm:text-[2.3vw] xs:text-[3.8vw]">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] font-semibold">
                                    Email Address
                                </h4>
                                <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-gray-500">
                                    info@telemedmenu.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full col-span-3 flex flex-col gap-3">
                    <div class="w-full flex items-center gap-3 sm:flex-row xs:flex-col">
                        <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-1">
                            <label for="name" class="font-semibold">Name</label>
                            <input type="text" name="name" id="name"
                                class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] rounded-md border border-gray-300 outline-none px-3 w-full" />
                        </div>
                        <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-1">
                            <label for="email" class="font-semibold">Email</label>
                            <input type="email" name="email" id="email"
                                class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] rounded-md border border-gray-300 outline-none px-3 w-full" />
                        </div>
                    </div>
                    <div class="w-full flex items-center gap-3 sm:flex-row xs:flex-col">
                        <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-1">
                            <label for="phoneNumber" class="font-semibold">Phone Number</label>
                            <input type="number" name="phoneNumber" id="phoneNumber"
                                class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] rounded-md border border-gray-300 outline-none px-3 w-full" />
                        </div>
                        <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-1">
                            <label for="service" class="font-semibold">Service</label>
                            <input type="text" name="service" id="service"
                                class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] rounded-md border border-gray-300 outline-none px-3 w-full" />
                        </div>
                    </div>
                    <div class="w-full md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] flex flex-col gap-1">
                        <label for="message" class="font-semibold">Message</label>
                        <textarea name="message" id="message" rows="7"
                            class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] rounded-md border border-gray-300 outline-none px-3 w-full"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Location Map Section -->
    <section class="w-full">
        <div class="w-full md:py-[5vw] sm:py-[6vw] xs:py-[7vw] md:h-[45vw] sm:h-[75vw] xs:h-[95vw]">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.05065497156!2d-74.30917427741898!3d40.69719334199166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1749796909986!5m2!1sen!2s"
                class="w-full h-full" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
