@extends('website.layouts.app')
@section('content')
    <!-- About Hero Section -->
    <section class="w-full bg-theme-blue/10">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw] text-center">
            <h1 class="md:text-[2vw] sm:text-[3vw] xs:text-[4.5vw] font-semibold">
                FAQ's
            </h1>
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
    </section>
@endsection
