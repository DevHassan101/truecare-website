 <style>
     .nav-link {
         position: relative;
         transition: color 0.3s ease;
     }

     .nav-link::after {
         content: '';
         position: absolute;
         bottom: 0;
         left: 0;
         width: 0;
         height: 2px;
         background: #EC4899;
         transition: width 0.3s ease;
     }

     .nav-link:hover::after {
         width: 100%;
     }

     .mobile-menu {
         transform: translateX(-100%);
         transition: transform 0.3s ease-in-out;
     }

     .mobile-menu.active {
         transform: translateX(0);
     }

     .btn-appointment {
         background: linear-gradient(135deg, #EC4899, #DB2777);
         box-shadow: 0 2px 5px rgba(236, 72, 153, 0.3);
         transition: all 0.3s ease;
     }

     .btn-appointment:hover {
         background: linear-gradient(135deg, #DB2777, #BE185D);
         box-shadow: 0 6px 20px rgba(236, 72, 153, 0.5);
         transform: translateY(-2px);
     }
 </style>

 <header class="hidden md:block bg-[#4F46E5] text-white text-sm">
     <div class="max-w-[88%] mx-auto py-3 px-5 flex items-center justify-between">
         <div class="flex items-center gap-6">
             <div class="flex items-center gap-2 hover:text-[#EC4899] transition-colors cursor-pointer">
                 <iconify-icon icon="mdi:email-outline" width="18" height="18"
                     style="color: white"></iconify-icon>
                 <p class="text-[16px]">support@carepoint.com</p>
             </div>
             <div class="flex items-center gap-2 hover:text-[#EC4899] transition-colors cursor-pointer">
                 <iconify-icon icon="tabler:phone" width="18" height="18" style="color: white"></iconify-icon>
                 <p class="text-[16px]">+1 (803) 656-1244</p>
             </div>
         </div>
         <div class="flex items-center gap-4">
             @auth
                 <form action="{{ route('logout') }}" method="post">
                     @csrf
                     <button class="btn-appointment py-2 px-6 rounded-full transition-colors flex items-center gap-1" type="submit">
                        <iconify-icon icon="iconamoon:exit" width="17" height="17"
                         style="color: white"></iconify-icon>
                        Doctor Logout
                    </button>
                 </form>
             @else
                 <a href="{{ route('patient.login') }}"
                     class="btn-appointment py-2 px-6 rounded-full transition-colors flex items-center gap-1">
                     <iconify-icon icon="basil:user-solid" width="17" height="17"
                         style="color: white"></iconify-icon>
                     Patient Login
                 </a>
                 <a href="{{ route('doctor.login') }}"
                     class="btn-appointment py-2 px-6 rounded-full transition-colors flex items-center gap-1">
                     <iconify-icon icon="healthicons:doctor-24px" width="16" height="16"
                         style="color: white"></iconify-icon>
                     Doctor Login
                 </a>
             @endauth
             <div class="pl-6 border-l border-white/60 flex items-center gap-4">
                 <div class="flex items-center gap-2 cursor-pointer hover:text-[#EC4899] transition-colors">
                     <img class="w-5 h-5 rounded-full" src="https://flagcdn.com/w40/us.png" alt="USD" />
                     <div class="flex items-center gap-1 text-[16px]">
                         <p>USD</p>
                         <iconify-icon icon="prime:chevron-down" width="16" height="16"></iconify-icon>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>

 <header class="w-full bg-[#312E81] text-white sticky top-0 z-50 shadow-lg">
     <div class="max-w-[90%] mx-auto flex items-center justify-between px-5 py-4">
         <!-- Logo -->
         <a href="{{ url('/') }}"
             class="flex items-center gap-2 text-2xl md:text-3xl font-bold  hover:text-[#EC4899] transition-colors">
             <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 48 48">
                 <g fill="none">
                     <path fill="#fff"
                         d="M24 8.5c-8.468 0-13.761.534-16.842 1.026c-2.861.456-4.8 2.77-5.076 5.527C1.805 17.82 1.5 22.1 1.5 27.5c0 5.401.305 9.68.582 12.447c.275 2.756 2.215 5.07 5.076 5.527c3.08.492 8.374 1.026 16.842 1.026s13.761-.534 16.842-1.026c2.861-.456 4.8-2.77 5.076-5.527c.277-2.768.582-7.046.582-12.447s-.305-9.68-.582-12.447c-.275-2.756-2.215-5.07-5.076-5.527C37.762 9.034 32.468 8.5 24 8.5" />
                     <path fill="#EC4899" fill-rule="evenodd"
                         d="M21.26 5.204C21.942 5.097 22.87 5 24 5s2.059.096 2.74.204c.289.045.598.253.782.677c.33.764.708 1.712 1.022 2.674c1.534.04 2.936.097 4.214.168c-.423-1.651-1.08-3.309-1.564-4.428c-.658-1.524-2.025-2.759-3.832-3.043A22 22 0 0 0 24 1c-1.358 0-2.494.116-3.361.252c-1.807.284-3.174 1.52-3.832 3.043c-.483 1.12-1.141 2.777-1.565 4.428c1.278-.071 2.68-.129 4.215-.168c.314-.962.692-1.91 1.022-2.674c.183-.424.493-.632.781-.677m.439 32.156c-.94-.127-1.545-.933-1.58-1.882c-.033-.905-.07-2.225-.094-4.003a176 176 0 0 1-4.003-.094c-.949-.035-1.755-.64-1.882-1.58A17 17 0 0 1 14 27.5c0-.958.061-1.719.14-2.301c.127-.94.933-1.545 1.882-1.58c.905-.033 2.225-.07 4.003-.094c.024-1.778.061-3.098.094-4.003c.035-.949.64-1.755 1.58-1.882c.582-.079 1.343-.14 2.301-.14s1.719.061 2.301.14c.94.127 1.545.933 1.58 1.882c.033.905.07 2.225.094 4.003c1.778.024 3.098.061 4.003.094c.949.035 1.755.64 1.882 1.58c.079.582.14 1.343.14 2.301s-.061 1.719-.14 2.301c-.127.94-.933 1.545-1.882 1.58c-.905.033-2.225.07-4.003.094a176 176 0 0 1-.094 4.003c-.035.949-.64 1.755-1.58 1.882c-.582.079-1.343.14-2.301.14s-1.719-.061-2.301-.14"
                         clip-rule="evenodd" />
                 </g>
             </svg>
             <span class="pt-1">True<span class="text-[#fe61b0]">Care</span></span>
         </a>

         <!-- Desktop Navigation -->
         <nav class="flex items-center gap-8">
             <div class="hidden md:flex items-center gap-9 mr-16">
                 <a href="#"
                     class="nav-link flex justify-center items-center text-[17px] tracking-wide font-medium hover:text-[#EC4899] transition-colors">
                     <iconify-icon icon="fa-solid:clinic-medical" width="14" height="14"
                         class="mr-2"></iconify-icon>
                     Home
                 </a>
                 <a href="#"
                     class="nav-link flex justify-center items-center text-[17px] tracking-wide font-medium hover:text-[#EC4899] transition-colors">
                     <iconify-icon icon="ooui:special-pages-rtl" width="13" height="13"
                         class="mr-2"></iconify-icon>
                     Specialties
                 </a>
                 <a href="#"
                     class="nav-link flex justify-center items-center text-[17px] tracking-wide font-medium hover:text-[#EC4899] transition-colors">
                     <iconify-icon icon="material-symbols-light:prescriptions" width="17" height="17"
                         class="mr-2"></iconify-icon>
                     Prescriptions
                 </a>
                 <a href="#"
                     class="nav-link flex justify-center items-center text-[17px] tracking-wide font-medium hover:text-[#EC4899] transition-colors">
                     <iconify-icon icon="mingcute:heart-hand-fill" width="17" height="17"
                         class="mr-2"></iconify-icon>
                     Wellness Programs
                 </a>
                 <a href="{{ route('contact-us') }}"
                     class="nav-link flex justify-center items-center text-[17px] tracking-wide font-medium hover:text-[#EC4899] transition-colors">
                     <iconify-icon icon="basil:headphone-solid" width="17" height="17"
                         class="mr-2"></iconify-icon>
                     Contact Us
                 </a>
             </div>

             <!-- Book Appointment Button -->
             <a href="{{ route('doctors') }}"
                 class="hidden md:flex items-center gap-2 px-6 py-3 rounded-full btn-appointment text-white font-semibold">
                 <iconify-icon icon="teenyicons:calendar-tick-solid" width="17" height="17"></iconify-icon>
                 Book Consultation
             </a>

             <!-- Mobile Menu Toggle -->
             <button onclick="toggleMobileMenu()" class="md:hidden text-3xl hover:text-[#EC4899] transition-colors">
                 <iconify-icon icon="bx:menu" width="24" height="24"></iconify-icon>
             </button>
         </nav>
     </div>
 </header>

 <div id="mobileMenu"
     class="mobile-menu fixed top-0 left-0 w-72 h-screen bg-[#312E81] text-white z-40 shadow-2xl md:hidden">
     <div class="flex flex-col h-full p-8">
         <!-- Close Button -->
         <button onclick="toggleMobileMenu()" class="self-end text-3xl hover:text-[#EC4899] transition-colors mb-8">
             <i class='bx bx-x'></i>
         </button>

         <!-- Mobile Navigation Links -->
         <nav class="flex flex-col gap-6">
             <a href="#" class="text-lg hover:text-[#EC4899] transition-colors flex items-center gap-3">
                 Telehealth Services
             </a>
             <a href="#" class="text-lg hover:text-[#EC4899] transition-colors flex items-center gap-3">
                 Medical Specialties
             </a>
             <a href="#" class="text-lg hover:text-[#EC4899] transition-colors flex items-center gap-3">
                 Prescriptions
             </a>
             <a href="#" class="text-lg hover:text-[#EC4899] transition-colors flex items-center gap-3">
                 Wellness Programs
             </a>
             <a href="{{ route('contact-us') }}"
                 class="text-lg hover:text-[#EC4899] transition-colors flex items-center gap-3">
                 Support Center
             </a>

             <!-- Mobile CTA Button -->
             <a href="{{ route('doctors') }}"
                 class="mt-6 flex items-center justify-center gap-2 px-6 py-3 rounded-full btn-appointment text-white font-semibold text-center">
                 Book Consultation
             </a>

             <!-- Mobile Login Links -->
             <div class="mt-4 pt-4 border-t border-white/20 flex flex-col gap-3">
                 <a href="{{ route('patient.login') }}"
                     class="text-sm hover:text-[#EC4899] transition-colors flex items-center gap-2">
                     Patient Login
                 </a>
                 <a href="{{ route('doctor.login') }}"
                     class="text-sm hover:text-[#EC4899] transition-colors flex items-center gap-2">
                     Doctor Login
                 </a>
             </div>
         </nav>
     </div>
 </div>
