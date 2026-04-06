<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $appointments = Appointment::where('user_id', Auth::id())->where('status', 'upcoming')->orderBy('date')->get();
        return view('patient.pages.dashboard', compact('appointments'));
    }

    public function profileSettings() {
        $countries = Country::get();
        return view('patient.pages.profile-settings', compact('countries'));
    }
    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . Auth::id(),
            'contact_number' => 'required',
            'image' => 'nullable|image',
            'gender' => 'required',
            'dob' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
        ]);
        if (!$request->available_full_time) {
            $validatedData['available_full_time'] = 0;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/patients/profile-images', $name_gen);
            $validatedData['profile_image'] = 'uploads/patients/profile-images/' . $name_gen;
            if (file_exists(public_path(Auth::user()->profile_image))) {
                unlink(public_path(Auth::user()->profile_image));
            }         
        }
        User::find(Auth::id())->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
