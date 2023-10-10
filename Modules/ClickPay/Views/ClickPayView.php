<?php

namespace Modules\ClickPay\Views;

use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\ClickPay\Entities\ClickPay;

class ClickPayView implements PaymentViewInterface
{

    public static function paymentView($key)
    {
        $helper = GatewayHelper::getInstance();
        try {
            $instamojo = ClickPay::first()->data;
            // method post
            
    
          
          
           return view('clickpay::pay', [
              'instruction' => $instamojo->instruction,
              'purchaseData' => $helper->getPurchaseData($key)
              ]);
         
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withErrors(['error' => __('Purchase data not found.')]);
        }
    }
}
