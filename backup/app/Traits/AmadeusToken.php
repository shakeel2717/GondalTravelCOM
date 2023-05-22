<?php

namespace App\Traits;

use Exception;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;

trait AmadeusToken
{

    protected function getBearerToken(): bool|string
    {

        $this->apiLive = Setting::select('value')->where('name', 'live_api_on')->firstOrFail()->value('value');
        $this->bookingLive = Setting::select('value')->where('name', 'live_booking_on')->firstOrFail()->value('value');
        $this->apiUrl = $this->apiLive ? config('app.live_amadeus_api') : config('app.test_amadeus_api');

        try {


            if($this->apiLive){
                $key = [
                    'client_id' => config('app.client_id'),
                    'client_secret' => config('app.client_secret'),
                    'grant_type' => config('app.grant_type'),
                ];
            }else{
                $key = [
                    'client_id' => config('app.test_client_id'),
                    'client_secret' => config('app.test_client_secret'),
                    'grant_type' => config('app.grant_type'),
                ];
            }


            $token = Http::asForm()->post($this->apiUrl . 'v1/security/oauth2/token', $key);

            // dd($data = $token->json());

            if ($token->status() != 200) return false;

            $data = $token->json();
            return 'Bearer ' . $data['access_token'];
        } catch (Exception $exception) {
            return false;
        }

    }


}
