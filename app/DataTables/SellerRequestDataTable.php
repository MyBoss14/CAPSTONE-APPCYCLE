<?php

namespace App\DataTables;

use App\Models\Seller;
use App\Models\SellerRequest;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SellerRequestDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $showBtn = "<a href='".route('admin.seller-request.show', $query->id)."' class='btn btn-primary'> view </a>";
        return $showBtn;
        })
            ->addColumn('user_name', function($query){
                return $query->user->name;
            })
            ->addColumn('shop_name', function($query){
                return $query->shop_name;
            })
            ->addColumn('shop_email', function($query){
                return $query->email;
            })
            ->addColumn('status', function($query){
                if($query->status==0){
                    return "<span class='badge bg-warning'>pending</span>";
                }else{
                    return "<span class='badge bg-success'>active</span>";
                }

            })
            ->rawColumns(['status','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Seller $model): QueryBuilder
    {
        return $model->where('status', 0)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('sellerrequest-table')
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
            Column::make('user_name'),
            Column::make('shop_name'),
            Column::make('shop_email'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SellerRequest_' . date('YmdHis');
    }
}
