@extends('doctor.layouts.app')
@section('content')
    <!-- Main Content Card -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <!-- Card Header -->
        <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-pink-50">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-[#EC4899] to-[#d62172] rounded-xl flex items-center justify-center shadow-lg">
                    <iconify-icon icon="solar:calendar-bold" width="28" height="28" style="color: white"></iconify-icon>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-[#312E81]">Select Available Slots</h2>
                    <p class="text-sm text-gray-600">Choose days and add time slots for appointments</p>
                </div>
            </div>
        </div>

        <!-- Days Selection Section -->
        <div class="px-6 py-8 border-b border-gray-100">
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-[#312E81] mb-1">Select Available Days</h3>
                <p class="text-sm text-gray-600">Click on days to manage time slots</p>
            </div>
            
            <div class="flex flex-wrap gap-3">
                <button data-day="monday"
                    class="selected-day daysButton group px-6 py-3 rounded-xl font-medium transition-all duration-200 bg-gradient-to-r from-[#4F46E5] to-[#312E81] text-white shadow-lg shadow-indigo-200 hover:shadow-xl">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>Monday</span>
                    </div>
                </button>
                
                <button data-day="tuesday"
                    class="daysButton group px-6 py-3 rounded-xl font-medium transition-all duration-200 bg-white border-2 border-[#312E81]/55 text-[#312E81] hover:border-indigo-300 hover:bg-purple-50">
                    <span>Tuesday</span>
                </button>
                
                <button data-day="wednesday"
                    class="daysButton group px-6 py-3 rounded-xl font-medium transition-all duration-200 bg-white border-2 border-[#312E81]/55 text-[#312E81] hover:border-indigo-300 hover:bg-purple-50">
                    <span>Wednesday</span>
                </button>
                
                <button data-day="thursday"
                    class="daysButton group px-6 py-3 rounded-xl font-medium transition-all duration-200 bg-white border-2 border-[#312E81]/55 text-[#312E81] hover:border-indigo-300 hover:bg-purple-50">
                    <span>Thursday</span>
                </button>
                
                <button data-day="friday"
                    class="daysButton group px-6 py-3 rounded-xl font-medium transition-all duration-200 bg-white border-2 border-[#312E81]/55 text-[#312E81] hover:border-indigo-300 hover:bg-purple-50">
                    <span>Friday</span>
                </button>
                
                <button data-day="saturday"
                    class="daysButton group px-6 py-3 rounded-xl font-medium transition-all duration-200 bg-white border-2 border-[#312E81]/55 text-[#312E81] hover:border-indigo-300 hover:bg-purple-50">
                    <span>Saturday</span>
                </button>
                
                <button data-day="sunday"
                    class="daysButton group px-6 py-3 rounded-xl font-medium transition-all duration-200 bg-white border-2 border-[#312E81]/55 text-[#312E81] hover:border-indigo-300 hover:bg-purple-50">
                    <span>Sunday</span>
                </button>
            </div>
        </div>

        <!-- Time Slots Section -->
        <div class="px-6 py-8 bg-gradient-to-br from-gray-50 to-purple-50/30">
            <div class="bg-white rounded-xl border-2 border-gray-200 p-6">
                <!-- Slot Header -->
                <div class="flex items-center justify-between pb-4 border-b border-gray-200 mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-[#4F46E5] to-[#312E81] rounded-lg flex items-center justify-center">
                            <iconify-icon icon="fa6-solid:check-to-slot" width="20" height="20" style="color: white"></iconify-icon>
                        </div>
                        <h4 class="text-xl font-bold text-[#312E81]">The Slots</h4>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <button class="slot-toggle group flex items-center gap-2 px-4 py-2 rounded-lg bg-indigo-100 text-indigo-700 hover:bg-indigo-200 font-medium transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                            </svg>
                            Add Slots
                        </button>
                        
                        <button class="delete-slots group flex items-center gap-2 px-4 py-2 rounded-lg bg-red-100 text-red-700 hover:bg-red-200 font-medium transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            Delete All
                        </button>
                    </div>
                </div>

                <!-- Time Slots Display -->
                <div class="slot-list flex justify-start items-center gap-4">
                    {{-- <div class="flex justify-between items-center gap-3 bg-slate-700">
                        <!-- Example slots - these will be dynamically generated -->
                        <div class="group flex items-center gap-2 px-4 py-3 rounded-lg bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 hover:shadow-md transition-all duration-200">
                            <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-semibold text-gray-700">20:10</span>
                        </div>
                        
                        <div class="group flex items-center gap-2 px-4 py-3 rounded-lg bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 hover:shadow-md transition-all duration-200">
                            <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-semibold text-gray-700">12:00</span>
                        </div>
                        
                        <div class="group flex items-center gap-2 px-4 py-3 rounded-lg bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 hover:shadow-md transition-all duration-200">
                            <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-semibold text-gray-700">15:10</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Appointment Fee Section -->
        <div class="p-6 border-t border-gray-200 bg-white">
            <form action="{{ route('doctor.appointment.update-fee') }}" method="post">
                @csrf
                @method('PUT')
                
                <div class="max-w-md">
                    <label class="block mb-2">
                        <span class="text-lg font-semibold text-[#312E81] mb-1 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#4F46E5]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                            </svg>
                            Appointment Fees ($)
                        </span>
                        <p class="text-sm text-gray-600 mb-3">Set your consultation fee per appointment</p>
                    </label>
                    
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-[#312E81] text-lg font-semibold">$</span>
                        </div>
                        <input 
                            type="number" 
                            name="fee" 
                            step="any" 
                            value="{{ Auth::user()->appointment_fees ?? 123 }}"
                            class="w-full pl-10 pr-4 py-3 text-lg font-semibold border-2 border-gray-200 rounded-xl shadow-xs focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none"
                            placeholder="0.00" />
                    </div>
                    
                    @error('fee')
                        <div class="mt-2 flex items-center gap-2 text-red-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm font-medium">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end gap-3 mt-6 pt-6 border-t border-gray-200">
                    <button type="button"
                        class="px-6 py-3 rounded-xl font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                        Cancel
                    </button>
                    
                    <button type="submit"
                        class="group flex items-center gap-2 px-6 py-3 rounded-xl font-medium text-white bg-gradient-to-r from-[#EC4899] to-[#d62172] hover:from-indigo-700 hover:to-purple-700 shadow-lg shadow-indigo-200 hover:shadow-xl transition-all duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

<!-- Add Slot Modal -->
<div class="hidden h-screen w-screen bg-black/50 backdrop-blur-sm z-[200] fixed top-0 left-0 flex justify-center items-center add-slot-modal">
    <div class="bg-white rounded-2xl p-8 w-full max-w-md relative shadow-2xl animate-scale-in">
        <!-- Close Button -->
        <button class="slot-toggle absolute top-4 right-4 w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 flex justify-center items-center transition-colors duration-200 text-gray-600 hover:text-gray-800">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
        
        <form action="" id="slot-form" method="post">
            <!-- Modal Header -->
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Add Time Slot</h2>
                <p class="text-sm text-gray-600">Select a time for your availability</p>
            </div>
            
            <!-- Time Input -->
            <div class="mb-6">
                <label for="time" class="block text-sm font-semibold text-gray-700 mb-2">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        Select Time
                    </span>
                </label>
                <input 
                    type="time" 
                    id="time" 
                    required 
                    class="w-full px-4 py-3 text-lg font-semibold border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 outline-none">
            </div>
            
            <!-- Action Buttons -->
            <div class="flex gap-3">
                <button type="button"
                    class="slot-toggle flex-1 px-4 py-3 rounded-xl font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 transition-colors duration-200">
                    Cancel
                </button>
                
                <button type="submit"
                    class="flex-1 flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 shadow-lg shadow-indigo-200 hover:shadow-xl transition-all duration-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Add Slot
                </button>
            </div>
        </form>
    </div>
</div>


@push('head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .selected-day {
            background-color: #0e82fd;
            color: white
        }
    </style>
@endpush
@push('script')
    <script>
        var day = "monday";
        $('.daysButton').click(function(e) {
            e.preventDefault();
            day = $(this).data('day');
            $('.daysButton').removeClass('selected-day');
            $(this).addClass('selected-day');
            getAvailableTimings(day)
        });

        getAvailableTimings('monday');

        function getAvailableTimings(day) {
            $('.slot-list').empty();
            $.ajax({
                type: "GET",
                url: "{{ route('doctor.available-timings.get') }}",
                data: {
                    day: day
                },
                success: function(response) {
                    if (response.error) {
                        console.error(response.message);
                        return;
                    }
                    $('.slot-list').empty();
                    if (response.availableTimings.length == 0) {
                        let span = "<span class='text-red-500 text-center'>No slots found</span>"
                        $('.slot-list').append(span);
                        return;
                    }
                    console.log(response);
                    response.availableTimings.forEach(availableTime => {
                        let div = `<button
                                        class="md:py-[0.5vw] timeButton cursor-pointer sm:py-[1vw] xs:py-[1.5vw] xs:px-3 md:px-5 bg-[#e6e8ee] border border-[#e6e8ee] rounded-lg flex items-center gap-2">
                                        <i class="bxr bx-timer"></i>
                                        ${availableTime.time}
                                    </button>`;
                        $('.slot-list').append(div);
                    });
                }
            });
        }

        $('#slot-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('doctor.available-timings.store') }}",
                data: {
                    day: day,
                    time: $('#time').val()
                },
                headers: {
                    'x-csrf-token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.error) {
                        console.error(response.message);
                        return;
                    }
                    $('.add-slot-modal').addClass('hidden');
                    $('#time').val(null);
                    getAvailableTimings(day)
                    console.log(response)
                }
            });
        });
        $('.slot-toggle').click(function(e) {
            e.preventDefault();
            $('.add-slot-modal').toggleClass('hidden');
        });
        $('.delete-slots').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "DELETE",
                url: "{{ route('doctor.available-timings.destroy') }}",
                data: {
                    day: day
                },
                headers: {
                    'x-csrf-token': "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.error) {
                        console.error(response.message);
                        return;
                    }
                    getAvailableTimings(day)
                    console.log(response)
                }
            });
        });
    </script>
@endpush
