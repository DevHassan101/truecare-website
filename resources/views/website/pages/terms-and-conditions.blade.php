@extends('website.layouts.app')
@section('content')
    <!-- About Hero Section -->
    <section class="w-full bg-theme-blue/10">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw] text-center">
            <h1 class="md:text-[2vw] sm:text-[3vw] xs:text-[4.5vw] font-semibold">
                Terms & Conditions
            </h1>
        </div>
    </section>

    <section class="w-full">
        <div class="md:max-w-[85%] mx-auto px-5 md:py-[5vw] sm:py-[6vw] xs:py-[7vw]">
            <h4 class="md:text-[1.4vw] sm:text-[2.4vw] xs:text-[3.9vw] font-semibold">
                Privacy Policy for TelemedMenu
            </h4>
            <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] py-4 text-gray-600">
                TelemedMenu.com (“we,” “our,” or “us”) is committed to protecting
                your privacy. This Privacy Policy outlines how we collect, use,
                disclose, and safeguard your information when you visit our website
                or use our telehealth services.
            </p>
            <h4 class="md:text-[1.4vw] sm:text-[2.4vw] xs:text-[3.9vw] font-semibold">
                Information We Collect
            </h4>
            <div class="flex flex-col gap-2 py-4">
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Personal Information: Name, date of birth, address, phone
                        number, email address.
                    </p>
                </div>
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Health Information: Medical history, symptoms, diagnoses,
                        prescriptions, and other healthcare-related information.
                    </p>
                </div>
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Payment Details: Credit/debit card information for billing
                        purposes (processed securely via Stripe).
                    </p>
                </div>
            </div>

            <h4 class="md:text-[1.4vw] sm:text-[2.4vw] xs:text-[3.9vw] font-semibold">
                How We Use Your Information
            </h4>
            <div class="flex flex-col gap-2 py-4">
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Provide and manage telehealth services.
                    </p>
                </div>
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Schedule appointments and conduct consultations.
                    </p>
                </div>
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Maintain accurate medical records.
                    </p>
                </div>
            </div>

            <h4 class="md:text-[1.4vw] sm:text-[2.4vw] xs:text-[3.9vw] font-semibold">
                Data Sharing and Disclosure
            </h4>
            <div class="flex flex-col gap-2 py-4">
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Licensed healthcare professionals providing your care.
                    </p>
                </div>
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Third-party service providers (e.g., doxy.me for video visits,
                        Stripe for payments).
                    </p>
                </div>
            </div>

            <h4 class="md:text-[1.4vw] sm:text-[2.4vw] xs:text-[3.9vw] font-semibold">
                Data Security
            </h4>
            <div class="flex flex-col gap-2 py-4">
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        We implement industry-standard safeguards including encryption
                        and secure servers to protect your personal and health
                        information.
                    </p>
                </div>
            </div>

            <h4 class="md:text-[1.4vw] sm:text-[2.4vw] xs:text-[3.9vw] font-semibold">
                Your Rights
            </h4>
            <div class="flex flex-col gap-2 py-4">
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Access your personal data.
                    </p>
                </div>
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Correct or update information.
                    </p>
                </div>
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Request deletion (subject to legal requirements).
                    </p>
                </div>
                <div class="flex xs:items-start sm:items-center gap-3">
                    <div class="p-1.5 bg-theme-blue rounded-full"></div>
                    <p class="md:text-[1.1vw] sm:text-[2.1vw] xs:text-[3.6vw] text-gray-600">
                        Withdraw consent for non-essential data use.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
