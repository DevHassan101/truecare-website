<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $upcoming = Appointment::where('user_id', Auth::id())->where('status', 'upcoming')->count();
        $completed = Appointment::where('user_id', Auth::id())->where('status', 'completed')->count();
        $cancelled = Appointment::where('user_id', Auth::id())->where('status', 'cancelled')->count();
        return view('patient.pages.appointment.index', compact('cancelled', 'completed', 'upcoming'));
    }

public function get(Request $request)
{
    try {
        $query = Appointment::where('user_id', Auth::id());

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->startDate) {
            $query->whereDate('date', '>=', $request->startDate);
        }

        if ($request->endDate) {
            $query->whereDate('date', '<=', $request->endDate);
        }

        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('doctor', function ($d) use ($search) {
                    $d->where('name', 'like', "%{$search}%");
                });
            });
        }

        $appointments = $query->orderBy('date', 'DESC')->paginate(10);

        return response()->json([
            'error' => false,
            'html' => view('patient.pages.appointment.list', compact('appointments'))->render(),
            'pagination' => $appointments->links()->render(),
        ]);
    } catch (\Throwable $th) {
        return response()->json([
            'error' => true,
            'message' => $th->getMessage(),
        ]);
    }
}




    public function show(Appointment $appointment)
    {
        if ($appointment->user_id != Auth::id()) {
            abort(403);
        }
        return view('patient.pages.appointment.show', compact('appointment'));
    }

    public function store(Request $request, $doctor)
    {
        $validatedData = $request->validate([
            'types' => 'required',
            'services' => 'required',
            'date' => 'required|date',
            'available_timing_id' => 'required|exists:available_timings,id',
            'description' => 'nullable',
        ]);
        $doctor = User::where('uid', $doctor)->first();
        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor is not valid');
        }
        $validatedData['types'] = json_encode($request->types);
        $validatedData['services'] = json_encode($request->services);
        $validatedData['user_id'] = Auth::id();
        $validatedData['doctor_id'] = $doctor->id;
        $appointment = Appointment::create($validatedData);
        return redirect()->route('patient.appointment.show', ['appointment' => $appointment])->with('success', 'Appointment added succesfully');
    }
}
