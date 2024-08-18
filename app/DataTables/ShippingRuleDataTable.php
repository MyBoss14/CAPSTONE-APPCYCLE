<?php

namespace App\DataTables;

use App\Models\GeneralSetting;
use App\Models\ShippingRule;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShippingRuleDataTable extends DataTable
{
    //fetch currency icon and put the value here
    protected $currencyIcon = '';

    public function __construct(){
        $this->currencyIcon = GeneralSetting::first()->currency_icon;
    }
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $editBtn = "<a href='".route('admin.shipping-rule.edit', $query->id)."' class='btn btn-primary'> edit </a>";
            $deleteBtn = "<a href='".route('admin.shipping-rule.destroy', $query->id)."' class='ml-3 mt-2 btn btn-danger delete-item'> delete </a>";
            return $editBtn.$deleteBtn;

        })
        ->addColumn('status', function($query){
            if($query->status == 1){
                $button = '<label class="custom-switch mt-2">
                <input type="checkbox" checked name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="'.$query->id.'">
                <span class="custom-switch-indicator"></span>
              </label>';
            }else {
                $button = '<label class="custom-switch mt-2">
            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="'.$query->id.'">
            <span class="custom-switch-indicator"></span>
          </label>';
            }
          return $button;
        })
        ->addColumn('type', function($query){
            if($query->type == 'min_cost'){
                return '<i class="badge badge-success text-dark"> Minimum Amount</i>';
            }else {
                return '<i class="badge badge-warning text-dark"> Flat Amount</i>';
            };
        })
        ->addColumn('min_cost', function($query){
            if($query->type == 'min_cost'){
                return $this->currencyIcon.$query->min_cost;
            }else {
                return $this->currencyIcon.'0';
            };
        })
        ->addColumn('cost', function($query){
            return  $this->currencyIcon.$query->cost;
        })
        ->rawColumns(['status', 'action','type','min_cost','cost'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ShippingRule $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('shippingrule-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('print')->text('<i class="fas fa-print"></i>'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('name'),
            Column::make('type'),
            Column::make('min_cost'),
            Column::make('cost'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ShippingRule_' . date('YmdHis');
    }
}
