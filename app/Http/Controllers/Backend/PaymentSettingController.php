<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CodSetting;
use App\Models\PaypalSetting;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\BitwiseAnd;

class PaymentSettingController extends Controller
{
    public function index(){
        $paypalSetting = PaypalSetting::first();
        $codSetting = CodSetting::first();
        return view('admin.payment-settings.index',compact('paypalSetting', 'codSetting'));
    }
}
