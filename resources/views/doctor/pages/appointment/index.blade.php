@extends('doctor.layouts.app')
@section('content')
    <div class="w-full flex items-center justify-between pb-4 border-b border-gray-300">
        <h4 class="md:text-[1.5vw] sm:text-[2.5vw] xs:text-[4vw] font-semibold">
            Appointments
        </h4>
        <div
            class="flex items-center gap-2 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] border border-gray-300 rounded-md px-3">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" name="search" class="search-input md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] outline-none" placeholder="Search" id="" />
        </div>
    </div>
    <div class="py-3 w-full flex flex-wrap gap-4 items-center justify-between md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw]">
        <div class="flex items-center gap-3">
            <div
                class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] px-4 flex items-center gap-2 bg-[#f9f9f9] border border-[#e6e8ee] rounded-md">
                <span>Upcoming</span>
                <span
                    class="py-0.5 px-2 border border-[#e6e8ee] bg-white rounded-full md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                    {{ $upcoming }}
                </span>
            </div>
            <div
                class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] px-4 flex items-center gap-2 bg-[#f9f9f9] border border-[#e6e8ee] rounded-md">
                <span>Completed</span>
                <span
                    class="py-0.5 px-2 border border-[#e6e8ee] bg-white rounded-full md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                    {{ $completed }}
                </span>
            </div>
            <div
                class="md:py-[0.5vw] sm:py-[1vw] xs:py-[1.5vw] px-4 flex items-center gap-2 bg-[#f9f9f9] border border-[#e6e8ee] rounded-md">
                <span>Cancelled</span>
                <span
                    class="py-0.5 px-2 border border-[#e6e8ee] bg-white rounded-full md:text-[0.8vw] sm:text-[1.8vw] xs:text-[3.3vw]">
                    {{ $cancelled }}
                </span>
            </div>
        </div>
        <div class="flex items-center flex-wrap gap-3">
            <input type="date" onchange="getAppointments()" name="startDate"
                class="startDate border border-[#e6e8ee] py-2 px-3 rounded">
            <input type="date" onchange="getAppointments()" name="endDate"
                class="endDate border border-[#e6e8ee] py-2 px-3 rounded">
            <select name="" id="" onchange="getAppointments()"
                class="status border border-[#e6e8ee] py-2 px-3 rounded">
                <option value="upcoming">Upcoming</option>
                <option value="started">Ongoing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>
    <div class="appointment-list flex flex-col gap-5 md:text-[1vw] sm:text-[2vw] xs:text-[3.5vw] overflow-y-auto pr-2">

    </div>
    <div class="pagination-wrapper w-full flex items-center justify-center md:text-[0.9vw] sm:text-[1.9vw] xs:text-[3.4vw]">
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

    @push('script')
        <script>
            $(document).on('click', '.pagination-wrapper a', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');
                getAppointments(url);
            });
            getAppointments()
            $('.search-input').change(function (e) { 
                e.preventDefault();
                getAppointments()
                console.log('0');
            });

            function getAppointments(url = null) {
                let status = $('.status').val();
                let startDate = $('.startDate').val();
                let endDate = $('.endDate').val();
                let search = $('.search-input').val();
                $.ajax({
                    type: "GET",
                    url: url ?? "{{ route('doctor.appointment.get') }}",
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
                            console.error(response.message);
                            return
                        }
                        $('.appointment-list').append(response.html);
                        $('.pagination-wrapper').append(response.pagination);
                    }
                });
            }
        </script>
    @endpush
@endsection
