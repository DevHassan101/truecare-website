<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class QuickBloxService
{
    public function createSession()
    {
        $params = [
            'application_id' => env('QB_APP_ID'),
            'auth_key' => env('QB_AUTH_KEY'),
            'timestamp' => time(),
            'nonce' => rand(1000, 9999),
        ];

        ksort($params);
        $signatureString = http_build_query($params, '', '&');
        $params['signature'] = hash_hmac('sha1', $signatureString, env('QB_AUTH_SECRET'));

        $response = Http::post('https://api.quickblox.com/session.json', $params);

        return $response->json();
    }

    public function createUser($login, $password, $fullName)
    {
        $session = $this->createSession();

        return Http::withHeaders([
            'QB-Token' => $session['session']['token']
        ])->post('https://api.quickblox.com/users.json', [
            'user' => [
                'login' => $login,
                'password' => $password,
                'full_name' => $fullName,
            ]
        ])->json();
    }

    public function login($login, $password)
    {
        return Http::asForm()->post('https://api.quickblox.com/login.json', [
            'login' => $login,
            'password' => $password,
        ])->json();
    }
}
