<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerSProduct;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SellerSProductsDataTable extends DataTable
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
                $deleteBtn = "<a href='".route('admin.products.destroy', $query->id)."' class='ml-3  btn btn-danger delete-item'> delete </a>";
                $moreBtn = '<div class="card-body">
                <div class="dropdown d-inline show">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  More Action
                  </button>
                  <div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item has-icon" href="'.route('admin.products-image-gallery.index', ['product'=>$query->id]).'"><i class="far fa-heart"></i> Image Gallery</a>
                    <a class="dropdown-item has-icon" href="#"><i class="far fa-file"></i> Another action</a>
                    <a class="dropdown-item has-icon" href="#"><i class="far fa-clock"></i> Something else here</a>
                  </div>
                </div>
              </div>';

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
                return "<select class='form-control is_approve' data-id='$query->id'>
                    <option value ='0'>Pending</option>
                    <option selected value ='1'>Approved</option>
                </select>";
            })
            ->addColumn('category', function($query){
                return $query->category->name;
            })

            ->rawColumns(['image','is_featured','status','action', 'approve','category'])
            ->setRowId('id');
    }
    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('seller_id', '!=', Auth::user()->seller->id)
        ->where('is_approved', 1)
        ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('sellersproducts-table')
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
            Column::make('category'),
            Column::make('image'),
            Column::make('name'),
            Column::make('price'),
            // Column::make('is_featured')->title('Approval'),
            // Column::make('status'),
            Column::make('approve'),
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
        return 'SellerSProducts_' . date('YmdHis');
    }
}
