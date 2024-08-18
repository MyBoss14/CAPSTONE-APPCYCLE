<?php

namespace App\Http\Controllers\Frontend;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\CodSetting;
use App\Models\Transaction;
use App\Models\UserAddress;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\PaypalSetting;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function index(){
        // if address doesn't exist sa seasionm e redirect sa checkout route
        if(!Session::has('address')){
            return redirect()->route('user.checkout');
        }


        return view('frontend.pages.payment');
    }

    // success payment
    public function paymentSuccess(){
        return view('frontend.pages.payment-success');
    }

    // payment cancel
    public function paypalCancel(){
        toastr('Something went wrong, Try again later!'. 'error', 'Error');
        return redirect()->route('user.payment');
    }

    public function storeOrder($paymentMethod, $paymentStatus, $transactionId, $paidAmount, $paidCurrencyName){
        $setting = GeneralSetting::first();

        $order = new Order();
        $order->invoice_id = rand(1,99999999999);
        $order->user_id= Auth::user()->id;
        $order->sub_total = getCartTotal();
        $order->amount =getTotalPayable();
        $order->currency_name = $setting->currency_name;
        $order->curency_icon = $setting->currency_icon;
        $order->product_qty = Cart::content()->count();
        $order->payment_method = $paymentMethod;
        $order->payment_status =$paymentStatus;
        $order->order_address = json_encode(Session::get('address'));
        $order->shipping_method = json_encode(Session::get('shipping_method'));
        $order->order_status = 'pending';
        $order->save();

        // store order products
        foreach(Cart::content() as $item){
            $product = Product::find($item->id);
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->seller_id = $product->seller_id;
            $orderProduct->product_name = $product->name;
            $orderProduct->category = json_encode($item->options->category);
            $orderProduct->unit_price =$item->price;
            $orderProduct->qty = $item->qty;
            $orderProduct->save();
        }

        // after the loop store trans. details
        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->transaction_id = $transactionId;
        $transaction->payment_method = $paymentMethod;
        $transaction->amount = getTotalPayable();
        $transaction->amount_real_currency = $paidAmount;
        $transaction->amount_real_currency_name = $paidCurrencyName;
        $transaction->save();
    }

    // clear session

    public function clearSession(){
        Cart::destroy();
        Session::forget('address');
        Session::forget('shipping_method');

    }


    // paypal configuration
    public function paypalConfig(){
        $paypalSetting = PaypalSetting::first();
        $config = [
            'mode'    => $paypalSetting->mode == 1 ? 'live': 'sandbox', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => $paypalSetting->client_id,
                'client_secret'     => $paypalSetting->secret_key,
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => $paypalSetting->client_id,
                'client_secret'     => $paypalSetting->secret_key,
                'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
            ],

            'payment_action' => 'Sale',
            'currency'       => $paypalSetting->currency_name,
            'notify_url'     => '', // Change this accordingly for your application.
            'locale'         =>  'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   =>  true, // Validate SSL when creating api client.
        ];

        return $config;
    }
    // paypal
    public function payWithPaypal(){
        $config = $this->paypalConfig();
        $paypalSetting = PaypalSetting::first();

        // calculate total payable amount + currency rate
        $total = getTotalPayable();
        $payableAmount =round($total*$paypalSetting->currency_rate, 2); // we add to for decimal point 100 -> 100.00

        // if mag error try ang  $provider = new PayPalClient($config);

        $provider = new PayPalClient($config);
        $provider->getAccessToken();


        $response =$provider->createOrder([
            "intent" =>"CAPTURE",
            "application_context"=>[
                "return_url"=>route('user.paypal.success'),
                "cancel_url"=>route('user.paypal.cancel'),
            ],
            "purchase_units"=>[
                [
                    "amount"=>[
                        "currency_code"=>$config['currency'],
                        "value"=>$payableAmount
                    ]
                ]
            ]
        ]);

        // check id if exist
        if(isset($response['id']) && $response['id'] != null){
            // run a loop then get the approve value of rel then go to that link
            foreach($response['links'] as $link){
                if($link['rel']== 'approve'){
                    return redirect()->away($link['href']);
                }
            }

        } else {
            return redirect()->route('user.paypal.cancel');
        }

    }

    public function paypalSuccess(Request $request){
        $config = $this->paypalConfig();
        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);
        // check the response status if completed
        if (isset($response['status']) && $response['status'] == 'COMPLETED'){
            $total = getTotalPayable();
            $paypalSetting = PaypalSetting::first();
            $paidAmount =round($total*$paypalSetting->currency_rate, 2);

            // store data
            $this->storeOrder('paypal',1,$response['id'],$paidAmount, $paypalSetting->currency_name);
            // clear session
            $this->clearSession();

            return redirect()->route('user.payment.success');

        }


        return redirect()->route('user.paypal.cancel');

    }

    // cod
    public function codPayment(Request $request){

        $codSetting =CodSetting::first();
        $setting = GeneralSetting::first();
        if($codSetting->status == 0){
            return redirect()->back();
        }

        $total = getTotalPayable();
        $payableAmount =round($total, 2); //  add 2 for decimal point 100 -> 100.00

        //store data
        $this->storeOrder('COD',0,\Str::random(10),$payableAmount, $setting->currency_name);

        // clear session
        $this->clearSession();

        return redirect()->route('user.payment.success');
    }
}
