<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPatients = Appointment::where('doctor_id', Auth::id())->distinct('user_id')->count();
        $todayPatients = Appointment::where('doctor_id', Auth::id())->distinct('user_id')->whereDate('created_at', now())->count();
        $todayAppointments = Appointment::where('doctor_id', Auth::id())->distinct('user_id')->whereDate('date', now())->count();
        $upcomingAppointments = Appointment::where('doctor_id', Auth::id())->where('status', 'upcoming')->limit(5)->orderBy('date')->get();
        $weeklyAppointments = $this->getWeeklyAppointmentData();

        return view('doctor.pages.dashboard', compact('totalPatients', 'todayPatients', 'todayAppointments', 'upcomingAppointments','weeklyAppointments'));
    }

    public function patients()
    {
        $patientIds = Appointment::where('doctor_id', Auth::id())
            ->select('user_id')
            ->distinct()
            ->pluck('user_id');

        $patients = User::whereIn('id', $patientIds)->get();
        return view('doctor.pages.patients', compact('patients'));
    }
    public function reviews()
    {
        return view('doctor.pages.reviews');
    }
    public function profileSettings()
    {
        $countries = Country::with('states')->get();
        return view('doctor.pages.profile-settings', compact('countries'));
    }
    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . Auth::id(),
            'contact_number' => 'required',
            'years_of_experience' => 'required',
            'specialization' => 'required',
            'languages' => 'nullable',
            'bio' => 'required',
            'image' => 'nullable|image',
            'country_id' => 'required',
            'state_id' => 'required',
            'available_full_time' => 'nullable',
            'dob' => 'required'
        ]);
        if (!$request->available_full_time) {
            $validatedData['available_full_time'] = 0;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/doctors/profile-images', $name_gen);
            $validatedData['profile_image'] = 'uploads/doctors/profile-images/' . $name_gen;
            if (file_exists(public_path(Auth::user()->profile_image))) {
                unlink(public_path(Auth::user()->profile_image));
            }
        }
        User::find(Auth::id())->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }



    private function getWeeklyAppointmentData()
    {
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();
        
        $weeklyData = [];
        $dayLabels = ['M', 'T', 'W', 'T', 'F', 'S', 'S'];

        for ($i = 0; $i < 7; $i++) {
            $currentDay = $startOfWeek->copy()->addDays($i);
            $appointmentCount = Appointment::where('doctor_id', Auth::id())
                ->whereDate('created_at', $currentDay->toDateString())
                ->count();

            $weeklyData[] = $appointmentCount;
        }

        return [
            'labels' => $dayLabels,
            'data' => $weeklyData,
            'week_range' => $startOfWeek->format('M d') . ' - ' . $endOfWeek->format('M d')
        ];
    }
}
