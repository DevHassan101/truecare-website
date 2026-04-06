<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Services\QuickBloxService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('doctor.pages.auth.login');
    }
    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ], [
            'email.exists' => 'Invalid email address'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Email or password is invalid')->withInput($request->all());
        }

        if ($user->hasRole('doctor')) {
            Auth::login($user);
            return redirect()->route('doctor.dashboard')->with('success', 'Login successfully');
        }
        return redirect()->back()->with('error', 'You are not a doctor')->withInput($request->all());
    }
    public function register()
    {
        $countries = Country::get();
        return view('doctor.pages.auth.register', compact('countries'));
    }
    public function signup(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'contact_number' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'specialization' => 'required',
            'qualifications' => 'required',
            'years_of_experience' => 'required',
            'address' => 'nullable',
            'profile_image' => 'required|image',
        ]);
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/doctors/profile-images', $name_gen);
            $validatedData['profile_image'] = 'uploads/doctors/profile-images/' . $name_gen;
        }

        $validatedData['password'] = Hash::make($request->password);
        $validatedData['uid'] = "DOC" . time();
        $doctor = User::create($validatedData);
        // dd($doctor);
        $doctor->assignRole('doctor');
        try {
            $qb = new QuickBloxService();
            $qbDoctor = $qb->createUser($doctor->uid, $doctor->uid, $doctor->name);

            if (isset($qbDoctor['errors'])) {
                Log::error($qbDoctor['errors']);
            } else {
                $doctor->update([
                    'qbid' => $qbDoctor['user']['id']
                ]);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        Auth::login($doctor);
        return redirect()->route('doctor.dashboard')->with('success', 'Signup successfully');
    }
}
