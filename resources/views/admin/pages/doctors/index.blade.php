@extends('layouts.app')
@section('content')
    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        Doctor Info
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        Contact Details
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        Country/State
                    </th>
                    <th
                        class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                        Education/Specializations
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <div class="flex items-center ">
                                <img src="{{ asset($doctor->profile_image) }}" class="h-12 w-12 rounded-full" alt="">
                                <div>
                                    <p class="text-[#0e82fd] text-sm whitespace-no-wrap">{{ $doctor->uid }}</p>
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $doctor->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $doctor->email }}</p>
                            <p class="text-gray-900 whitespace-no-wrap">{{ $doctor->contact_number }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $doctor->country?->name }}</p>
                            <p class="text-gray-900 whitespace-no-wrap">{{ $doctor->state?->name }}</p>
                        </td>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $doctor->qualifications }}</p>
                            <p class="text-gray-900 whitespace-no-wrap">{{ $doctor->specialization }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
            {{ $doctors->links() }}
        </div>
    </div>
@endsection
