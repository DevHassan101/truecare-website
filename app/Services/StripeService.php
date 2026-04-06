<?php

namespace App\Services;

use Stripe\StripeClient;
use App\Models\Doctor;
use App\Models\User;

class StripeService
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('stripe.secret_key'));
    }

    public function createExpressAccount(User $doctor)
    {
        try {
            $account = $this->stripe->accounts->create([
                'type' => 'express',
                'country' => 'US',
                'email' => $doctor->email,
                'capabilities' => [
                    'card_payments' => ['requested' => true],
                    'transfers' => ['requested' => true],
                ],
                'business_type' => 'individual',
                'individual' => [
                    'first_name' => $doctor->name,
                    'last_name' => $doctor->name,
                    'email' => $doctor->email,
                ],
                'settings' => [
                    'payouts' => [
                        'schedule' => [
                            'interval' => 'weekly',
                            'weekly_anchor' => 'monday',
                        ],
                    ],
                ],
            ]);

            $doctor->update([
                'stripe_account_id' => $account->id,
                'stripe_account_data' => $account->toArray(),
            ]);

            return $account;
        } catch (\Exception $e) {
            throw new \Exception('Failed to create Stripe account: ' . $e->getMessage());
        }
    }

    public function generateOnboardingLink(User $doctor)
    {
        try {
            $accountLink = $this->stripe->accountLinks->create([
                'account' => $doctor->stripe_account_id,
                'refresh_url' => route('doctor.stripe.refresh'),
                'return_url' => route('doctor.stripe.return'),
                'type' => 'account_onboarding',
            ]);

            return $accountLink->url;
        } catch (\Exception $e) {
            throw new \Exception('Failed to generate onboarding link: ' . $e->getMessage());
        }
    }

    public function checkAccountStatus(User $doctor)
    {
        try {
            $account = $this->stripe->accounts->retrieve($doctor->stripe?->stripe_account_id);

            $doctor->update([
                'stripe_charges_enabled' => $account->charges_enabled,
                'stripe_payouts_enabled' => $account->payouts_enabled,
                'stripe_onboarding_complete' => $account->details_submitted,
                'stripe_account_data' => $account->toArray(),
            ]);

            return $account;
        } catch (\Exception $e) {
            throw new \Exception('Failed to check account status: ' . $e->getMessage());
        }
    }
}
