@extends('website.layouts.app')
@section('content')
    <style>
        .hero-overlay {
            background: linear-gradient(135deg,
                    rgba(78, 70, 229, 0.880) 10%,
                    rgba(90, 33, 182, 0.750) 70%,
                    rgba(236, 72, 154, 0.850) 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid #ff7fbf;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary1 {
            background: linear-gradient(135deg, #EC4899, #DB2777);
            border: 1px solid #EC4899;
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.4);
        }

        .btn-primary2 {
            background: linear-gradient(135deg, #ffffff, #dddddd);
            border: 2px solid #ff7fbf;
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.4);
        }

        .stat-card:hover {
            transform: translateY(-8px) rotate(-2deg);
        }

        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
        }
    </style>

    <section class="relative min-h-screen flex items-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=1920&h=1080&fit=crop&q=80"
                alt="Medical Team" class="w-full h-full object-cover" />
            <div class="absolute inset-0 hero-overlay"></div>
        </div>

        <!-- Decorative Animated Shapes -->
        <div
            class="absolute top-20 right-10 w-96 h-96 bg-gradient-to-br from-[#EC4899]/30 to-transparent rounded-full blur-3xl">
        </div>
        <div
            class="absolute bottom-32 left-10 w-80 h-80 bg-gradient-to-tr from-[#F5F3FF]/20 to-transparent rounded-full blur-3xl">
        </div>
        <div
            class="absolute top-1/3 right-1/4 w-64 h-64 bg-gradient-to-bl from-white/10 to-transparent rounded-full blur-2xl">
        </div>

        <!-- Main Content Container -->
        <div class="relative z-10 max-w-7xl mx-auto px-6 pt-14 pb-28 w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- LEFT SIDE - Main Content -->
                <div class="text-white slide-in-left">
                    <!-- Trust Badge -->
                    <div
                        class="inline-flex items-center mb-8 px-5 py-2 glass-card rounded-full hover:scale-105 transition-transform duration-300">
                        <iconify-icon icon="streamline-plump:leaf-protect-solid" width="15" height="15"
                            style="color: #ff90c8"></iconify-icon>
                        <span class="font-semibold text-white ml-2">Trusted by 50,000+ Patients</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-6xl md:text-7xl lg:text-6xl font-bold leading-tight mb-5">
                        Your Virtual Clinic for Instant <span class="text-[#ff97cb]">Expert Care</span>
                    </h1>

                    <!-- Subheading -->
                    <p class="text-xl text-white/95 mb-8 leading-relaxed font-medium max-w-2xl">
                        Experience compassionate care from board-certified healthcare professionals.
                        <span class="font-semibold text-[#ff97cb]">Instant consultations</span>, personalized treatment
                        plans,
                        and <span class="font-semibold text-[#FDE68A]">24/7 support</span> at your fingertips.
                    </p>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-5 mb-10">
                        <button
                            class="group px-8 py-4 btn-primary1 text-white rounded-full font-semibold text-md 
                            transition-all duration-300 flex items-center gap-3">
                            <iconify-icon icon="lucide:video" width="23" style="color: white;"></iconify-icon>
                            <span>Start Video Call</span>
                        </button>
                        <button
                            class="px-8 py-4 btn-primary2 text-[#EC4899] rounded-full font-semibold text-md 
                            transition-all duration-300 flex items-center gap-3">
                            <iconify-icon icon="solar:chat-dots-outline" width="23"
                                style="color: #EC4899;"></iconify-icon>
                            <span>Chat with Doctor</span>
                        </button>
                    </div>

                    <!-- Stats Row -->
                    <div class="grid grid-cols-3 gap-6">
                        <div class="glass-card rounded-3xl p-5 text-center stat-card">
                            <div class="text-4xl font-black text-[#FDE68A] mb-2">24/7</div>
                            <div class="text-sm font-semibold text-white/90 uppercase tracking-wide">Available</div>
                        </div>
                        <div class="glass-card rounded-3xl p-5 text-center stat-card">
                            <div class="text-4xl font-black text-[#FDE68A] mb-2">500+</div>
                            <div class="text-sm font-semibold text-white/90 uppercase tracking-wide">Specialists</div>
                        </div>
                        <div class="glass-card rounded-3xl p-5 text-center stat-card">
                            <div class="text-4xl font-black text-[#FDE68A] mb-2">98%</div>
                            <div class="text-sm font-semibold text-white/90 uppercase tracking-wide">Satisfaction</div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDE - Feature Cards Grid -->
                <div class="hidden lg:block slide-in-right">
                    <div class="grid grid-cols-2 gap-6">

                        <!-- Card 1 -->
                        <div
                            class="glass-card rounded-3xl p-8 transition-all duration-300 hover:bg-white/20 transform hover:-translate-y-3">
                            <div
                                class="w-20 h-20 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-3xl flex items-center justify-center mb-6 shadow-lg floating">
                                <iconify-icon icon="hugeicons:finger-access" width="42"
                                    style="color: white"></iconify-icon>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-3">Instant Access</h3>
                            <p class="text-white/80 leading-relaxed">Connect with doctors in under 2 minutes. No waiting
                                rooms, no delays.</p>
                        </div>

                        <!-- Card 2 -->
                        <div
                            class="glass-card rounded-3xl p-8 transition-all duration-300 hover:bg-white/20 transform hover:-translate-y-3 mt-12">
                            <div class="w-20 h-20 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-3xl flex items-center justify-center mb-6 shadow-lg floating"
                                style="animation-delay: 0.5s;">
                                <iconify-icon icon="ri:magic-fill" width="42" style="color: white"></iconify-icon>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-3">Affordable Plans</h3>
                            <p class="text-white/80 leading-relaxed">Premium healthcare starting at just $15 per
                                consultation.</p>
                        </div>

                        <!-- Card 3 -->
                        <div
                            class="glass-card rounded-3xl p-8 transition-all duration-300 hover:bg-white/20 transform hover:-translate-y-3">
                            <div class="w-20 h-20 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-3xl flex items-center justify-center mb-6 shadow-lg floating"
                                style="animation-delay: 1s;">
                                <iconify-icon icon="solar:hand-heart-bold" width="42"
                                    style="color: white"></iconify-icon>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-3">Expert Care</h3>
                            <p class="text-white/80 leading-relaxed">Board-certified doctors with 10+ years of experience.
                            </p>
                        </div>
                        <!-- Card 4 -->
                        <div
                            class="glass-card rounded-3xl p-8 transition-all duration-300 hover:bg-white/20 transform hover:-translate-y-3 mt-12">
                            <div class="w-20 h-20 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-3xl flex items-center justify-center mb-6 shadow-lg floating"
                                style="animation-delay: 1.5s;">
                                <iconify-icon icon="pepicons-pop:headphone" width="42"
                                    style="color: white"></iconify-icon>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-3">Updated First</h3>
                            <p class="text-white/80 leading-relaxed">Seamless experience on any device, anywhere, anytime.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Decorative Wave -->
        <div class="absolute bottom-0 left-0 right-0 z-20">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path
                    d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"
                    fill="#ffffff" fill-opacity="1" />
            </svg>
        </div>
    </section>

    <section class="pt-20 pb-10 px-6 md:px-24 w-full relative overflow-hidden bg-[#ffffff]">

        <!-- Background Decorative Elements -->
        <div class="absolute top-20 right-10 w-96 h-96 bg-[#EC4899]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-[#4F46E5]/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto relative z-10">

            <!-- Section Header -->
            <div class="text-center mb-16">
                <span
                    class="inline-block text-sm font-bold text-[#4F46E5] uppercase tracking-wider mb-6 px-6 py-2 bg-[#4F46E5]/10 rounded-full border border-[#4F46E5]/20">
                    About TrueCare Platform
                </span>
                <h2 class="text-4xl sm:text-5xl lg:text-[50px] text-[#312E81] font-extrabold mb-6">
                    Revolutionizing Healthcare Access
                </h2>
                <div class="w-32 h-2 bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#4F46E5] mx-auto rounded-full mb-6">
                </div>
                <p class="text-lg text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    Connecting patients with expert healthcare professionals through <br> secure, convenient telehealth
                    solutions
                </p>
            </div>

            <!-- Hero Stats Banner -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-20">
                <div class="glass-card rounded-3xl p-8 text-center">
                    <div
                        class="text-5xl font-black bg-gradient-to-br from-[#4F46E5] to-[#EC4899] bg-clip-text text-transparent mb-3">
                        10K+
                    </div>
                    <div class="text-sm text-[#312E81] font-semibold uppercase tracking-wide">Happy Patients</div>
                </div>
                <div class="glass-card rounded-3xl p-8 text-center" style="animation-delay: 0.2s;">
                    <div
                        class="text-5xl font-black bg-gradient-to-br from-[#4F46E5] to-[#EC4899] bg-clip-text text-transparent mb-3">
                        500+
                    </div>
                    <div class="text-sm text-[#312E81] font-semibold uppercase tracking-wide">Expert Doctors</div>
                </div>
                <div class="glass-card rounded-3xl p-8 text-center" style="animation-delay: 0.4s;">
                    <div
                        class="text-5xl font-black bg-gradient-to-br from-[#4F46E5] to-[#EC4899] bg-clip-text text-transparent mb-3">
                        98%
                    </div>
                    <div class="text-sm text-[#312E81] font-semibold uppercase tracking-wide">Satisfaction Rate</div>
                </div>
                <div class="glass-card rounded-3xl p-8 text-center" style="animation-delay: 0.6s;">
                    <div
                        class="text-5xl font-black bg-gradient-to-br from-[#4F46E5] to-[#EC4899] bg-clip-text text-transparent mb-3">
                        24/7
                    </div>
                    <div class="text-sm text-[#312E81] font-semibold uppercase tracking-wide">Medical Support</div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-24">

                <!-- Left: Story Content -->
                <div class="space-y-8">
                    <div
                        class="inline-flex items-center gap-3 bg-[#EC4899]/10 px-5 py-3 rounded-full border border-[#EC4899]/20">
                        <div class="w-3 h-3 bg-[#EC4899] rounded-full"></div>
                        <span class="text-sm font-bold text-[#EC4899] uppercase tracking-wide">Our Mission</span>
                    </div>

                    <h3 class="text-4xl lg:text-5xl font-extrabold text-[#312E81] leading-tight">
                        Making Quality Healthcare
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#4F46E5] to-[#EC4899]">
                            Accessible to Everyone
                        </span>
                    </h3>

                    <p class="text-gray-700 text-lg leading-relaxed">
                        TrueCare was founded with a clear vision: to eliminate healthcare barriers through innovative
                        telehealth technology. We connect patients with board-certified medical professionals instantly,
                        offering video consultations, secure messaging, and comprehensive care—all from the comfort of your
                        home.
                    </p>

                    <p class="text-gray-700 text-lg leading-relaxed">
                        Our platform combines cutting-edge technology with compassionate medical expertise, ensuring every
                        patient receives personalized, timely, and effective healthcare solutions.
                    </p>

                    <!-- Feature Mini Cards -->
                    <div class="grid grid-cols-2 gap-5">
                        <div
                            class="flex items-start gap-4 p-5 bg-white rounded-2xl border-2 border-[#4F46E5]/20 hover:border-[#4F46E5] hover:shadow-xl transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-xl flex items-center justify-center flex-shrink-0">
                                <iconify-icon icon="basil:video-solid" width="30" height="30"
                                    style="color: white"></iconify-icon>
                            </div>
                            <div>
                                <div class="font-bold text-[#312E81] text-lg mb-1">Video Calls</div>
                                <div class="text-sm text-gray-600">Face-to-face consultations</div>
                            </div>
                        </div>
                        <div
                            class="flex items-start gap-4 p-5 bg-white rounded-2xl border-2 border-[#EC4899]/20 hover:border-[#EC4899] hover:shadow-xl transition-all duration-300">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-xl flex items-center justify-center flex-shrink-0">
                                <iconify-icon icon="mdi:email-secure" width="30" height="30"
                                    style="color: white"></iconify-icon>
                            </div>
                            <div>
                                <div class="font-bold text-[#312E81] text-lg mb-1">Secure Chat</div>
                                <div class="text-sm text-gray-600">Instant messaging</div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <a href="{{ route('doctors') }}" class="inline-block">
                        <button
                            class="px-10 py-5 bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#EC4899] text-white font-semibold text-[18px] rounded-full hover:shadow-2xl hover:shadow-[#EC4899]/50 transition-all duration-300 flex items-center gap-3 ">
                            <iconify-icon icon="teenyicons:calendar-tick-solid" width="17"
                                height="17"></iconify-icon>
                            <span>Book Your Consultation</span>
                        </button>
                    </a>
                </div>

                <!-- Right: Image Grid -->
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div
                            class="group relative overflow-hidden rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500">
                            <img src="https://img.freepik.com/free-photo/medium-shot-doctor-holding-smartphone_23-2149726942.jpg?semt=ais_hybrid&w=740&q=80"
                                class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="Medical Consultation">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#4F46E5]/90 via-transparent to-transparent opacity-100 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="absolute bottom-6 left-6 flex justify-center items-center text-white font-semibold text-lg opacity-100 group-hover:opacity-100 transition-opacity duration-500">
                                <iconify-icon icon="basil:video-solid" width="24" height="24"></iconify-icon>
                                &nbsp;
                                Video Consultations
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-3xl p-8 text-white shadow-xl">
                            <iconify-icon icon="tdesign:secured-filled" width="35" height="35"
                                style="color: white"></iconify-icon>
                            <div class="text-3xl font-bold mb-2">HIPAA</div>
                            <div class="text-sm opacity-90">Fully compliant & secure</div>
                        </div>
                    </div>
                    <div class="space-y-6 pt-12">
                        <div class="bg-white rounded-3xl p-8 shadow-xl border-2 border-[#EC4899]/35">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-16 h-16 bg-[#EC4899]/10 rounded-2xl flex items-center justify-center">
                                    <iconify-icon icon="fluent:people-community-12-filled" width="35" height="35"
                                        style="color: #EC4899"></iconify-icon>
                                </div>
                                <div>
                                    <div class="font-bold text-[#312E81] text-lg">Patient Community</div>
                                    <div class="text-sm text-gray-600">Trusted network</div>
                                </div>
                            </div>
                            <div class="flex -space-x-3">
                                <div
                                    class="w-12 h-12 rounded-full bg-gradient-to-br from-[#4F46E5] to-[#312E81] border-4 border-white">
                                </div>
                                <div
                                    class="w-12 h-12 rounded-full bg-gradient-to-br from-[#EC4899] to-[#DB2777] border-4 border-white">
                                </div>
                                <div
                                    class="w-12 h-12 rounded-full bg-gradient-to-br from-[#312E81] to-[#4F46E5] border-4 border-white">
                                </div>
                                <div
                                    class="w-12 h-12 rounded-full bg-[#EC4899]/30 border-4 border-white flex items-center justify-center text-sm font-bold text-[#312E81]">
                                    +10K
                                </div>
                            </div>
                        </div>
                        <div
                            class="group relative overflow-hidden rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 hover-lift">
                            <img src="https://etimg.etb2bimg.com/thumb/msid-123574132,width-1200,height-900,resizemode-4/.jpg"
                                class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="Healthcare Professional">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#EC4899]/90 via-transparent to-transparent opacity-100 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="absolute bottom-6 left-6 flex justify-center items-center text-white font-semibold text-lg opacity-100 group-hover:opacity-100 transition-opacity duration-500">
                                <iconify-icon icon="ri:user-community-fill" width="24" height="24"></iconify-icon>
                                &nbsp;
                                Expert Doctors
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="mt-10 pb-24 px-6 md:px-12 lg:px-24 relative overflow-hidden bg-[#ffffff]">

        <!-- Background Decorations -->
        <div class="absolute top-20 right-10 w-96 h-96 bg-[#EC4899]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-[#4F46E5]/10 rounded-full blur-3xl"></div>

        <div class="max-w-[85rem] mx-auto relative z-10">

            <!-- Section Header -->
            <div class="text-center mb-20">
                <span
                    class="inline-block text-sm font-bold text-[#4F46E5] uppercase tracking-wider mb-6 px-6 py-2 bg-[#4F46E5]/10 rounded-full border border-[#4F46E5]/20">
                    Comprehensive Healthcare Solutions
                </span>

                <h2 class="text-4xl sm:text-5xl lg:text-[50px] text-[#312E81] font-extrabold mb-6">
                    Our Telehealth Services
                </h2>

                <div class="w-32 h-2 bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#4F46E5] mx-auto rounded-full mb-6">
                </div>

                <p class="text-lg text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    Access world-class medical care from anywhere. Our expert physicians provide comprehensive telehealth
                    services tailored to your needs.
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">

                <!-- Service Card 1: Urgent Care -->
                <div class="service-card gradient-border group bg-white border border-[#EC4899]/60 rounded-3xl p-8 shadow-lg hover:shadow-2xl"
                    style="animation-delay: 0.1s;">
                    <div class="relative">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#EC4899]/40 icon-float group-hover:scale-110 transition-transform duration-300">
                            <iconify-icon icon="healthicons:emergency-post" class="text-white text-5xl"></iconify-icon>
                        </div>

                        <div
                            class="absolute top-0 right-0 opacity-100 group-hover:opacity-100 transition-opacity duration-300">
                            <span
                                class="flex items-center gap-2 text-xs font-bold text-[#EC4899] bg-[#EC4899]/10 px-3 py-1.5 rounded-full">
                                <iconify-icon icon="mdi:clock-fast" class="text-base"></iconify-icon>
                                Fast Response
                            </span>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-[#312E81] mb-4 group-hover:text-[#EC4899] transition-colors">
                        Urgent Care
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        Immediate attention for non-life-threatening conditions including infections, minor injuries, fever,
                        and acute symptoms. Get treated within minutes.
                    </p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Infections</span>
                        <span class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Minor
                            Injuries</span>
                        <span class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Fever</span>
                    </div>

                    <a href="#"
                        class="inline-flex items-center gap-2 text-[#EC4899] font-bold group-hover:gap-4 transition-all">
                        <span>Learn More</span>
                        <iconify-icon icon="mdi:arrow-right" class="text-xl"></iconify-icon>
                    </a>
                </div>

                <!-- Service Card 2: Primary Care -->
                <div class="service-card gradient-border group bg-white border border-[#312E81]/60 rounded-3xl p-8 shadow-lg hover:shadow-2xl"
                    style="animation-delay: 0.2s;">
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#4F46E5]/40 icon-float group-hover:scale-110 transition-transform duration-300"
                            style="animation-delay: 0.5s;">
                            <iconify-icon icon="healthicons:doctor" class="text-white text-5xl"></iconify-icon>
                        </div>

                        <div
                            class="absolute top-0 right-0 opacity-100 group-hover:opacity-100 transition-opacity duration-300">
                            <span
                                class="flex items-center gap-2 text-xs font-bold text-[#4F46E5] bg-[#4F46E5]/10 px-3 py-1.5 rounded-full">
                                <iconify-icon icon="mdi:stethoscope" class="text-base"></iconify-icon>
                                Expert Care
                            </span>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-[#312E81] mb-4 group-hover:text-[#4F46E5] transition-colors">
                        Primary Care
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        Comprehensive preventive care, routine checkups, and ongoing health management from licensed
                        physicians who become your trusted healthcare partner.
                    </p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Checkups</span>
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Screenings</span>
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Follow-ups</span>
                    </div>

                    <a href="#"
                        class="inline-flex items-center gap-2 text-[#4F46E5] font-bold group-hover:gap-4 transition-all">
                        <span>Learn More</span>
                        <iconify-icon icon="mdi:arrow-right" class="text-xl"></iconify-icon>
                    </a>
                </div>

                <!-- Service Card 3: Chronic Care -->
                <div class="service-card gradient-border group bg-white border border-[#312E81]/60 rounded-3xl p-8 shadow-lg hover:shadow-2xl"
                    style="animation-delay: 0.3s;">
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#312E81] to-[#4F46E5] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#312E81]/40 icon-float group-hover:scale-110 transition-transform duration-300"
                            style="animation-delay: 1s;">
                            <iconify-icon icon="healthicons:heartbeat" class="text-white text-5xl"></iconify-icon>
                        </div>

                        <div
                            class="absolute top-0 right-0 opacity-100 group-hover:opacity-100 transition-opacity duration-300">
                            <span
                                class="flex items-center gap-2 text-xs font-bold text-[#312E81] bg-[#312E81]/10 px-3 py-1.5 rounded-full">
                                <iconify-icon icon="mdi:heart-pulse" class="text-base"></iconify-icon>
                                Long-term Care
                            </span>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-[#312E81] mb-4 group-hover:text-[#4F46E5] transition-colors">
                        Chronic Care Management
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        Ongoing support for chronic conditions like diabetes, hypertension, and heart disease with
                        personalized treatment plans and regular monitoring.
                    </p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Diabetes</span>
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Hypertension</span>
                        <span class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Heart
                            Disease</span>
                    </div>

                    <a href="#"
                        class="inline-flex items-center gap-2 text-[#312E81] font-bold group-hover:gap-4 transition-all">
                        <span>Learn More</span>
                        <iconify-icon icon="mdi:arrow-right" class="text-xl"></iconify-icon>
                    </a>
                </div>

                <!-- Service Card 4: Mental Health -->
                <div class="service-card gradient-border group bg-white border border-[#EC4899]/60 rounded-3xl p-8 shadow-lg hover:shadow-2xl"
                    style="animation-delay: 0.4s;">
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#EC4899]/40 icon-float group-hover:scale-110 transition-transform duration-300"
                            style="animation-delay: 1.5s;">
                            <iconify-icon icon="healthicons:mental-health" class="text-white text-5xl"></iconify-icon>
                        </div>

                        <div
                            class="absolute top-0 right-0 opacity-100 group-hover:opacity-100 transition-opacity duration-300">
                            <span
                                class="flex items-center gap-2 text-xs font-bold text-[#EC4899] bg-[#EC4899]/10 px-3 py-1.5 rounded-full">
                                <iconify-icon icon="mdi:brain" class="text-base"></iconify-icon>
                                Confidential
                            </span>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-[#312E81] mb-4 group-hover:text-[#EC4899] transition-colors">
                        Mental Health Support
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        Compassionate mental health care including anxiety, depression, and stress management with licensed
                        therapists and psychiatrists available 24/7.
                    </p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Anxiety</span>
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Depression</span>
                        <span class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Stress</span>
                    </div>

                    <a href="#"
                        class="inline-flex items-center gap-2 text-[#EC4899] font-bold group-hover:gap-4 transition-all">
                        <span>Learn More</span>
                        <iconify-icon icon="mdi:arrow-right" class="text-xl"></iconify-icon>
                    </a>
                </div>

                <!-- Service Card 5: Prescriptions -->
                <div class="service-card gradient-border group bg-white border border-[#312E81]/60 rounded-3xl p-8 shadow-lg hover:shadow-2xl"
                    style="animation-delay: 0.5s;">
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#4F46E5]/40 icon-float group-hover:scale-110 transition-transform duration-300"
                            style="animation-delay: 2s;">
                            <iconify-icon icon="healthicons:medicines" class="text-white text-5xl"></iconify-icon>
                        </div>

                        <div
                            class="absolute top-0 right-0 opacity-100 group-hover:opacity-100 transition-opacity duration-300">
                            <span
                                class="flex items-center gap-2 text-xs font-bold text-[#4F46E5] bg-[#4F46E5]/10 px-3 py-1.5 rounded-full">
                                <iconify-icon icon="mdi:pill" class="text-base"></iconify-icon>
                                Quick Delivery
                            </span>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-[#312E81] mb-4 group-hover:text-[#4F46E5] transition-colors">
                        Prescription Services
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        Fast and secure prescription requests, renewals, and delivery. Get medications sent directly to your
                        pharmacy with electronic prescriptions.
                    </p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">New
                            Scripts</span>
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Renewals</span>
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">E-Delivery</span>
                    </div>

                    <a href="#"
                        class="inline-flex items-center gap-2 text-[#4F46E5] font-bold group-hover:gap-4 transition-all">
                        <span>Learn More</span>
                        <iconify-icon icon="mdi:arrow-right" class="text-xl"></iconify-icon>
                    </a>
                </div>

                <!-- Service Card 6: Wellness Programs -->
                <div class="service-card gradient-border group bg-white border border-[#EC4899]/60 rounded-3xl p-8 shadow-lg hover:shadow-2xl"
                    style="animation-delay: 0.6s;">
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#EC4899]/40 icon-float group-hover:scale-110 transition-transform duration-300"
                            style="animation-delay: 2.5s;">
                            <iconify-icon icon="healthicons:exercise-running" class="text-white text-5xl"></iconify-icon>
                        </div>

                        <div
                            class="absolute top-0 right-0 opacity-100 group-hover:opacity-100 transition-opacity duration-300">
                            <span
                                class="flex items-center gap-2 text-xs font-bold text-[#EC4899] bg-[#EC4899]/10 px-3 py-1.5 rounded-full">
                                <iconify-icon icon="mdi:heart-circle" class="text-base"></iconify-icon>
                                Holistic Care
                            </span>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-[#312E81] mb-4 group-hover:text-[#EC4899] transition-colors">
                        Wellness Programs
                    </h3>

                    <p class="text-gray-600 leading-relaxed mb-6">
                        Personalized wellness programs including weight management, nutrition counseling, fitness plans, and
                        preventive health optimization strategies.
                    </p>

                    <div class="flex flex-wrap gap-2 mb-6">
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Nutrition</span>
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Fitness</span>
                        <span
                            class="px-3 py-1 bg-[#F5F3FF] text-[#4F46E5] text-xs font-semibold rounded-full">Prevention</span>
                    </div>

                    <a href="#"
                        class="inline-flex items-center gap-2 text-[#EC4899] font-bold group-hover:gap-4 transition-all">
                        <span>Learn More</span>
                        <iconify-icon icon="mdi:arrow-right" class="text-xl"></iconify-icon>
                    </a>
                </div>

            </div>

            <!-- Bottom CTA Section -->
            <div
                class="relative bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#312E81] rounded-3xl p-12 md:p-16 text-center overflow-hidden">
                <div
                    class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAxOGMzLjMxNCAwIDYgMi42ODYgNiA2cy0yLjY4NiA2LTYgNi02LTIuNjg2LTYtNiAyLjY4Ni02IDYtNnoiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLW9wYWNpdHk9Ii4xIi8+PC9nPjwvc3ZnPg==')] opacity-20">
                </div>

                <div class="relative z-10">
                    <iconify-icon icon="healthicons:i-schedule-school-date-time"
                        class="text-7xl text-white mb-6 mx-auto"></iconify-icon>
                    <h3 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
                        Ready to Get Started?
                    </h3>
                    <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                        Book your first consultation today and experience healthcare that fits your lifestyle. Available
                        24/7 for your convenience.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('doctors') }}"
                            class="group inline-flex items-center gap-3 px-10 py-5 bg-white text-[#4F46E5] font-bold text-md rounded-full hover:bg-[#F5F3FF] hover:shadow-2xl transition-all duration-300">
                            <iconify-icon icon="healthicons:i-schedule-school-date-time" class="text-2xl"></iconify-icon>
                            <span>Book Consultation Now</span>
                            <iconify-icon icon="mdi:arrow-right"
                                class="text-2xl group-hover:translate-x-2 transition-transform"></iconify-icon>
                        </a>
                        <a href="#"
                            class="inline-flex items-center gap-3 px-10 py-5 bg-white/10 backdrop-blur-sm text-white font-bold text-md rounded-full border-2 border-white/30 hover:bg-white/20 transition-all duration-300">
                            <iconify-icon icon="mdi:chat-outline" class="text-2xl"></iconify-icon>
                            <span>Chat with Support</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="w-full py-24 px-6 bg-gradient-to-b from-[#ffffff] to-white relative overflow-hidden">

        <!-- Background Decorations -->
        <div class="absolute top-20 right-10 w-96 h-96 bg-[#EC4899]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-[#4F46E5]/10 rounded-full blur-3xl"></div>

        <div class="max-w-[83rem] mx-auto relative z-10">

            <!-- Header Section -->
            <div class="text-center mb-20">
                <span
                    class="inline-block text-sm font-bold text-[#4F46E5] uppercase tracking-wider mb-6 px-6 py-2 bg-[#4F46E5]/10 rounded-full border border-[#4F46E5]/20">
                    Meet Our Expert Doctors
                </span>

                <h2 class="text-4xl sm:text-5xl lg:text-5xl text-[#312E81] font-bold mb-6">
                    Book Your Healthcare Provider
                </h2>

                <div class="w-32 h-2 bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#312E81] mx-auto rounded-full mb-6">
                </div>

                <p class="text-lg text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    Connect with board-certified physicians and specialists. Quality care from experienced professionals you
                    can trust.
                </p>
            </div>

            <!-- Doctors Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-8">

                @forelse ($users as $user)
                    <div
                        class="bg-white rounded-3xl overflow-hidden shadow-lg border-2 border-[#4F46E5]/50 hover:border-[#4F46E5]/40 transition-all duration-500 hover:shadow-2xl hover:shadow-[#4F46E5]/30 hover:-translate-y-3 flex flex-col group">

                        <!-- Image Section -->
                        <div class="relative w-full h-96 overflow-hidden bg-gradient-to-br from-[#F5F3FF] to-[#E0E7FF]">
                            <img src="{{ asset($user->profile_image) }}" alt="{{ $user->name }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />

                            <!-- Price Badge -->
                            <div
                                class="absolute top-4 right-4 px-4 py-2 bg-gradient-to-r from-[#4F46E5] to-[#EC4899] text-white font-extrabold rounded-full shadow-2xl text-sm backdrop-blur-sm ">
                                ${{ $user->appointment_fees }}
                            </div>

                            <!-- Rating Overlay -->
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-4">
                                <div class="flex items-center">
                                    <div class="flex items-center gap-0 p-0 m-0">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= round($user->ratings['average']))
                                                <iconify-icon icon="material-symbols-light:star-rounded" width="30"
                                                    height="30" style="color: rgb(250, 204, 21)"></iconify-icon>
                                            @else
                                                <iconify-icon icon="material-symbols-light:star-rounded" width="30"
                                                    height="30" style="color: rgb(250, 204, 21)"></iconify-icon>
                                            @endif
                                        @endfor
                                    </div>
                                    <span
                                        class="px-3 py-1 bg-white/25 backdrop-blur-md rounded-full text-white text-sm font-bold border border-white/30">
                                        {{ $user->ratings['average'] }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="p-5 flex-1 flex flex-col bg-gradient-to-b from-white to-[#F5F3FF]/30">
                            <!-- Name & Specialization -->
                            <div class="mb-4">
                                <h3
                                    class="text-2xl font-extrabold text-[#312E81] mb-1 line-clamp-1 group-hover:text-[#4F46E5] transition-colors">
                                    {{ $user->name }}
                                </h3>
                                <p
                                    class="inline-block bg-gradient-to-r from-[#4F46E5]/20 to-[#4F46E5]/20 text-[#4F46E5] text-sm py-1 px-4 rounded-full font-semibold">
                                    {{ $user->qualifications }} - {{ $user->specialization }}
                                </p>
                            </div>

                            <!-- Info Cards -->
                            <div class="space-y-2 mb-4">
                                <div
                                    class="flex items-center gap-2 p-2.5 bg-gradient-to-r from-[#EC4899]/20 to-[#F5F3FF] rounded-lg border border-[#EC4899]/20">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-[#EC4899] to-[#DB2777] rounded-lg flex items-center justify-center flex-shrink-0 shadow-md">
                                        <iconify-icon icon="material-symbols:map-rounded" width="18" height="18"
                                            style="color: white"></iconify-icon>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Location</p>
                                        <p class="text-sm font-bold text-[#312E81] truncate">
                                            {{ $user->state?->name ?? 'N/A' }}, {{ $user->country?->name ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-center gap-2 p-2.5 bg-gradient-to-r from-[#4F46E5]/10 to-[#F5F3FF] rounded-lg border border-[#4F46E5]/20">
                                    <div
                                        class="w-8 h-8 bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-lg flex items-center justify-center flex-shrink-0 shadow-md">
                                        <iconify-icon icon="solar:user-check-bold" width="18" height="18"
                                            style="color: white"></iconify-icon>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs text-gray-500 font-semibold uppercase tracking-wide">Status</p>
                                        <p class="text-sm font-bold text-[#312E81]">Board Certified</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div
                                class="flex justify-between items-center gap-2 pt-4 border-t-2 border-[#4F46E5]/10 mt-auto">
                                <a href="{{ route('doctor.details', ['username' => $user->uid]) }}"
                                    class="w-full py-4 px-4 text-center rounded-full bg-gradient-to-r from-[#4F46E5] via-[#4F46E5] to-[#312E81] text-white font-bold text-sm hover:shadow-xl hover:shadow-[#4F46E5]/50 transition-all duration-300 hover:scale-105 flex items-center justify-center gap-2">
                                    <iconify-icon icon="carbon:view-filled" width="18" height="18"></iconify-icon>
                                    <span>View Profile</span>
                                </a>
                                <a href="{{ route('patient.book-appointment', ['username' => $user->uid]) }}"
                                    class="w-full py-4 px-4 text-center rounded-full bg-gradient-to-r from-[#EC4899] via-[#EC4899] to-[#DB2777] text-white font-bold text-sm hover:shadow-xl hover:shadow-[#EC4899]/50 transition-all duration-300 hover:scale-105 flex items-center justify-center gap-2">
                                    <iconify-icon icon="teenyicons:calendar-tick-solid" width="18"
                                        height="18"></iconify-icon>
                                    <span>Book Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="flex flex-col items-center gap-4">
                            <iconify-icon icon="healthicons:doctor-male-outline" width="80" height="80"
                                style="color: #D1D5DB"></iconify-icon>
                            <p class="text-gray-500 text-xl font-semibold">No doctors available at the moment</p>
                            <p class="text-gray-400 text-base">Please check back later or contact support</p>
                        </div>
                    </div>
                @endforelse

            </div>

            <!-- View All Button -->
            @if (count($users) > 0)
                <div class="text-center mt-16">
                    <a href="{{ route('doctors') }}"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#EC4899] text-white font-semibold text-md rounded-full hover:shadow-2xl hover:shadow-[#EC4899]/50 transition-all duration-300 hover:scale-105">
                        <iconify-icon icon="healthicons:doctor" width="25" height="25"></iconify-icon>
                        <span>View All Doctors</span>
                        <iconify-icon icon="mdi:arrow-right" width="25" height="25"></iconify-icon>
                    </a>
                </div>
            @endif

        </div>
    </section>

    <section class="py-24 px-6 w-full bg-gradient-to-b from-white to-[#ffffff] relative overflow-hidden">

        <div class="absolute top-20 right-10 w-96 h-96 bg-[#EC4899]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-[#4F46E5]/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto relative z-10">

            <!-- Section Header -->
            <div class="text-center mb-20">
                <span
                    class="inline-block text-sm font-bold text-[#4F46E5] uppercase tracking-wider mb-6 px-6 py-2 bg-[#4F46E5]/10 rounded-full border border-[#4F46E5]/20">
                    Patient Testimonials
                </span>

                <h2 class="text-4xl sm:text-5xl lg:text-5xl text-[#312E81] font-extrabold mb-6">
                    What Our <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-[#4F46E5] to-[#EC4899]">Patients</span>
                    Say
                </h2>

                <div class="w-32 h-2 bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#4F46E5] mx-auto rounded-full mb-6">
                </div>

                <p class="text-gray-700 text-lg max-w-3xl mx-auto leading-relaxed">
                    Real stories from real patients who have experienced quality healthcare <br> through our telehealth
                    platform.
                </p>
            </div>

            <!-- Navigation Arrows (Dummy - no functionality) -->
            <div class="flex justify-between items-center absolute top-120 left-0 right-0 z-50 w-full gap-4">
                <button
                    class="group w-14 h-14 rounded-xl -ml-20 bg-white border-2 border-[#4F46E5] flex items-center justify-center text-[#4F46E5] hover:bg-[#4F46E5] hover:text-white transition-all duration-300 shadow-md hover:shadow-xl">
                    <iconify-icon icon="mdi:chevron-left" width="28" height="28"
                        class="group-hover:-translate-x-0.5 transition-transform"></iconify-icon>
                </button>
                <button
                    class="group w-14 h-14 rounded-xl -mr-20 bg-white border-2 border-[#4F46E5] flex items-center justify-center text-[#4F46E5] hover:bg-[#EC4899] hover:text-white transition-all duration-300 shadow-md hover:shadow-xl">
                    <iconify-icon icon="mdi:chevron-right" width="28" height="28"
                        class="group-hover:translate-x-0.5 transition-transform"></iconify-icon>
                </button>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Testimonial Card 1 -->
                <div class="group hover:-translate-y-3 transition-all duration-500 rounded-3xl">
                    <div
                        class="border-2 border-[#4F46E5]/20 hover:border-[#4F46E5]/40 bg-white p-8 rounded-3xl relative overflow-hidden shadow-lg hover:shadow-2xl hover:shadow-[#4F46E5]/20 transition-all duration-500">

                        <!-- Decorative Circle -->
                        <div
                            class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-br from-[#4F46E5]/10 to-[#EC4899]/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <!-- Quote Icon -->
                        <div class="relative mb-6">
                            <div
                                class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#4F46E5] to-[#312E81] flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <iconify-icon icon="mdi:format-quote-close" width="32" height="32"
                                    style="color: #fff"></iconify-icon>
                            </div>
                        </div>

                        <!-- Rating Stars -->
                        <div class="flex mb-4">
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                        </div>

                        <p class="text-gray-700 leading-relaxed mb-8 text-base">
                            "TrueCare made getting medical help so easy! I had a video consultation with a doctor within
                            minutes. The doctor was professional, caring, and prescribed exactly what I needed. Highly
                            recommend for urgent care!"
                        </p>

                        <!-- Divider -->
                        <div class="h-px bg-gradient-to-r from-transparent via-[#4F46E5]/30 to-transparent mb-6"></div>

                        <!-- Profile -->
                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://automaster.ee/wp-content/uploads/2019/02/person2.jpg"
                                    class="w-16 h-16 rounded-2xl object-cover ring-4 ring-[#4F46E5]/30 group-hover:ring-[#4F46E5]/50 transition-all"
                                    alt="Sarah Mitchell">
                                <div
                                    class="absolute -bottom-1 -right-1 w-6 h-6 bg-gradient-to-br from-[#4F46E5] to-[#EC4899] rounded-full border-4 border-white flex items-center justify-center shadow-lg">
                                    <iconify-icon icon="mdi:check" width="14" height="14"
                                        style="color: white"></iconify-icon>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#312E81] text-lg group-hover:text-[#4F46E5] transition-colors">
                                    Sarah Mitchell</h4>
                                <span class="text-sm text-gray-600 font-medium">Patient - New York</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 2 -->
                <div class="group hover:-translate-y-3 transition-all duration-500 rounded-3xl">
                    <div
                        class="border-2 border-[#EC4899]/20 hover:border-[#EC4899]/40 bg-white p-8 rounded-3xl relative overflow-hidden shadow-lg hover:shadow-2xl hover:shadow-[#EC4899]/20 transition-all duration-500">

                        <div
                            class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-br from-[#EC4899]/10 to-[#4F46E5]/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <div class="relative mb-6">
                            <div
                                class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#EC4899] to-[#DB2777] flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <iconify-icon icon="mdi:format-quote-close" width="32" height="32"
                                    style="color: #fff"></iconify-icon>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                        </div>

                        <p class="text-gray-700 leading-relaxed mb-8 text-base">
                            "As someone managing diabetes, TrueCare has been a lifesaver. My doctor monitors my condition
                            regularly through video calls, and I can message anytime. The convenience is unmatched and the
                            care is exceptional."
                        </p>

                        <div class="h-px bg-gradient-to-r from-transparent via-[#EC4899]/30 to-transparent mb-6"></div>

                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQICSVq9-BAcWmscgA5pQyPPxdeJGu6p6w-0Q&s"
                                    class="w-16 h-16 rounded-2xl object-cover ring-4 ring-[#EC4899]/30 group-hover:ring-[#EC4899]/50 transition-all"
                                    alt="Michael Rodriguez">
                                <div
                                    class="absolute -bottom-1 -right-1 w-6 h-6 bg-gradient-to-br from-[#EC4899] to-[#4F46E5] rounded-full border-4 border-white flex items-center justify-center shadow-lg">
                                    <iconify-icon icon="mdi:check" width="14" height="14"
                                        style="color: white"></iconify-icon>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#312E81] text-lg group-hover:text-[#EC4899] transition-colors">
                                    Michael Rodriguez</h4>
                                <span class="text-sm text-gray-600 font-medium">Patient - California</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 3 -->
                <div class="group hover:-translate-y-3 transition-all duration-500 rounded-3xl">
                    <div
                        class="border-2 border-[#312E81]/20 hover:border-[#312E81]/40 bg-white p-8 rounded-3xl relative overflow-hidden shadow-lg hover:shadow-2xl hover:shadow-[#312E81]/20 transition-all duration-500">

                        <div
                            class="absolute -top-10 -right-10 w-32 h-32 bg-gradient-to-br from-[#312E81]/10 to-[#4F46E5]/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                        </div>

                        <div class="relative mb-6">
                            <div
                                class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#312E81] to-[#4F46E5] flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <iconify-icon icon="mdi:format-quote-close" width="32" height="32"
                                    style="color: #fff"></iconify-icon>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                            <iconify-icon icon="material-symbols-light:star-rounded" width="32" height="32"
                                style="color: rgb(250, 204, 21)"></iconify-icon>
                        </div>

                        <p class="text-gray-700 leading-relaxed mb-8 text-base">
                            "I was skeptical about telehealth, but TrueCare changed my mind completely. The mental health
                            support I received was compassionate and professional. It's easier to open up from home, and my
                            therapist is amazing!"
                        </p>

                        <div class="h-px bg-gradient-to-r from-transparent via-[#312E81]/30 to-transparent mb-6"></div>

                        <div class="flex items-center gap-4">
                            <div class="relative">
                                <img src="https://automaster.ee/wp-content/uploads/2019/02/person5.jpg"
                                    class="w-16 h-16 rounded-2xl object-cover ring-4 ring-[#312E81]/30 group-hover:ring-[#312E81]/50 transition-all"
                                    alt="Emily Chen">
                                <div
                                    class="absolute -bottom-1 -right-1 w-6 h-6 bg-gradient-to-br from-[#312E81] to-[#EC4899] rounded-full border-4 border-white flex items-center justify-center shadow-lg">
                                    <iconify-icon icon="mdi:check" width="14" height="14"
                                        style="color: white"></iconify-icon>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-[#312E81] text-lg group-hover:text-[#4F46E5] transition-colors">
                                    Emily Chen</h4>
                                <span class="text-sm text-gray-600 font-medium">Patient - Texas</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom CTA -->
            <div class="text-center mt-16">
                <p class="text-gray-600 text-lg mb-6">
                    Join thousands of satisfied patients experiencing quality healthcare
                </p>
                <a href="{{ route('doctors') }}"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-[#4F46E5] via-[#EC4899] to-[#EC4899] text-white font-semibold text-md rounded-full hover:shadow-2xl hover:shadow-[#EC4899]/50 transition-all duration-300 hover:scale-105">
                    <iconify-icon icon="healthicons:doctor" width="25" height="25"></iconify-icon>
                    <span>Start Truecare Journey</span>
                    <iconify-icon icon="mdi:arrow-right" width="25" height="25"></iconify-icon>
                </a>
            </div>

        </div>
    </section>

@endsection
