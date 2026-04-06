@extends('layouts.app')
@section('content')
    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        Doctor
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        Patient
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        Appointment Info
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        Types
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        Services
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    @php
                        $types = json_decode($appointment->types, true) ?? [];
                        $services = json_decode($appointment->services, true) ?? [];
                    @endphp
                    <tr>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">

                            <div class="flex items-center">
                                <img src="{{ asset($appointment->doctor?->profile_image) }}" class="h-12 w-12 rounded-full"
                                    alt="">
                                <div>
                                    <p class="!text-[#0e82fd] text-sm font-semibold whitespace-no-wrap">
                                        {{ $appointment->doctor?->uid }}</p>
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $appointment->doctor?->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">

                            <div class="flex items-center ">
                                <img src="{{ asset($appointment->user?->profile_image) }}" class="h-12 w-12 rounded-full"
                                    alt="">
                                <div>
                                    <p class="!text-[#0e82fd] text-sm font-semibold whitespace-no-wrap">
                                        {{ $appointment->user?->uid }}</p>
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $appointment->user?->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap"><b>Date:</b>
                                {{ date('d M Y', strtotime($appointment->date)) }}</p>
                            <p class="text-gray-900 whitespace-no-wrap"><b>Time:</b>
                                {{ date('h:i A', strtotime($appointment->availableTiming?->time)) }}</p>
                        </td>

                        <td  class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <div class="flex gap-3">
                                @foreach ($types as $type)
                                    <span class="bg-green-200 text-green-800 text-xs rounded-2xl px-2 py-1">
                                        {{ $type }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <div class="flex gap-3">
                                @foreach ($services as $service)
                                    <span class="bg-blue-200 text-blue-800 text-xs rounded-2xl px-2 py-1">
                                        {{ $service }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
            {{ $appointments->links() }}
        </div>
    </div>
@endsection
