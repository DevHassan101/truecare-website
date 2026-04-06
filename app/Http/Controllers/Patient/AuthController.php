<?php

namespace App\Http\Controllers\Patient;

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
        return view('patient.pages.auth.login');
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

        if ($user->hasRole('user')) {
            Auth::login($user);
            return redirect()->route('patient.dashboard')->with('success', 'Login successfully');
        }
        return redirect()->back()->with('error', 'You are not a patient')->withInput($request->all());
    }
    public function register()
    {
        $countries = Country::get();
        return view('patient.pages.auth.register', compact('countries'));
    }
    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required',
            'dob' => 'required|date',
            'country_id' => 'nullable',
            'state_id' => 'nullable',
            'contact_number' => 'required',
            'profile_image' => 'required|image',
        ]);
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/patients/profile-images', $name_gen);
            $validatedData['profile_image'] = 'uploads/patients/profile-images/' . $name_gen;
        }
        $validatedData['uid'] = "PT" . time();
        $validatedData['password'] = Hash::make($request->password);
        $user = User::create($validatedData);
        $user->assignRole('user');
        try {
            $qb = new QuickBloxService();
            $qbUser = $qb->createUser($user->uid, $user->uid, $user->name);
            if (isset($qbUser['errors'])) {
                Log::error($qbUser['errors']);
            } else {
                $user->update([
                    'qbid' => $qbUser['user']['id']
                ]);
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        Auth::login($user);
        return redirect()->route('patient.dashboard')->with('success', 'Signup successfully');
    }
}
