<?php

namespace App\Http\Livewire;

use App\Models\DataProduct;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class data_products extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public string $primaryKey = 'data_products.product_id';
    public string $sortField = 'data_products.product_id';
    // public $incrementing = false;
    // protected $keyType = 'string';

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
     * @return Builder<\App\Models\DataProduct>
     */
    public function datasource(): Builder
    {
        return DataProduct::query();
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
    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('product_id')
            ->addColumn('product_name')

            /** Example of custom column using a closure **/
            ->addColumn('product_name_lower', fn (DataProduct $model) => strtolower(e($model->product_name)))

            ->addColumn('product_total')
            ->addColumn('product_mix_weight')
            ->addColumn('product_addition_weight')
            ->addColumn('product_bg_weight')
            ->addColumn('product_si_weight')
            ->addColumn('product_etiquete_weight')
            ->addColumn('product_RPM')
            ->addColumn('product_pitch');
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
            Column::make('Kode Material', 'product_id')
                ->sortable()
                ->searchable(),
            Column::make('Nama', 'product_name')
                ->sortable()
                ->searchable(),
            Column::make('Isi Perdus', 'product_total')
                ->sortable()
                ->searchable(),

            Column::make('Bobot Bumbu', 'product_mix_weight')
                ->sortable()
                ->searchable(),

            Column::make('Bobot Cabe', 'product_addition_weight')
                ->sortable()
                ->searchable(),

            Column::make('Bobot BG', 'product_bg_weight')
                ->sortable()
                ->searchable(),

            Column::make('Bobot SI', 'product_si_weight')
                ->sortable()
                ->searchable(),

            Column::make('Bobot Etiket', 'product_etiquete_weight')
                ->sortable()
                ->searchable(),
            // Column::make('Bobot FG',),
            Column::make('Product RPM', 'product_RPM')
                ->searchable(),
            Column::make('Product pitch', 'product_pitch')
                ->searchable(),
        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            // Filter::inputText('product_name')->operators(['contains']),
            // Filter::inputText('product_total')->operators(['contains']),
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
     * PowerGrid DataProduct Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('data-product.edit', function(\App\Models\DataProduct $model) {
                    return $model->id;
               }),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('data-product.destroy', function(\App\Models\DataProduct $model) {
                    return $model->id;
               })
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
     * PowerGrid DataProduct Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($data-product) => $data-product->id === 1)
                ->hide(),
        ];
    }
    */
}
