<?php

namespace App\DataTables;

use App\Models\Product;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SellerDisapprovedProductDataTable extends DataTable
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
            $editBtn = "<a href='".route('seller.edit-disapproved-products', $query->id)."' class='btn btn-primary row' style='margin:0 0 5px 0;'> edit </a>";
            $deleteBtn = "<a style='margin:0 2px 5px 0;' href='".route('seller.products.destroy', $query->id)."' class=' row btn btn-danger delete-item'> delete </a>";
            $moreBtn = '


                <button type="button" class="btn btn-primary" >
                <a class="dropdown-item has-icon" href="'.route('seller.products-image-gallery.index', ['product'=>$query->id]).'"><i class="far fa-image"></i> Image Gallery</a>
                </button>



          ';
        //     $moreBtn = '<div class="card-body">
        //     <div class="dropdown mt-2">
        //       <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        //       More Action
        //       </button>
        //       <div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
        //         <a class="dropdown-item has-icon" href="'.route('admin.products-image-gallery.index', ['product'=>$query->id]).'"><i class="far fa-heart"></i> Image Gallery</a>
        //         <a class="dropdown-item has-icon" href="#"><i class="far fa-file"></i> Another action</a>
        //         <a class="dropdown-item has-icon" href="#"><i class="far fa-clock"></i> Something else here</a>
        //       </div>
        //     </div>
        //   </div>';

            return $editBtn.$deleteBtn.$moreBtn;
        })
        ->addColumn('image', function($query){
           return "<img width='100px' src='".asset($query->thumb_image)."' ></img>";
        })



        ->addColumn('status', function($query){
            if($query->status == 1){
            //     $button = '<label class="custom-switch mt-2">
            //     <input type="checkbox" checked name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="'.$query->id.'">
            //     <span class="custom-switch-indicator"></span>
            //   </label>';

                $button = '<div class="form-check form-switch">
                <input checked class="form-check-input change-status" type="checkbox" id="flexSwitchCheckDefault " data-id="'.$query->id.'" >
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
              </div>';
            }else {
        //         $button = '<label class="custom-switch mt-2">
        //     <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input change-status" data-id="'.$query->id.'">
        //     <span class="custom-switch-indicator"></span>
        //   </label>';
        $button = '<div class="form-check form-switch">
                <input class="form-check-input change-status" type="checkbox" id="flexSwitchCheckDefault" data-id="'.$query->id.'">
                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
              </div>';

            }
          return $button;
        })

        ->addColumn('approved', function($query){
            if($query->is_approved == 1){
                return '<i class="badge bg-success"> Approved </i>';
            }elseif($query->is_approved == 2){
                return '<i class="badge bg-danger"> Disapproved </i>';
            }else {
                return '<i class="badge bg-warning"> Pending </i>';
            }
        })
        ->rawColumns(['image','status','action','approved'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('is_approved', 2)->newQuery(); //security purpose,,, look up ang seller id then authenicate ang user if mag match sya sa current user then fetch ang praoduct ato

    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('sellerproduct-table')
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
            Column::make('image')->width(50),
            Column::make('name'),
            Column::make('price'),
            Column::make('approved')->title('Is approved?'),
            Column::make('status'),
            Column::make('remark'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(80)
                  ->addClass('text-center')

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SellerProduct_' . date('YmdHis');
    }
}
