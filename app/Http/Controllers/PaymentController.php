<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Model\Event\Event;
use App\Model\Event\EventAttendee;
use App\Http\Controllers\User\UserController;
use Auth;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $event = Event::first();
        $eventattendee = EventAttendee::create([
            'user_id' => Auth::user()->id,
            'event_id' => $event->id,
            'quantity' => 1,
            'pay_status' => $paymentDetails['data']['status'],
            'reference_code' => EventAttendee::referenceCode($event),
            'pay_reference' => $paymentDetails['data']['reference'],
            'amount' => ($paymentDetails['data']['amount'])/100,
        ]);

        return redirect()->route('reciept', ['id' => $eventattendee->id]);

        //dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function getReciept($id)
    {
        $reciept_id = EventAttendee::find($id);
        return view('reciept')->with('reciept', $reciept_id);
    }
}
