<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDoctors = User::role('doctor')->count();
        $totalPatients = User::role('user')->count();
        $totalAppointment = Appointment::count();
        $upcoming = Appointment::where('status', 'upcoming')->count();
        $completed = Appointment::where('status', 'completed')->count();
        $cancelled = Appointment::where('status', 'cancelled')->count();
        // Controller - Limit to 5 appointments
        $appointments = Appointment::with(['doctor', 'user'])
            ->latest()
            ->take(5) 
            ->get();

        return view('admin.pages.dashboard', compact(
            'totalDoctors',
            'totalPatients',
            'totalAppointment',
            'upcoming',
            'completed',
            'cancelled',
            'appointments'
        ));
    }
}
