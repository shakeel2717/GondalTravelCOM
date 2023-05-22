<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;

class WhatsappChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWhatsApp($notifiable);
        $from = config('services.twilio.whatsapp_from');
        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));
        return $twilio->messages->create('whatsapp:' . '+923156986335', [
            "from" => 'whatsapp:' . $from,
            "body" => $message->content
        ]);
    }
}
