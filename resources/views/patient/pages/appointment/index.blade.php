@extends('patient.layouts.app')
@section('content')
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-[#312E81]">Appointments</h1>
        <div class="relative">
            <input type="search" 
                   class="search-input w-80 pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-[#4F46E5]/10 outline-none transition-all"
                   placeholder="Search appointments..." />
            <iconify-icon icon="mdi:magnify" width="20" height="20" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></iconify-icon>
        </div>
    </div>

    <!-- Stats Cards & Filters Row -->
    <div class="flex items-center justify-between mb-6 flex-wrap gap-4">
        <!-- Stats Pills -->
        <div class="flex items-center gap-3">
            <div class="flex items-center gap-3 px-5 py-3 bg-white border-2 border-gray-200 rounded-xl hover:border-[#4F46E5] transition-colors cursor-pointer">
                <span class="font-semibold text-gray-700">Upcoming</span>
                <span class="px-3 py-1 bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white rounded-full text-sm font-bold">
                    {{ $upcoming }}
                </span>
            </div>
            <div class="flex items-center gap-3 px-5 py-3 bg-white border-2 border-gray-200 rounded-xl hover:border-[#EC4899] transition-colors cursor-pointer">
                <span class="font-semibold text-gray-700">Completed</span>
                <span class="px-3 py-1 bg-gradient-to-r from-[#EC4899] to-[#DB2777] text-white rounded-full text-sm font-bold">
                    {{ $completed }}
                </span>
            </div>
            <div class="flex items-center gap-3 px-5 py-3 bg-white border-2 border-gray-200 rounded-xl hover:border-red-500 transition-colors cursor-pointer">
                <span class="font-semibold text-gray-700">Cancelled</span>
                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-bold">
                    {{ $cancelled }}
                </span>
            </div>
        </div>

        <!-- Filters -->
        <div class="flex items-center gap-3">
            <input type="date" 
                   onchange="getAppointments()" 
                   name="startDate"
                   class="startDate px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-[#4F46E5]/10 outline-none transition-all">
            <input type="date" 
                   onchange="getAppointments()" 
                   name="endDate"
                   class="endDate px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-[#4F46E5]/10 outline-none transition-all">
            <select onchange="getAppointments()"
                    class="status px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#4F46E5] focus:ring-4 focus:ring-[#4F46E5]/10 outline-none transition-all font-semibold text-gray-700">
                <option value="upcoming">Upcoming</option>
                <option value="started">Ongoing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    <!-- Appointments List Container -->
    <div class="appointment-list space-y-4">
        <!-- Loading will be replaced by AJAX -->
    </div>

    <!-- Pagination -->
    <div class="pagination-wrapper mt-8 flex items-center justify-center">
        <!-- Pagination will be loaded by AJAX -->
    </div>

    @push('script')
        <script>
            $(document).on('click', '.pagination-wrapper a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                getAppointments(url);
            });
            
            getAppointments();
            
            $('.search-input').on('input', function(e) {
                getAppointments();
            });

            function getAppointments(url = null) {
                let status = $('.status').val();
                let startDate = $('.startDate').val();
                let endDate = $('.endDate').val();
                let search = $('.search-input').val();

                // Show loading state
                $('.appointment-list').html(`
                    <div class="flex items-center justify-center py-16">
                        <div class="text-center">
                            <div class="w-16 h-16 border-4 border-[#4F46E5] border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
                            <p class="text-gray-600 font-semibold">Loading appointments...</p>
                        </div>
                    </div>
                `);

                $.ajax({
                    type: "GET",
                    url: url ?? "{{ route('patient.appointment.get') }}",
                    data: {
                        status: status,
                        endDate: endDate,
                        startDate: startDate,
                        search: search,
                    },
                    success: function(response) {
                        $('.appointment-list').empty();
                        $('.pagination-wrapper').empty();
                        
                        if (response.error) {
                            $('.appointment-list').html(`
                                <div class="bg-white rounded-2xl border-2 border-red-200 p-12 text-center">
                                    <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <iconify-icon icon="mdi:alert-circle" width="40" height="40" class="text-red-500"></iconify-icon>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Error Loading Appointments</h3>
                                    <p class="text-gray-600">${response.message}</p>
                                </div>
                            `);
                            return;
                        }
                        
                        if (response.html.trim() === '') {
                            $('.appointment-list').html(`
                                <div class="bg-white rounded-2xl border-2 border-gray-200 p-12 text-center">
                                    <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <iconify-icon icon="mdi:calendar-blank-outline" width="48" height="48" class="text-gray-400"></iconify-icon>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">No appointments found</h3>
                                    <p class="text-gray-600 mb-6">Try adjusting your filters or search query</p>
                                    <a href="{{ route('patient.appointment.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white font-semibold rounded-xl hover:shadow-lg transition-all">
                                        <iconify-icon icon="mdi:calendar-plus" width="20" height="20"></iconify-icon>
                                        Book New Appointment
                                    </a>
                                </div>
                            `);
                        } else {
                            $('.appointment-list').html(response.html);
                        }
                        
                        $('.pagination-wrapper').html(response.pagination);
                    },
                    error: function() {
                        $('.appointment-list').html(`
                            <div class="bg-white rounded-2xl border-2 border-red-200 p-12 text-center">
                                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <iconify-icon icon="mdi:wifi-off" width="40" height="40" class="text-red-500"></iconify-icon>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Connection Error</h3>
                                <p class="text-gray-600 mb-4">Unable to load appointments. Please check your connection.</p>
                                <button onclick="getAppointments()" class="px-6 py-3 bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white font-semibold rounded-xl hover:shadow-lg transition-all">
                                    Try Again
                                </button>
                            </div>
                        `);
                    }
                });
            }
        </script>
    @endpush
@endsection