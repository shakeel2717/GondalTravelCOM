<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExpireTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire all the tickets within two hours if fee not paid.';

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
     DB::table('tickets')
         ->where('payment_status', false)
         ->where('payment_method', 'cash')
         ->update([
             'status' => true
         ]);
    }
}
