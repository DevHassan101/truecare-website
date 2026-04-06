<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\AvailableTiming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AvailableTimingController extends Controller
{
    public function index()
    {
        return view('doctor.pages.available-timings');
    }
    public function get(Request $request)
    {
        try {
            $availableTimings = AvailableTiming::where('day', $request->day ?? 'monday')->where('user_id', Auth::id())->get();
            // $slots = $availableTiming && $availableTiming->slots ? json_decode($availableTiming->slots) : [];
            return response()->json([
                'error' => false,
                // 'slots' => $slots,
                'availableTimings' => $availableTimings,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'day' => 'required',
                'time' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors(),
                ], 400);
            }
            // $availableTiming = AvailableTiming::where('day', $request->day)
            //     ->where('user_id', Auth::id())->first();
            // if ($availableTiming) {
            //     $slots = json_decode($availableTiming->slots, true) ?? [];
            //     $slots[] = $request->time;

            //     $availableTiming->update([
            //         'slots' => json_encode($slots)
            //     ]);
            // } else {
                AvailableTiming::create([
                    'day' => $request->day,
                    'time' => $request->time,
                    'user_id' => Auth::id()
                ]);
            // }
            return response()->json([
                'error' => false,
                'message' => "Slot added successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'day' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'error' => true,
                    'message' => $validator->errors(),
                ], 400);
            }
            AvailableTiming::where('day', $request->day)->where('user_id', Auth::id())->delete();
            return response()->json([
                'error' => false,
                'message' => "Slots deleted successfully",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
