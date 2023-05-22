<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class ticket extends Mailable
{
    use Queueable, SerializesModels;
  
    public $data;
    public $ticket;
    public $passengers;
    public $collectorr;


  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$ticket,$passengers,$collectorr)
    {
        $this->data = $data;
        $this->ticket = $ticket;
        $this->passengers = $passengers;
        $this->collectorr = $collectorr;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Gondal-Travels')
                    ->view('emails.ticket');
    }
}