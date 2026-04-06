@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-3 gap-4">
        <div>
                    <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-l group hover:text-white hover:bg-gray-900">
                <div class="text-center">
                    <span
                        class="mb-2 text-5xl font-bold tracking-tight text-gray-900 group-hover:!text-white">{{ $totalPatients }}+</span>
                    <p class="font-medium text-lg text-gray-700 group-hover:text-gray-400">Total Paitents</p>
                </div>
            </a>

        </div>
        <div>


            <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-l group hover:text-white hover:bg-gray-900">
                <div class="text-center">
                    <span
                        class="mb-2 text-5xl font-bold tracking-tight text-gray-900 group-hover:!text-white">{{ $totalDoctors }}+</span>
                    <p class="font-medium text-lg text-gray-700 group-hover:text-gray-400">Total Doctors</p>
                </div>
            </a>
        </div>
        <div>
                       <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-l group hover:text-white hover:bg-gray-900">
                <div class="text-center">
                    <span
                        class="mb-2 text-5xl font-bold tracking-tight text-gray-900 group-hover:!text-white">{{ $totalAppointment }}+</span>
                    <p class="font-medium text-lg text-gray-700 group-hover:text-gray-400">Total Appointment</p>
                </div>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-5">

        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center capitalize font-bold text-2xl mb-4 px-4">
                <div>
                    <h6>Upcoming Appointments</h6>
                </div>
                <div>
                    <a href="{{ route('admin.appointment.index') }}"
                        class="px-3 py-1 bg-blue-500 text-white rounded-full text-sm hover:bg-blue-600 transition">
                        show all
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="text-xs text-gray-900 bg-gray-100 uppercase">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Doctor</th>
                            <th class="px-6 py-3">Patient</th>
                            <th class="px-6 py-3">Appointment Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse ($appointments as $appointment)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ ++$i }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-blue-500 text-sm">#{{ $appointment->doctor->uid }}</span>
                                    <p>
                                        Dr. {{ $appointment->doctor->name }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-blue-500 text-sm">#{{ $appointment->user->uid }}</span>
                                    <p>
                                        {{ $appointment->user?->name }}
                                    </p>
                                </td>

                                <td class="px-6 py-4">
                                    {{ date('d M Y', strtotime($appointment->date)) . ' ' . date('h:i A', strtotime($appointment->availableTiming->time)) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    No appointments found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg px-0 w-[98%]">
            <div style="position: relative; height: 400px; width: 100%; padding:12px;">
                <canvas id="myChart"></canvas>
            </div>
        </div>


    </div>




    @push('head')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const canvas = document.getElementById('myChart');
                if (!canvas || typeof Chart === 'undefined' || typeof ChartDataLabels === 'undefined') {
                    console.error('Chart or canvas or plugin missing');
                    return;
                }

                const actualData = {
                    upcoming: {{ $upcoming ?? 0 }},
                    completed: {{ $completed ?? 0 }},
                    cancelled: {{ $cancelled ?? 0 }}
                };


                const dataValues = Object.values(actualData).map(val => val > 0 ? val : 0.1);
                const labels = ["Upcoming", "Completed", "Cancelled"];
                const colors = ["#00aba9", "#2b5797", "#b91d47"];

                const ctx = canvas.getContext('2d');
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels,
                        datasets: [{
                            data: dataValues,
                            backgroundColor: colors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    generateLabels: (chart) =>
                                        labels.map((label, i) => ({
                                            text: `${label}: ${actualData[label.toLowerCase()]}`,
                                            fillStyle: colors[i],
                                            hidden: false
                                        }))
                                }
                            },
                            title: {
                                display: true,
                                text: 'Status Overview',
                                font: {
                                    size: 16
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(ctx) {
                                        const value = Object.values(actualData)[ctx.dataIndex];
                                        return `${labels[ctx.dataIndex]}: ${value}`;
                                    }
                                }
                            },
                            datalabels: {
                                formatter: (_, ctx) => {
                                    const value = Object.values(actualData)[ctx.dataIndex];
                                    return value > 0 ? value : '';
                                },
                                color: '#fff',
                                font: {
                                    weight: 'bold',
                                    size: 14
                                }
                            }
                        }
                    },
                    plugins: [ChartDataLabels]
                });
            });
        </script>
    @endpush
@endsection
