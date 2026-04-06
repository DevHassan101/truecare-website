@extends('patient.layouts.app')
@section('content')
    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-1">
        <!-- Total Appointments Card -->
        <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div
                    class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center">
                    <iconify-icon icon="mdi:calendar-multiple" width="28" height="28" class="text-white"></iconify-icon>
                </div>
                <span class="flex items-center gap-1 text-sm font-bold text-green-600">
                    <iconify-icon icon="mdi:arrow-up" width="16" height="16"></iconify-icon>
                    +15%
                </span>
            </div>
            <p class="text-gray-600 text-sm font-medium mb-1">Total Appointments</p>
            <h3 class="text-4xl font-bold text-[#312E81] mb-2">{{ $appointments->count() }}</h3>
            <div class="flex items-center justify-between text-xs text-gray-500">
                <span>This Month</span>
                <span class="font-semibold text-purple-600">{{ $appointments->count() }}</span>
            </div>
        </div>

        <!-- Today's Appointments Card -->
        <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div
                    class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center">
                    <iconify-icon icon="mdi:account-clock" width="28" height="28" class="text-white"></iconify-icon>
                </div>
                <span class="flex items-center gap-1 text-sm font-bold text-red-600">
                    <iconify-icon icon="mdi:arrow-down" width="16" height="16"></iconify-icon>
                    -5%
                </span>
            </div>
            <p class="text-gray-600 text-sm font-medium mb-1">Today's Appointments</p>
            <h3 class="text-4xl font-bold text-[#312E81] mb-2">{{ $appointments->where('status', 'pending')->count() }}</h3>
            <div class="flex items-center justify-between text-xs text-gray-500">
                <span>Avg. Daily</span>
                <span class="font-semibold text-purple-600">0</span>
            </div>
        </div>

        <!-- Completed Appointments Card -->
        <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div
                    class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                    <iconify-icon icon="mdi:calendar-check" width="28" height="28" class="text-white"></iconify-icon>
                </div>
                <span class="flex items-center gap-1 text-sm font-bold text-green-600">
                    <iconify-icon icon="mdi:arrow-up" width="16" height="16"></iconify-icon>
                    +12%
                </span>
            </div>
            <p class="text-gray-600 text-sm font-medium mb-1">Completed</p>
            <h3 class="text-4xl font-bold text-[#312E81] mb-2">{{ $appointments->where('status', 'completed')->count() }}
            </h3>
            <div class="flex items-center justify-between text-xs text-gray-500">
                <span>All Time</span>
                <span
                    class="font-semibold text-purple-600">{{ $appointments->where('status', 'completed')->count() }}</span>
            </div>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
        <!-- Upcoming Appointments Table (2/3 width) -->
        <div class="xl:col-span-2">
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden h-full">
                <!-- Table Header -->
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
                            {{ $appointments->where('status', 'pending')->count() }} Pending
                        </span>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gradient-to-r from-purple-50 to-indigo-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Doctor</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Date & Time</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Type</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($appointments as $appointment)
                                <tr class="hover:bg-purple-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ asset($appointment->doctor?->profile_image) }}"
                                                alt="Dr. {{ $appointment->doctor?->name }}"
                                                class="w-10 h-10 rounded-full border-2 border-indigo-200 object-cover" />
                                            <span class="text-sm font-semibold text-gray-800">
                                                {{ $appointment->doctor?->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm">
                                            <div class="font-medium text-gray-900">{{ $appointment->date }}</div>
                                            <div class="text-gray-500">{{ $appointment->availableTiming?->time }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $types = json_decode($appointment->types, true) ?? [];
                                        @endphp
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($types as $type)
                                                <span
                                                    class="px-2 py-1 text-xs font-bold rounded-lg bg-blue-100 text-blue-700 capitalize">
                                                    {{ $type }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-3 py-1.5 text-xs font-bold rounded-full capitalize
                                            {{ $appointment->status === 'pending' ? 'bg-purple-100 text-purple-700' : '' }}
                                            {{ $appointment->status === 'completed' ? 'bg-green-100 text-green-700' : '' }}
                                            {{ $appointment->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}">
                                            {{ $appointment->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div
                                                class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-4">
                                                <iconify-icon icon="mdi:calendar-blank-outline" width="48"
                                                    height="48" class="text-gray-400"></iconify-icon>
                                            </div>
                                            <p class="text-gray-600 font-bold text-lg mb-2">No upcoming appointments</p>
                                            <p class="text-gray-400 text-sm">Book an appointment with your doctor</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Sidebar (1/3 width) -->
        <div class="xl:col-span-1 space-y-6">

            <!-- Health Tips Card -->
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                        <iconify-icon icon="mdi:heart-pulse" width="20" height="20"
                            class="text-white"></iconify-icon>
                    </div>
                    <h3 class="text-lg font-bold text-[#312E81]">Health Tips</h3>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start gap-3 p-3 bg-green-50 rounded-lg border border-green-100">
                        <iconify-icon icon="mdi:water" width="20" height="20"
                            class="text-green-600 mt-0.5 flex-shrink-0"></iconify-icon>
                        <p class="text-sm text-gray-700">Stay hydrated - Drink 8 glasses of water daily</p>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg border border-blue-100">
                        <iconify-icon icon="mdi:run" width="20" height="20"
                            class="text-blue-600 mt-0.5 flex-shrink-0"></iconify-icon>
                        <p class="text-sm text-gray-700">Regular exercise improves heart health</p>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-purple-50 rounded-lg border border-purple-100">
                        <iconify-icon icon="mdi:sleep" width="20" height="20"
                            class="text-purple-600 mt-0.5 flex-shrink-0"></iconify-icon>
                        <p class="text-sm text-gray-700">Get 7-8 hours of quality sleep</p>
                    </div>
                </div>
            </div>

            <!-- Upcoming Reminder Card -->
            <div class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl border-2 border-pink-200 p-6">
                <div class="flex items-center gap-3 mb-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center">
                        <iconify-icon icon="mdi:bell-ring" width="20" height="20"
                            class="text-white"></iconify-icon>
                    </div>
                    <h3 class="text-lg font-bold text-[#312E81]">Reminder</h3>
                </div>
                <p class="text-sm text-gray-700 mb-3">
                    Don't forget to complete your health checkup this month.
                </p>
                <button
                    class="w-full bg-gradient-to-r from-pink-500 to-pink-600 text-white font-semibold py-2 px-4 rounded-lg hover:from-pink-600 hover:to-pink-700 transition-all">
                    Set Reminder
                </button>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const toggleChart = () => {
            const chartLinks = document.querySelectorAll(".chartLink");
            const RevenueChart = document.getElementById("HeartRate");
            const AppointmentChart = document.getElementById("BloodPressure");

            // Set the first link as active by default when page loads
            chartLinks[0].classList.add("active");
            RevenueChart.style.display = "block";
            AppointmentChart.style.display = "none";

            chartLinks.forEach((link) => {
                link.addEventListener("click", (e) => {
                    e.preventDefault(); // Prevent default link behavior

                    // Remove active class from all links
                    chartLinks.forEach((l) => l.classList.remove("active"));

                    // Add active class to clicked link
                    e.target.classList.add("active");

                    // Toggle charts based on which link was clicked
                    if (e.target.textContent.includes("Revenue")) {
                        // Adjust this condition based on your link text
                        RevenueChart.style.display = "block";
                        AppointmentChart.style.display = "none";
                    } else {
                        RevenueChart.style.display = "none";
                        AppointmentChart.style.display = "block";
                    }
                });
            });
        };

        // Call the function when DOM is loaded
        document.addEventListener("DOMContentLoaded", toggleChart);

        let revenueChartInstance = null;
        let appointmentChartInstance = null;

        function renderRevenueChart() {
            const canvas = document.getElementById("HeartRate");
            if (!canvas) return;

            const ctx = canvas.getContext("2d");

            if (revenueChartInstance) {
                revenueChartInstance.destroy();
            }

            revenueChartInstance = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["M", "T", "W", "T", "F", "S", "S"],
                    datasets: [{
                        label: "Visits",
                        data: [50, 45, 20, 50, 38, 47, 65],
                        backgroundColor: [
                            "#2196f3",
                            "#2196f3",
                            "#2196f3",
                            "#3295fd",
                            "#2196f3",
                            "#2196f3",
                            "#2196f3",
                        ],
                        borderSkipped: false,
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 80,
                            ticks: {
                                stepSize: 20,
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
                            enabled: true
                        },
                    },
                },
            });
        }

        function renderAppointmentChart() {
            const canvas = document.getElementById("BloodPressure");
            if (!canvas) return;

            const ctx = canvas.getContext("2d");

            if (appointmentChartInstance) {
                appointmentChartInstance.destroy();
            }

            appointmentChartInstance = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["M", "T", "W", "T", "F", "S", "S"],
                    datasets: [{
                        label: "Visits",
                        data: [50, 45, 20, 50, 38, 47, 65],
                        backgroundColor: [
                            "#2196f3",
                            "#2196f3",
                            "#2196f3",
                            "#3295fd",
                            "#2196f3",
                            "#2196f3",
                            "#2196f3",
                        ],
                        borderSkipped: false,
                    }, ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 80,
                            ticks: {
                                stepSize: 20,
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
                            enabled: true
                        },
                    },
                },
            });
        }

        // ✅ Call both charts only after DOM fully loads
        window.onload = function() {
            renderRevenueChart();
            renderAppointmentChart();
        };
    </script>
@endpush
