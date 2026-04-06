<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'TELEMED')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('head')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('website/static/css/style.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <style type="text/tailwindcss">
        @theme {
            --color-clifford: #da373d;
            --color-theme-blue: #0e82fd;
            --font-theme-inter: "Inter", sans-serif;
            --color-theme-navi-blue: #041e42;
            --breakpoint-xs: 300px;
        }

        * {
            font-family: "Outfit", sans-serif !important;
        }
    </style>
    {{-- <script src="https://unpkg.com/quickblox/quickblox.min.js"></script> --}}
</head>

<body class="font-theme-inter">
    @include('doctor.layouts.header')

    <main>
        <!-- About Hero Section -->
        <div class="w-full bg-[#F5F3FF] py-20">
            <div class="bg-white max-w-[92%] mx-auto border-2 border-[#4F46E5]/30 p-5 rounded-3xl">
                <section
                    class="w-full bg-gradient-to-tl from-[#4F46E5] to-[#312E81] rounded-2xl py-8 mb-8 shadow-lg relative overflow-hidden">
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
                            DOCTOR DASHBOARD
                        </h1>

                        <!-- Subtitle -->
                        <p class="text-lg md:text-lg text-white/90 font-medium text-center">
                            Welcome back, manage your practice efficiently..
                        </p>

                        <!-- Decorative Line -->
                        <div
                            class="mt-5 w-24 h-1 bg-gradient-to-r from-transparent via-white to-transparent rounded-full">
                        </div>
                    </div>
                </section>
                <!-- Dashboard Hero -->
                <section class="w-full">
                    <div class="w-full">
                        <div class="w-full xs:flex flex-col md:grid grid-cols-13 xs:gap-5 md:gap-3 relative">
                            @include('doctor.layouts.sidebar')
                            <main class="col-span-10 w-full flex flex-col gap-5">
                                @yield('content')
                            </main>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        @include('doctor.layouts.footer')
    </main>

    @stack('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"
        integrity="sha512-NcZdtrT77bJr4STcmsGAESr06BYGE8woZdSdEgqnpyqac7sugNO+Tr4bGwGF3MsnEkGKhU2KL2xh6Ec+BqsaHA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('website/static/js/common.js') }}"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
    </script>
    @session('success')
        <script>
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}",
            });
        </script>
    @endsession
    @session('warning')
        <script>
            Toast.fire({
                icon: "warning",
                title: "{{ session('warning') }}.",
            });
        </script>
    @endsession
    @session('error')
        <script>
            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}.",
            });
        </script>
    @endsession

</body>

</html>
