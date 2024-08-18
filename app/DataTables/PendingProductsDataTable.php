<?php

namespace App\DataTables;

use App\Models\PendingProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\Product;

class PendingProductsDataTable extends DataTable
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
                $editBtn = "<a href='".route('admin.products.edit', $query->id)."' class='btn btn-primary'> edit </a>";
                $deleteBtn = "<a href='".route('admin.products.destroy', $query->id)."' class='ml-3  btn btn-warning delete-item'> delete </a>";
                $moreBtn = "<a href='".route('admin.disapproved-product.remark', $query->id)."' class='mt-3 ml-2  btn btn-danger' > Disapprove </a>";



                return $editBtn.$deleteBtn.$moreBtn;
            })
            ->addColumn('image', function($query){
               return "<img width='100px' src='".asset($query->thumb_image)."' ></img>";
            })
            ->addColumn('is_featured', function($query){
                if($query->is_featured == 1){
                    $button = '<label class="custom-switch mt-2">
                    <input type="checkbox" checked name="custom-switch-checkbox" class="custom-switch-input change-feature" data-id="'.$query->id.'">
                    <span class="custom-switch-indicator"></span>
                  </label>';
                }else {
                    $button = '<label class="custom-switch mt-2">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-feature" data-id="'.$query->id.'">
                <span class="custom-switch-indicator"></span>
              </label>';
                }
              return $button;
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
            ->addColumn('seller', function($query){
                return $query->seller->shop_name;
            })
            ->addColumn('approve', function($query){
                return "<select class='form-control is_approve btn-warning' data-id='$query->id'>

                <option value ='0' class='btn-warning'>Pending</option>
                <option value ='1' class='btn-success'>Approved</option>

                </select>";
            })

            ->rawColumns(['image','is_featured','status','action','approve'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('is_approved', 0)->newQuery();
        //fetch only mga pending
        //note is_featured kay approve.. XD
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pendingproducts-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
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
            Column::make('seller')->title('shop name'),
            Column::make('image'),
            Column::make('name'),
            Column::make('price'),

            Column::make('approve'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(150)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PendingProducts_' . date('YmdHis');
    }
}
