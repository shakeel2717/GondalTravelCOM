<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class TicketNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'checking new ticket and send notification.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
     info("Checking Expireing Ticket");
     // getting all tickets
     $now = Carbon::now();
    $expiry_time = Carbon::now()->addHour();
     $tickets = Ticket::where('last_ticketing_date', '>=', now()->subHour()->format('Y-m-d H:i'))
                    ->latest()->get();
     $allTickets = "";
     $hasAnyRecord = false;
     foreach($tickets as $ticket){
         $date = Carbon::parse($ticket->last_ticketing_date);
         $remainingHours = $date->diffInHours(Carbon::now());
         info($remainingHours);
         if($remainingHours > 0 && $remainingHours < 3){
             if($ticket->ticket_status != "issued"){
                $hasAnyRecord = true;
                $allTickets .= $ticket->prn_no." / {$ticket->p_name} {$ticket->p_username} / {$ticket->contact_no} will expired after ".$date->diffForHumans()." & Time: {$ticket->last_ticketing_date} \n";    
             }
         }

     }
     if($tickets->count() > 0){
         $text = "Following Ticket Id are About to Expired soon \n";
         
         $text .= $allTickets ."\n";
         $text .= "This is Automatic Email from Gondal Travel Website";
         if($hasAnyRecord){
         try {
            Mail::raw($text, function ($message) {
                $message->to('shakeel2717@gmail.com');
                $message->to('travelgondal@gmail.com');
                $message->subject('Alert! Tickets are about to Expired');
            });
        } catch (\Exception $e) {
            info('Failed to send email: ' . $e->getMessage());
        }
    }
     }
     
    }
}