@extends('website.layouts.app')
@section('content')
    <!-- About Hero Section -->
    <section class="w-full bg-theme-blue/10">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw] text-center">
            <h1 class="md:text-[2vw] sm:text-[3vw] xs:text-[4.5vw] font-semibold">
                About Us
            </h1>
        </div>
    </section>

    <!-- About TelemedMenu Section -->
    <section class="w-full">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw] text-center">
            <div class="w-full grid md:grid-cols-2 xs:grid-cols-1 gap-10 place-items-center">
                <div class="w-full grid grid-cols-2 gap-4">
                    <div class="w-full h-full flex items-center flex-col gap-4">
                        <div class="w-full h-[70%] overflow-hidden md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2.5vw]">
                            <img class="w-full h-full object-cover object-top"
                                src="{{ asset('website/images/AboutUs/vertical-women.png') }}" alt="" />
                        </div>
                        <div class="w-full h-[30%] overflow-hidden md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2.5vw]">
                            <img class="w-full h-full object-cover object-top"
                                src="{{ asset('website/images/AboutUs/horizontal.png') }}" alt="" />
                        </div>
                    </div>
                    <div class="w-full h-full flex items-center flex-col gap-4">
                        <div
                            class="w-full h-[30%] overflow-hidden md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2.5vw] md:p-[1vw] sm:p-[2vw] xs:p-[4vw] md:text-[1.2vw] sm:text-[2.2vw] xs:text-[3.7vw] text-white bg-theme-blue font-semibold flex items-center justify-center">
                            <p>
                                Most practitioners have 10+ years of healthcare experience
                            </p>
                        </div>
                        <div class="w-full h-[70%] overflow-hidden md:rounded-[1vw] sm:rounded-[1.5vw] xs:rounded-[2.5vw]">
                            <img class="w-full h-full object-cover object-top"
                                src="{{ asset('website/images/AboutUs/vertical-man.png') }}" alt="" />
                        </div>
                    </div>
                </div>

                <div class="md:py-[2.5vw] sm:py-[3.5vw] xs:py-[4.5vw] text-left">
                    <h4 class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-theme-blue font-semibold">
                        About TelemedMenu
                    </h4>
                    <h2
                        class="md:text-[2.2vw] sm:text-[3.2vw] xs:text-[4.7vw] md:leading-[2.7vw] sm:leading-[3.7vw] xs:leading-[5.2vw] font-semibold py-2">
                        Our mission is to give you peace and connect in a meaningful way
                        to solve all your health problems
                    </h2>
                    <dd class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] text-gray-500 pt-4">
                        Hi, it's Dr. Dominic Gaziano, internal medicine adult primary
                        care doctor based out of Chicago Illinois. I would like to
                        welcome you to TeleMed Menu. We hope to guide you on your
                        healthcare journey , by connecting with my amazing team of
                        healthcare practitioners who can connect with a variety of ways
                        to solve you heath via phone text or video chat. Telemed Menu
                        has a community of trained in urgent care, primary care, kind of
                        conditions as diabetes and high blood pressure. Whether you have
                        a symptom and you need help with the diagnosis and treatment or
                        you have a chronic condition but says it's apart is that we stay
                        with you to solve your initial problem and determine if there
                        are other stresses or their aspects of your life that may need
                        to be modified to solve health problem to help out you on a
                        better path for um wellness and happiness
                    </dd>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose TelemedMenu Section -->
    <section class="w-full">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw] text-center">
            <h2 class="md:text-[1.8vw] sm:text-[2.8vw] xs:text-[4.2vw] font-semibold text-center">
                Why Choose TelemedMenu
            </h2>

            <div
                class="md:py-[2.5vw] sm:py-[3.5vw] xs:py-[4.5vw] grid md:grid-cols-4 sm:grid-cols-2 xs:grid-cols-1 gap-5 text-left">
                <div
                    class="md:px-[1vw] sm:px-[2vw] xs:px-[3vw] md:py-[3.5vw] sm:py-[4.5vw] xs:py-[5.5vw] border border-gray-300 transition-all duration-300 hover:text-white hover:bg-theme-blue">
                    <div
                        class="md:w-[5vw] sm:w-[7vw] xs:w-[9vw] md:h-[5vw] sm:h-[7vw] xs:h-[9vw] rounded-full overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="{{ asset('website/images/WhyChoose/03b3333ea267cda9a4b34ad65b4a3fe221cdbbe0.jpg') }}"
                            alt="" />
                    </div>
                    <h4
                        class="md:text-[1.3vw] sm:text-[2.3vw] xs:text-[3.8vw] md:leading-[1.8vw] sm:leading-[2.8vw] xs:leading-[4.3vw] font-semibold pt-5">
                        Experienced, Compassionate Providers
                    </h4>
                    <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] pt-4">
                        Timely treatment for your worrisome non-life-threatening
                        symptoms, infections and injuries
                    </p>
                </div>

                <div
                    class="md:px-[1vw] sm:px-[2vw] xs:px-[3vw] md:py-[3.5vw] sm:py-[4.5vw] xs:py-[5.5vw] border border-gray-300 transition-all duration-300 hover:text-white hover:bg-theme-blue">
                    <div
                        class="md:w-[5vw] sm:w-[7vw] xs:w-[9vw] md:h-[5vw] sm:h-[7vw] xs:h-[9vw] rounded-full overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="{{ asset('website/images/WhyChoose/39ab33abccc98045e20cebd9e780344bd17d6b67.jpg') }}"
                            alt="" />
                    </div>
                    <h4
                        class="md:text-[1.3vw] sm:text-[2.3vw] xs:text-[3.8vw] md:leading-[1.8vw] sm:leading-[2.8vw] xs:leading-[4.3vw] font-semibold pt-5">
                        Focus on Treating the Whole You
                    </h4>
                    <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] pt-4">
                        Get access to healthcare anytime — day or night — with flexible
                        scheduling to suit your life.
                    </p>
                </div>

                <div
                    class="md:px-[1vw] sm:px-[2vw] xs:px-[3vw] md:py-[3.5vw] sm:py-[4.5vw] xs:py-[5.5vw] border border-gray-300 transition-all duration-300 hover:text-white hover:bg-theme-blue">
                    <div
                        class="md:w-[5vw] sm:w-[7vw] xs:w-[9vw] md:h-[5vw] sm:h-[7vw] xs:h-[9vw] rounded-full overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="{{ asset('website/images/WhyChoose/39ab33abccc98045e20cebd9e780344bd17d6b67.jpg') }}"
                            alt="" />
                    </div>
                    <h4
                        class="md:text-[1.3vw] sm:text-[2.3vw] xs:text-[3.8vw] md:leading-[1.8vw] sm:leading-[2.8vw] xs:leading-[4.3vw] font-semibold pt-5">
                        Personalized Health Education
                    </h4>
                    <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] pt-4">
                        Learn and grow with expert videos, books, and coaching designed
                        just for your wellness path.
                    </p>
                </div>
                <div
                    class="md:px-[1vw] sm:px-[2vw] xs:px-[3vw] md:py-[3.5vw] sm:py-[4.5vw] xs:py-[5.5vw] border border-gray-300 transition-all duration-300 hover:text-white hover:bg-theme-blue">
                    <div
                        class="md:w-[5vw] sm:w-[7vw] xs:w-[9vw] md:h-[5vw] sm:h-[7vw] xs:h-[9vw] rounded-full overflow-hidden">
                        <img class="w-full h-full object-cover"
                            src="{{ asset('website/images/WhyChoose/b4098c699dd748f0a6510e4eefac7832fcc747b7.jpg') }}"
                            alt="" />
                    </div>
                    <h4
                        class="md:text-[1.3vw] sm:text-[2.3vw] xs:text-[3.8vw] md:leading-[1.8vw] sm:leading-[2.8vw] xs:leading-[4.3vw] font-semibold pt-5">
                        Evidence-Based Treatment
                    </h4>
                    <p class="md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] pt-4">
                        We rely on science-backed methods and real results to ensure the
                        highest quality of care.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- TelemedMenu Member Reviews Slider Section -->
    <section class="w-full bg-theme-blue/10">
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
    </section>

    <!-- Frequently Asked Questions Sections -->
    <section class="w-full">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw]">
            <h2 class="md:text-[2.5vw] sm:text-[3.5vw] xs:text-[5vw] font-semibold text-center">
                Frequently Asked Questions
            </h2>
            <div class="md:py-[2.5vw] sm:py-[3.5vw] xs:py-[4.5vw] w-full flex flex-col gap-2">
                <div id="faq1" style="box-shadow: 0 0 10px rgb(205, 205, 205)"
                    class="w-full flex flex-col md:rounded-[0.5vw] sm:rounded-[1vw] xs:rounded-[1.5vw]">
                    <div
                        class="w-full flex items-center flex-wrap xs:justify-end md:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
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
                        class="w-full flex items-center flex-wrap xs:justify-end md:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
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
                        class="w-full flex items-center flex-wrap xs:justify-end md:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
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
                        class="w-full flex items-center flex-wrap xs:justify-end md:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
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
                        class="w-full flex items-center flex-wrap xs:justify-end md:justify-between md:p-[1vw] sm:p-[1.5vw] xs:p-[2vw]">
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
    </section>

    <!-- Become a Member Section -->
    <section class="w-full bg-white">
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
    </section>
@endsection
