<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;

class SendController extends Controller
{
    public function sendWhatsAppMessage()
{
    $twilioSid = getenv('TWILIO_SID');
    $twilioToken = getenv('TWILIO_AUTH_TOKEN');
    $twilioFrom = getenv('TWILIO_WHATSAPP_FROM');
    
    $client = new Client($twilioSid, $twilioToken);
    $message = $client->messages->create(
        'whatsapp:+201095413775', // Replace with recipient's WhatsApp number
        [
            'from' => 'whatsapp:' . $twilioFrom,
            'body' => 'Hello, this is a WhatsApp message from your Laravel project!',
            ]
        );
        dd('yes');
    dd($message);
    return response()->json(['message' => 'WhatsApp message sent!']);
}
}
