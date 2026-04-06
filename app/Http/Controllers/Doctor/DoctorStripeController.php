<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Services\StripeService;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorStripeController extends Controller
{
    private $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    public function setupStripe()
    {
        $doctor = auth()->user(); // Assuming doctor is authenticated

        try {
            // Agar account nahi hai toh create karo
            if (!$doctor->stripe?->stripe_account_id) {
                $this->stripeService->createExpressAccount($doctor);
            }

            // Onboarding link generate karo
            $onboardingUrl = $this->stripeService->generateOnboardingLink($doctor);

            return redirect($onboardingUrl);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function stripeReturn(Request $request)
    {
        $doctor = auth()->user();

        try {
            // Account status check karo
            $this->stripeService->checkAccountStatus($doctor);

            if ($doctor->canReceivePayments()) {
                return redirect()->route('doctor.dashboard')
                    ->with('success', 'Stripe account successfully connected! You can now receive payments.');
            } else {
                return redirect()->route('doctor.dashboard')
                    ->with('warning', 'Account setup incomplete. Please complete all requirements.');
            }
        } catch (\Exception $e) {
            return redirect()->route('doctor.dashboard')
                ->with('error', 'Error checking account status: ' . $e->getMessage());
        }
    }

    public function stripeRefresh()
    {
        $doctor = auth()->user();

        try {
            $onboardingUrl = $this->stripeService->generateOnboardingLink($doctor);
            return redirect($onboardingUrl);
        } catch (\Exception $e) {
            return redirect()->route('doctor.dashboard')
                ->with('error', 'Error refreshing onboarding link: ' . $e->getMessage());
        }
    }

    public function dashboard()
    {
        $doctor = auth()->user();

        // Account status update karo
        if ($doctor->stripe_account_id) {
            $this->stripeService->checkAccountStatus($doctor);
        }

        return view('doctor.stripe-dashboard', compact('doctor'));
    }
}
