<?php

namespace App\Notifications;

use App\Channels\Messages\WhatsappMessage;
use App\Channels\WhatsappChannel;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TicketProcessed extends Notification
{
    use Queueable;

    public $ticket;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        //
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WhatsappChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return WhatsappMessage
     */
    public function toWhatsApp($notifiable)
    {
        $user = auth()->user() == null ? User::where('id', 1)->first() : auth()->user();
        return (new WhatsappMessage)
            ->content("Ticket Booked by " . " $user->email, " . " (Ticket PR-NO: " . $this->ticket->prn_no . "Price: " . $this->ticket->price . " Ticket Payment-Method: " . $this->ticket->payment_method . ")");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
