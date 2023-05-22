<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Passenger;

class InvoiceController extends Controller
{    
    
    public function download($id)
    {
        $ticket = Ticket::findOrFail($id);
        $passenger = Passenger::where('ticket_id',$ticket->id)->latest()->first();
        if($passenger == ""){
            die("No Passenger Found");
        }
        return view('admin.pdf.invoice', compact('ticket','passenger'));
        
    }
    
}

