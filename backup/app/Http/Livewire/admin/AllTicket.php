<?php

namespace App\Http\Livewire\admin;

use App\Models\CashCollector;
use App\Models\Ticket;
use App\Models\Passenger;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllTicket extends PowerGridComponent
{
    use ActionButton;

    public $prn_no;
    public $status;
    public $confirmation;
    public $bags;
    public $payment_status;
    public $amount;
    public $ticket_num;
    public $company;
    public $destination;
    public $departure_date;
    public $return_date;
    public $p_name;
    public $p_surname;
    public $contact_no;
    public $issued_from;
    public $ticket_status;
    public $collector_profit;
    public $total_amount;
    public $received;
    public $admin_price;
    public $admin_profit;
    public $payment_iata;
    public $remarks;
    public $reminder;
    public $last_ticketing_date;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Ticket>
     */
    public function datasource(): Builder
    {
        return Ticket::query()->latest();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [
            "User" => [
                'name'
            ]
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('user', function (Ticket $model) {
                return $model->user->name ?? "NO User";
            })

            /** Example of custom column using a closure **/
            ->addColumn('user_id_lower', function (Ticket $model) {
                return strtolower(e($model->user_id));
            })

            ->addColumn('prn_no')
            ->addColumn('status')
            ->addColumn('confirmation')
            ->addColumn('bags')
            ->addColumn('payment_status')
            ->addColumn('payment_method')
            ->addColumn('amount')
            ->addColumn('ticket_num')
            ->addColumn('company')
            ->addColumn('destination')
            ->addColumn('departure_date_formatted', fn (Ticket $model) => Carbon::parse($model->departure_date)->format('d/m/Y H:i:s'))
            ->addColumn('return_date_formatted', fn (Ticket $model) => Carbon::parse($model->return_date)->format('d/m/Y H:i:s'))
            ->addColumn('p_name')
            ->addColumn('p_surname')
            ->addColumn('contact_no')
            ->addColumn('issued_from')
            ->addColumn('ticket_status')
            ->addColumn('collector_profit')
            ->addColumn('total_amount')
            ->addColumn('received')
            ->addColumn('remaining', function (Ticket $model) {
                return $model->total_amount - $model->received;
            })
            ->addColumn('admin_price')
            ->addColumn('admin_profit')
            ->addColumn('payment_iata')
            ->addColumn('remarks')
            ->addColumn('reminder')
            ->addColumn('last_ticketing_date')
            ->addColumn('last_ticketing_date_human', function (Ticket $model) {
                $date = Carbon::parse($model->last_ticketing_date);
                if ($model->last_ticketing_date == "") {
                    return "Not Updated";
                } else {
                    if($model->ticket_status == "issued"){
                        return "Already Issued";
                    } else {
                    return $date->diffForHumans() ?? "No";
                    }
                }
            })
            ->addColumn('created_at_formatted', fn (Ticket $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Ticket $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('USER ID', 'user')
                ->searchable(),
                
                Column::make('P NAME', 'p_name')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('P SURNAME', 'p_surname')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),
                
                Column::make('CONTACT NO', 'contact_no')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('PNR NO', 'prn_no')
                ->sortable()
                ->editOnClick()
                ->clickToCopy(true)
                ->searchable()
                ->makeInputText(),
                
                Column::make('TICKET NUM', 'ticket_num')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),
                
                Column::make('COMPANY', 'company')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('DESTINATION', 'destination')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('DEPARTURE DATE', 'departure_date_formatted', 'departure_date')
                ->searchable()
                ->sortable()
                ->editOnClick()
                ->makeInputDatePicker(),

            Column::make('RETURN DATE', 'return_date_formatted', 'return_date')
                ->searchable()
                ->sortable()
                ->editOnClick()
                ->makeInputDatePicker(),
                
                Column::make('BAGS', 'bags')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),
                
                Column::make('TICKET STATUS', 'ticket_status')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),
                
                
                Column::make('REMAINING TIME TO ISSUE TKT', 'last_ticketing_date_human'),

            Column::make('LAST TICKETING DATE', 'last_ticketing_date')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),
                

            Column::make('CONFIRM', 'confirmation')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),
                
                
            Column::make('REMARKS', 'remarks')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputText(),
                
                Column::make('ADMIN PURCHASE PRICE', 'admin_price')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputRange(),

            Column::make('ADMIN PROFIT', 'admin_profit')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputRange(),


            Column::make('PAYMENT STATUS', 'payment_status')
                ->searchable()
                ->toggleable(),
                
                Column::make('ISSUED FROM', 'issued_from')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('PAYMENT METHOD', 'payment_method')
                ->sortable()
                ->searchable()
                ->editOnClick()
                ->makeInputText(),

            Column::make('Collector Purchase Price', 'amount')
                ->sortable()
                ->editOnClick()
                ->searchable(),
                
                
                Column::make('Collector Sale Price', 'total_amount')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputRange(),


            Column::make('COLLECTOR PROFIT', 'collector_profit')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputRange(),

            
            Column::make('Collector Received from Customer', 'received')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputRange(),

            Column::make('Remaining Balance', 'remaining'),

            
            Column::make('Paid to IATA', 'payment_iata')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputRange(),

            Column::make('REMINDER', 'reminder')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputText(),

            
            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Ticket Action Buttons.
     *
     * @return array<int, Button>
     */


    public function onUpdatedEditable(string $id, string $field, string $value): void
    {
        Ticket::query()->find($id)->update([
            $field => $value,
        ]);
        
        if($field == "ticket_num"){
           Ticket::query()->find($id)->update([
                'ticket_status' => 'issued',
            ]);
        }
    }


    public function actions(): array
    {
        return [

            Button::make('print', 'PRINT')
                ->class('btn btn-primary btn-sm')
                ->route('pdf.invoice', ['id' => 'id']),
                
                
            Button::make('refund', 'REFUND')
                ->class('btn btn-danger btn-sm')
                ->emit('refund', ['id' => 'id']),

            Button::make('reissue', 'REISSUE')
                ->class('btn btn-danger btn-sm')
                ->emit('reissue', ['id' => 'id']),

            Button::make('cancel', 'CANCEL')
                ->class('btn btn-danger btn-sm')
                ->emit('cancel', ['id' => 'id']),

            Button::make('passenger', 'Passenger')
                ->class('btn btn-primary btn-sm')
                ->route('passengers.show', ['passenger' => 'id']),

            Button::make('print', 'PRINT')
                ->class('btn btn-primary btn-sm')
                ->target("")
                ->route('Itinerary', ['id' => 'prn_no']),

            Button::make('sendEmail', 'Send Email')
                ->class('btn btn-primary btn-sm')
                ->emit('sendEmail', ['id' => 'id']),
                
            Button::make('delete', 'DELETE')
                ->class('btn btn-danger btn-sm')
                ->emit('delete', ['id' => 'id']),

            //    Button::make('destroy', 'Delete')
            //        ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
            //        ->route('quotation.destroy', ['quotation' => 'id'])
            //        ->method('delete')
        ];
    }


    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'refund',
                'reissue',
                'cancel',
                'sendEmail',
                'delete',
            ]
        );
    }


    public function sendEmail($id)
    {
        $ticket = Ticket::find($id['id']);
        $data = json_decode($ticket->details, true);
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        $collector = CashCollector::where('prn_no', $ticket->prn_no)->first();
        $email_data["email"] = $passengers[0]->email;
        $email_data["bcc"] = "faraz.ds@gmail.com";
        $email_data["title"] = "Gondal-Travel";
        $email_data["body"] = "Your Ticket Has Been Booked\r\n";
        $email_data["name"] = $passengers[0]->name;
        //$pnr = $pnr;

        // $pdf = PDF::loadView('emails.mailiya', $data);
        //$pdf = PDF::loadView('pdf',['data'=>$data,'ticket'=>$ticket,'passengers'=>$passengers,'collectorr'=>$collectorr,'pdf'=>True])->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'landscape');

        $pdf = Pdf::loadView('pdf_download', ['data' => $data, 'ticket' => $ticket, 'passengers' => $passengers, 'collectorr' => $collector, 'pdf' => True])->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        //dd($request);exit;
        //Send ticket pdf to customer
        $email_data['pdf_name_ticket'] = $passengers[0]->name . '-786' . $ticket->id . '.pdf';


        Mail::send('emails.customer-ticket', $email_data, function ($message) use ($email_data, $pdf) {
            $message->to($email_data["email"], $email_data["email"])
                ->bcc($email_data["bcc"], $email_data["bcc"])
                ->subject($email_data["title"])
                ->attachData($pdf->output(), $email_data['pdf_name_ticket']);
        }); /// Comment by faraz for local server only

    }


    public function delete($id)
    {
        $ticket = Ticket::find($id['id']);
        $ticket->delete();
    }
    
    public function refund($id)
    {
        $ticket = Ticket::find($id['id']);
        $newTicket = $ticket->replicate();
        $newTicket->created_at = Carbon::now();
        $newTicket->ticket_status = "refund";
        $newTicket->save();
    }

    public function cancel($id)
    {
        $ticket = Ticket::find($id['id']);
        $newTicket = $ticket->replicate();
        $newTicket->created_at = Carbon::now();
        $newTicket->ticket_status = "cancel";
        $newTicket->save();
    }


    public function reissue($id)
    {
        $ticket = Ticket::find($id['id']);
        $newTicket = $ticket->replicate();
        $newTicket->created_at = Carbon::now();
        $newTicket->ticket_status = "reissue";
        $newTicket->save();

        // cloning pessenger
        $passengers = Passenger::where('ticket_id', $ticket->id)->get();
        foreach ($passengers as $passenger) {
            $newPassenger = $passenger->replicate();
            $newPassenger->ticket_id = $newTicket->id;
            $newPassenger->save();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Ticket Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($ticket) => $ticket->id === 1)
                ->hide(),
        ];
    }
    */
}
