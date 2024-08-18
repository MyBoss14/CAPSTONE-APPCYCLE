<?php

namespace App\Http\Controllers\Backend;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\TransactionDataTable;

class TransactionController extends Controller
{
   public function index(TransactionDataTable $dataTable) {

    return  $dataTable->render('admin.transaction.index');

    }

    public function filter(Request $request, TransactionDataTable $dataTable) {

        // Store old input values in session flash data
        $request->session()->flashInput($request->input());

        $start_date=$request->start_date;
        $end_date = $request->end_date;

        // Make sure dates are properly formatted for MySQL
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));

        // Filter transactions based on date range
        $transactions = Transaction::whereDate('created_at', '>=', $start_date)
                                    ->whereDate('created_at', '<=', $end_date)
                                    ->get();

        // Pass the filtered transactions to the view
        return $dataTable->render('admin.transaction.index', compact('transactions','start_date','end_date'));

     }
}
