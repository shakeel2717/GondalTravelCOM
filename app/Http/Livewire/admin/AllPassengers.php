<?php

namespace App\Http\Livewire\admin;

use App\Models\Passenger;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllPassengers extends PowerGridComponent
{
    use ActionButton;

    public int $ticket_id;

    public $name;
    public $surname;
    public $email;
    public $contact_no;
    public $age;
    public $gender;
    public $country;
    public $pidname;
    public $dob;
    public $pidno;
    public $pied;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        return [
            Footer::make()
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
     * @return Builder<\App\Models\Passenger>
     */
    public function datasource(): Builder
    {
        return Passenger::query()->where('ticket_id', $this->ticket_id);
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
        return [];
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
            ->addColumn('ticket_id')

            /** Example of custom column using a closure **/
            ->addColumn('ticket_id_lower', function (Passenger $model) {
                return strtolower(e($model->ticket_id));
            })

            ->addColumn('name')
            ->addColumn('surname')
            ->addColumn('email')
            ->addColumn('contact_no')
            ->addColumn('age')
            ->addColumn('gender')
            ->addColumn('country')
            ->addColumn('pidname')
            ->addColumn('dob')
            ->addColumn('pidno')
            ->addColumn('pied')
            ->addColumn('created_at_formatted', fn (Passenger $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Passenger $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
            Column::make('NAME', 'name')
                ->editOnClick(),

            Column::make('SURNAME', 'surname')
                ->editOnClick(),

            Column::make('EMAIL', 'email')
                ->editOnClick(),

            Column::make('CONTACT NO', 'contact_no')
                ->editOnClick(),

            Column::make('AGE', 'age')
                ->editOnClick(),

            Column::make('GENDER', 'gender')
                ->editOnClick(),

            Column::make('COUNTRY', 'country')
                ->editOnClick(),

            Column::make('PIDNAME', 'pidname')
                ->editOnClick(),

            Column::make('DOB', 'dob')
                ->editOnClick(),

            Column::make('PIDNO', 'pidno')
                ->editOnClick(),

            Column::make('PIED', 'pied')
                ->editOnClick(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->editOnClick(),
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
     * PowerGrid Passenger Action Buttons.
     *
     * @return array<int, Button>
     */

    public function onUpdatedEditable(string $id, string $field, string $value): void
    {
        Passenger::query()->find($id)->update([
            $field => $value,
        ]);
    }

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('passenger.edit', ['passenger' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('passenger.destroy', ['passenger' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Passenger Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($passenger) => $passenger->id === 1)
                ->hide(),
        ];
    }
    */
}
