@extends('doctor.layouts.app')
@section('content')
    <!-- Stats Grid -->
    <div class="grid md:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1 gap-6 mb-1">
        <!-- Total Patients Card -->
        <div
            class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                            <iconify-icon icon="fa7-solid:users" width="26" height="26"
                                style="color: white"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total Patients</p>
                        </div>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-800 mb-2">{{ $totalPatients }}</h3>
                    <div class="flex items-center gap-1 text-green-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold">+15%</span>
                        <span class="text-xs text-gray-500">from last week</span>
                    </div>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">This Month</span>
                    <span class="font-semibold text-indigo-600">{{ $totalPatients }}</span>
                </div>
            </div>
        </div>

        <!-- Today's Patients Card -->
        <div
            class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                            <iconify-icon icon="dashicons:admin-users" width="26" height="26"
                                style="color: white"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Today's Patients</p>
                        </div>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-800 mb-2">{{ $todayPatients }}</h3>
                    <div class="flex items-center gap-1 text-red-600">
                        <svg class="w-4 h-4 rotate-180" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold">-5%</span>
                        <span class="text-xs text-gray-500">from yesterday</span>
                    </div>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Avg. Daily</span>
                    <span class="font-semibold text-purple-600">{{ round($totalPatients / 30) }}</span>
                </div>
            </div>
        </div>

        <!-- Today's Appointments Card -->
        <div
            class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                            <iconify-icon icon="solar:calendar-mark-bold" width="26" height="26"
                                style="color: white"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Today's Appointments</p>
                        </div>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-800 mb-2">{{ $todayAppointments }}</h3>
                    <div class="flex items-center gap-1 text-green-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold">+12%</span>
                        <span class="text-xs text-gray-500">from last week</span>
                    </div>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Completed</span>
                    <span class="font-semibold text-pink-600">{{ round($todayAppointments * 0.8) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Upcoming Appointments - Takes 2 columns -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-pink-50 to-purple-50">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center">
                            <iconify-icon icon="mdi:format-list-bulleted" width="24" height="24"
                                class="text-white"></iconify-icon>
                        </div>
                        <h2 class="text-xl font-bold text-[#312E81]">Upcoming Appointments</h2>
                    </div>
                    <span class="px-4 py-2 bg-pink-600 text-white text-sm font-bold rounded-full">
                        {{ count($upcomingAppointments) }} Pending
                    </span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-[#ebeaff]">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#312E81] uppercase tracking-wider">
                                Patient</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#312E81] uppercase tracking-wider">
                                Date & Time</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-[#312E81] uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-[#312E81] uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($upcomingAppointments as $appointment)
                            <tr class="hover:bg-purple-50/50 transition-colors duration-150">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-12 h-12 rounded-full overflow-hidden border-2 border-[#312E81] shadow-sm">
                                            <img src="{{ asset($appointment->user->profile_image) }}"
                                                alt="{{ $appointment->user->name }}" class="w-full h-full object-cover" />
                                        </div>
                                        <div>
                                            <p class="font-semibold text-[#312E81]">{{ $appointment->user->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $appointment->user->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span
                                            class="font-medium text-[#312E81]">{{ date('d M Y', strtotime($appointment->date)) }}</span>
                                        <span
                                            class="text-sm text-gray-500">{{ date('h:i A', strtotime($appointment->availableTiming->time)) }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">Scheduled</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('doctor.appointment.show', ['appointment' => $appointment]) }}"
                                            class="w-10 h-10 rounded-lg flex items-center justify-center bg-indigo-100 hover:bg-indigo-200 text-[#4F46E5] transition-colors duration-150">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-gray-500 font-medium">No upcoming appointments</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Patient Statistics Sidebar -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <div class="flex items-center gap-3 mb-6">
                <div
                    class="w-10 h-10 bg-gradient-to-br from-[#EC4899] to-[#d21e6f] rounded-md flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-[#312E81]">Patient Age Distribution</h3>
            </div>

            <div class="space-y-4">
                <!-- Age Group 1 -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700">0-18 years</span>
                        <span class="text-sm font-bold text-indigo-600">25%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"
                            style="width: 25%"></div>
                    </div>
                </div>

                <!-- Age Group 2 -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700">19-35 years</span>
                        <span class="text-sm font-bold text-purple-600">40%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-purple-500 to-pink-500 rounded-full" style="width: 40%">
                        </div>
                    </div>
                </div>

                <!-- Age Group 3 -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700">36-55 years</span>
                        <span class="text-sm font-bold text-pink-600">20%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-pink-500 to-rose-500 rounded-full" style="width: 20%">
                        </div>
                    </div>
                </div>

                <!-- Age Group 4 -->
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-medium text-gray-700">55+ years</span>
                        <span class="text-sm font-bold text-rose-600">15%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-rose-500 to-red-500 rounded-full" style="width: 15%">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Common Conditions -->
            <div class="mt-8 pt-6 border-t border-gray-100">
                <h4 class="text-sm font-bold text-gray-700 mb-4">Common Conditions</h4>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg border border-purple-100">
                        <span class="text-sm font-medium text-gray-700">Hypertension</span>
                        <span class="px-2 py-1 bg-indigo-100 text-indigo-700 rounded text-xs font-bold">32%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-pink-50 rounded-lg border border-pink-100">
                        <span class="text-sm font-medium text-gray-700">Diabetes</span>
                        <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs font-bold">28%</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg border border-purple-100">
                        <span class="text-sm font-medium text-gray-700">Asthma</span>
                        <span class="px-2 py-1 bg-pink-100 text-pink-700 rounded text-xs font-bold">18%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Pass PHP data to JavaScript
        const weeklyAppointmentData = @json($weeklyAppointments);

        const toggleChart = () => {
            const chartLinks = document.querySelectorAll(".chartLink");
            const RevenueChart = document.getElementById("RevenueChart");
            const AppointmentChart = document.getElementById("AppointmentChart");

            chartLinks.forEach((link) => {
                link.addEventListener("click", (e) => {
                    e.preventDefault();

                    // Remove active class from all links
                    chartLinks.forEach((l) => {
                        l.classList.remove("active", "text-blue-500", "border-b-2",
                            "border-blue-500");
                        l.classList.add("text-gray-400");
                    });

                    // Add active class to clicked link
                    e.target.classList.remove("text-gray-400");
                    e.target.classList.add("active", "text-blue-500", "border-b-2", "border-blue-500");

                    // Toggle charts based on which link was clicked
                    if (e.target.textContent.includes("Revenue")) {
                        RevenueChart.style.display = "block";
                        AppointmentChart.style.display = "none";
                    } else {
                        RevenueChart.style.display = "none";
                        AppointmentChart.style.display = "block";
                    }
                });
            });
        };

        document.addEventListener("DOMContentLoaded", toggleChart);

        let appointmentChartInstance = null;

        function renderAppointmentChart() {
            const canvas = document.getElementById("AppointmentChart");
            if (!canvas) return;

            const ctx = canvas.getContext("2d");

            if (appointmentChartInstance) {
                appointmentChartInstance.destroy();
            }

            // Find the maximum value to set appropriate scale
            const maxValue = Math.max(...weeklyAppointmentData.data);
            const chartMax = Math.max(Math.ceil(maxValue / 10) * 10, 10); // Minimum 10

            appointmentChartInstance = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: weeklyAppointmentData.labels,
                    datasets: [{
                        label: "Appointments",
                        data: weeklyAppointmentData.data,
                        backgroundColor: weeklyAppointmentData.data.map((value, index) => {
                            // Highlight today's bar
                            const today = new Date().getDay();
                            const chartDay = today === 0 ? 6 : today -
                                1; // Convert Sunday=0 to Sunday=6 for chart
                            return index === chartDay ? "#fbbc04" : "#2196f3";
                        }),
                        borderRadius: 6,
                        borderSkipped: false,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2, // This controls the width to height ratio
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: chartMax,
                            ticks: {
                                stepSize: Math.max(Math.ceil(chartMax / 4), 1),
                                color: "#999",
                                font: {
                                    size: 12
                                }
                            },
                            grid: {
                                color: "#eee"
                            },
                        },
                        x: {
                            ticks: {
                                color: "#444",
                                font: {
                                    size: 12
                                }
                            },
                            grid: {
                                display: false
                            },
                        },
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                title: function(context) {
                                    const dayNames = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
                                        'Saturday', 'Sunday'
                                    ];
                                    return dayNames[context[0].dataIndex];
                                },
                                label: function(context) {
                                    return `Appointments: ${context.parsed.y}`;
                                }
                            }
                        },
                    },
                },
            });
        }

        // Call chart rendering only after DOM fully loads
        window.onload = function() {
            renderAppointmentChart();
        };
    </script>
@endpush
