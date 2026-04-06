@extends('patient.layouts.app')
@section('content')
    @php
        $types = json_decode($appointment->types, true) ?? [];
        $services = json_decode($appointment->services, true) ?? [];
    @endphp
    <div class="rounded-lg py-5 px-6 border border-slate-200 flex items-center">
        <img src="{{ asset($appointment->doctor->profile_image) }}" class="h-[150px] w-[150px] rounded-full" alt="">
        <div class="ml-5">
            <h1 class="text-2xl font-semibold">{{ $appointment->doctor->name }}</h1>
            <h2 class="text-lg text-slate-700">{{ $appointment->doctor->email }}</h2>
            <h2 class="text-lg text-slate-700">{{ $appointment->doctor->contact_number }}</h2>
        </div>
    </div>
    <div class="mt-5 rounded-lg py-5 px-6 border border-slate-200">
        <div class="flex justify-between items-center">
            <p class="text-slate-400 text-sm">
                {{ date('d M Y', strtotime($appointment->date)) }} - {{ date('h:i A', strtotime($appointment->availableTiming->time)) }}
            </p>
            @if ($appointment->status == 'upcoming')
                <span class="bg-yellow-200/80 uppercase text-yellow-600 rounded-xl px-3 py-1 text-sm">
                    {{ $appointment->status }}
                </span>
            @elseif($appointment->status == 'started')
                <a href="{{route('patient.conversation.index', ['conversation' => $appointment->conversation->uid])}}" class="bg-green-600 hover:bg-white border border-green-600  uppercase text-white hover:text-green-600 rounded px-3 py-2 text-sm">
                    Join Now
                </a>
            @elseif($appointment->status == 'completed')
                <span class="bg-green-200  uppercase text-green-600 rounded-xl px-3 py-1 text-sm">
                    {{ $appointment->status }}
                </span>
            @elseif($appointment->status == 'cancelled')
                <span class="bg-red-200  uppercase text-red-600 rounded-xl px-3 py-1 text-sm">
                    {{ $appointment->status }}
                </span>
            @endif
        </div>

        <div>
            <h3 class="mt-4 mb-2 font-bold text-lg">
                Types
            </h3>
            <div class="flex gap-3">
                @foreach ($types as $type)
                    <span class="bg-slate-200/60 rounded-xl px-3 py-1 text-sm">
                        {{ $type }}
                    </span>
                @endforeach
            </div>

        </div>
        <div>
            <h3 class="mt-4 mb-2 font-bold text-lg">
                Services
            </h3>
            <div class="flex gap-3">
                @foreach ($services as $service)
                    <span class="bg-slate-200/60 rounded-xl px-3 py-1 text-sm">
                        {{ $service }}
                    </span>
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="mt-4 mb-2 font-bold text-lg">
                Description
            </h3>
            <p>
                {{ $appointment->description }}
            </p>
        </div>

    </div>
@endsection
