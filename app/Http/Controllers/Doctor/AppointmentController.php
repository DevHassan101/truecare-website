<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Conversation;
use App\Models\User;
use App\Services\QuickBloxService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $upcoming = Appointment::where('status', 'upcoming')->count();
        $started = Appointment::where('status', 'started')->count();
        $completed = Appointment::where('status', 'completed')->count();
        $cancelled = Appointment::where('status', 'cancelled')->count();
        return view('doctor.pages.appointment.index', compact('cancelled', 'completed', 'upcoming', 'started'));
    }
    public function get(Request $request)
    {
        try {
            $query = Appointment::where('doctor_id', Auth::id());
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

            $appointments = $query->orderBy('date', 'DESC')->paginate(1);
            // return $appointments;
            return response()->json([
                'error' => false,
                'html' => view('doctor.pages.appointment.list', compact('appointments'))->render(),
                'pagination' => $appointments->links()->render()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function updateAppointmentFees(Request $request)
    {
        $request->validate([
            'fee' => 'required|numeric'
        ]);

        $user = Auth::user();
        $user->appointment_fees = $request->fee;
        $user->save();
        return redirect()->back()->with('success', 'Appointment fee updated succesfully');
    }


    public function show(Appointment $appointment)
    {
        return view('doctor.pages.appointment.show', compact('appointment'));
    }
    public function start(Appointment $appointment)
    {
        $appointment->update([
            'status' => 'started',
        ]);
        $conversation = Conversation::create([
            'uid' => $appointment->id . '-' . $appointment->user->uid . '-' . $appointment->doctor->uid,
            'appointment_id' => $appointment->id,
            'user_id' => $appointment->user_id,
            'doctor_id' => Auth::id(),
        ]);
        return redirect()->route('doctor.conversation.index', ['conversation' => $conversation->uid]);
    }
}
