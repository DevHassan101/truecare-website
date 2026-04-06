<?php

namespace App\Http\Controllers;

use App\Models\AvailableTiming;
use App\Models\User;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index()
    {
        $users = User::role('doctor')->get();
        // foreach ($users as $user) {
        //     return $user->ratings;
        // }
        return view('website.pages.index', compact('users'));
    }
    public function aboutUs()
    {
        return view('website.pages.about-us');
    }
    public function doctors()
    {
        return view('website.pages.doctors');
    }
    public function doctorDetails($doctorId)
    {
        $doctor = User::role('doctor')->where('uid', $doctorId)->firstOrFail();


        $totalReviews = Appointment::where('doctor_id', $doctor->id)
            ->whereNotNull('recomnded')
            ->count();

        $recommendedCount = Appointment::where('doctor_id', $doctor->id)
            ->where('recomnded', 1)
            ->count();

        $recommendedPercentage = $totalReviews > 0
            ? round(($recommendedCount / $totalReviews) * 100)
            : 0;

        return view('website.pages.doctor-details', compact('doctor', 'recommendedPercentage'));
    }

    public function bookAppointment($doctorId)
    {
        $doctor = User::role('doctor')->where('uid', $doctorId)->firstOrFail();
        return view('website.pages.book-appointment', compact('doctor'));
    }
    public function getDoctors(Request $request)
    {
        try {
            $doctors = User::role('doctor')
                ->when($request->filled('name'), function ($query) use ($request) {
                    $query->where('name', 'like', '%' . trim($request->name) . '%');
                })
                ->when($request->filled('qualification'), function ($query) use ($request) {
                    $query->where('qualifications', 'like', '%' . trim($request->qualification) . '%');
                })
                ->when($request->filled('specialization'), function ($query) use ($request) {
                    $query->where('specialization', 'like', '%' . trim($request->specialization) . '%');
                })
                // 💡 Sort logic
                ->when($request->filled('sort'), function ($query) use ($request) {
                    if ($request->sort === 'price_low_high') {
                        $query->orderBy('price', 'asc');
                    } elseif ($request->sort === 'price_high_low') {
                        $query->orderBy('price', 'desc');
                    }
                })
                ->get();

            return response()->json([
                'error' => false,
                'html' => view('website.layouts.doctor-card', compact('doctors'))->render()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => 'Unable to fetch doctors. Please try again.'
            ]);
        }
    }




    public function getSlots(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'date' => 'required|date',
                'doctor_id' => 'required|exists:users,id'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'messages' => $validator->errors()
                ], 400);
            }
            $day = Carbon::parse($request->date)->format('l');
            $availableTimings = AvailableTiming::where('day', $day)->where('user_id', $request->doctor_id)->get();
            // $slots = $availableTiming && $availableTiming->slots ? json_decode($availableTiming->slots) : [];
            return response()->json([
                'error' => false,
                // 'slots' => $slots,
                'availableTimings' => $availableTimings,
                'day' => $day
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function faqs()
    {
        return view('website.pages.faqs');
    }
    public function contactUs()
    {
        return view('website.pages.contact-us');
    }
    public function privacyPolicy()
    {
        return view('website.pages.privacy-policy');
    }
    public function termsAndConditions()
    {
        return view('website.pages.terms-and-conditions');
    }
}
