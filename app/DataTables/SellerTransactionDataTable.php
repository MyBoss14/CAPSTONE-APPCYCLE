<?php

namespace App\DataTables;

use App\Models\Transaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SellerTransactionDataTable extends DataTable
{

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'transaction.action')
            ->addColumn('invoice_id',function($query){
                return '#'.$query->order->invoice_id;
            })
            ->addColumn('amount_in_base_currency',function($query){
                return $query->amount.' '.$query->order->currency_name;
            })
            ->addColumn('amount_in_real_currency',function($query){
                return $query->amount.' '.$query->amount_real_currency_name;
            })

            ->filterColumn('invoice_id', function($query, $keyword){
                $query->whereHas('order', function($query) use ($keyword){
                    $query->where('invoice_id', 'like', "%$keyword%");
                });
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Transaction $model): QueryBuilder
    {
        $query = $model->newQuery();

        // Get the authenticated user's seller ID
        $sellerId = Auth::user()->seller->id;

        // Apply seller_id filter
        $query->whereHas('order', function ($query) use ($sellerId) {
            $query->whereHas('orderProducts', function ($query) use ($sellerId) {
                $query->where('seller_id', $sellerId);
            });
        });

        // Check if start and end dates are provided in the request
        if(request()->has('start_date') && request()->has('end_date')) {
            $start_date = request('start_date');
            $end_date = request('end_date');

            // Apply date range filter
            $query->whereDate('created_at', '>=', $start_date)
                  ->whereDate('created_at', '<=', $end_date);
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('transaction-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([


                        Button::make('print')->text('<i class="fas fa-print"></i>'),
                        Button::make('reload')->text('<i class="fas fa-print"></i>')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('invoice_id'),
            Column::make('transaction_id'),
            Column::make('payment_method'),
            Column::make('amount_in_base_currency'),
            Column::make('amount_in_real_currency'),


        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Transaction_' . date('YmdHis');
    }
}
