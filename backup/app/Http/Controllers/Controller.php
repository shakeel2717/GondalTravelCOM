<?php

namespace App\Http\Controllers;

use App\Models\User;
use Omnipay\Omnipay;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function payStripe(Request $request, $id, $email)
    {
        $gateway = Omnipay::create('Stripe');
//        $gateway->setApiKey(env('STRIPE_SECRET_KEY'));
        $gateway->setApiKey("sk_test_51IeGmOKiAX2uoKP05imRhsC6wfbt7InCFIr35yud8z8N9zQKOjL0bXr2lCFBqp0Gf9oiK3L9K10BDlW0wi9RBePK00ngLeu4JJ");
        $token = $request->input('stripeToken');
        $response = $gateway->purchase([
            'amount' => (int)$request->get('amount'),
            'currency' => "EUR",
            'token' => $token,
        ])->send();
        if ($response->isSuccessful()) {
            // payment was successful: insert transaction data into the database
            $arr_payment_data = $response->getData();
            $isPaymentExist = Payment::where('payment_id', $arr_payment_data['id'])->first();
            if (!$isPaymentExist) {
                $payment = new Payment;
                $payment->payment_id = 'P-' . rand(0, 99999);
                $payment->payer_email = $email;
                $payment->amount = $arr_payment_data['amount'] / 100;
                $payment->currency = "EUR";
                $payment->payment_status = $arr_payment_data['status'] . "/" . "payment-method-stripe";
                $payment->save();
            }
            return "Payment is successful.";
        } else {
            // payment failed: display message to customer
            return $response->getMessage();
        }
    }
}
