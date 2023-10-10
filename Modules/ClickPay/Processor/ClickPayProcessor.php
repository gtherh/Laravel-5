<?php

namespace Modules\ClickPay\Processor;

use Illuminate\Support\Js;
use Modules\Gateway\Contracts\PaymentProcessorInterface;
use Modules\Gateway\Contracts\RequiresCallbackInterface;
use Modules\Gateway\Facades\GatewayHelper;
use Modules\ClickPay\Entities\ClickPay;
use Modules\ClickPay\Response\ClickPayResponse;
use Modules\Gateway\Contracts\HasDataResponseInterface;
use Mpdf\Tag\Dd;
use Modules\Gateway\Contracts\RequiresWebHookValidationInterface;
use Modules\Gateway\Entities\PaymentLog;

class ClickPayProcessor implements PaymentProcessorInterface, RequiresCallbackInterface
{

    private $clickPay;
    private $data;
    private $url = 'https://secure.clickpay.com.sa/payment/';
    private $payload;



    public function pay($request)
    {

        $this->data = GatewayHelper::getPurchaseData(GatewayHelper::getPaymentCode());

        $this->setup();
        $this->setPayload($request);
        return redirect($this->paymentRequest());
    }

    private function setup()
    {
        $this->setInstamojo();
    }




    private function setInstamojo()
    {
        $this->clickPay = ClickPay::first()->data;
        $this->setEnvironment();
    }

    public function paymentRequest()
    {
        $response = $this->curlRequest();

        $response = json_decode($response);

        if (!$response->redirect_url) {
            paymentLog('ClickPay::' . json_encode($response));
            throw new \Exception(__('Couldn\'t initiate the payment.'));
        }

        //   find the payment log and update the RAW response
        $paymentLog = PaymentLog::where('code', $this->data->code)->first();
        $paymentLog->response_raw = json_encode($response);
        $paymentLog->save();

        return $response->redirect_url;
    }

    private function setEnvironment()
    {
        if (!$this->clickPay->sandbox) {
            $this->setProduction();
        }
    }
    private function setProduction()
    {
        $this->setUrl('https://secure.clickpay.com.sa/payment/');
    }


    private function setUrl($url)
    {
        $this->url = $url;
    }

    private function setPayload($request)
    {


        $this->payload = json_encode([
            "profile_id" => $this->clickPay->profile_id,
            "tran_type" => "sale",
            "tran_class" => "ecom",
            'cart_id' => $this->data->code,
            'cart_currency' => 'SAR',
            'cart_amount' => round($this->data->total, 2),
            'cart_description' => 'Payment for ' . $this->data->code,

            'paypage_lang' => 'ar',
            'return' => route(config('gateway.payment_callback'), withOldQueryIntegrity(['gateway' => 'clickpay'])),
            'callback' =>
            route(config('gateway.payment_callback'), withOldQueryIntegrity(['gateway' => 'clickpay'])),

            'framed' => true,
            'framed_return_top' => true,
            'framed_return_parent' => true,
            'hide_shipping' => true,
            'hide_billing' => true,
              "tokenise"=> 2,
            "show_save_card"=> false,
            'hide_cart' => true,
            'customer_details' => [
                "name" => "first-name last-name",
                "email" => "name@email.com",
                "phone" => "05xxxxxxxx",
                "street1" => "address street",
                "city" => "riyadh",
                "state" => "riyadh",
                "country" => "SA",
                "zip" => "12345"
            ]

        ]);
    }

    private function getUrl($action)
    {
        return $this->url . $action;
    }


    public function curlRequest($action = 'request')
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getUrl($action),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_POSTFIELDS => $this->payload,
            CURLOPT_HTTPHEADER => [

                "authorization: " . $this->clickPay->server_key,
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        return curl_exec($curl);
    }

    public function getPayment($action, $tran_ref)
    {
        $field = json_encode([
            'profile_id' => $this->clickPay->profile_id,
            'tran_ref' => $tran_ref,
        ]);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getUrl($action),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_POSTFIELDS => $field,
            CURLOPT_HTTPHEADER => [
                "authorization: " . $this->clickPay->server_key,
                "content-type: application/json",
                "cache-control: no-cache"
            ],

        ));
        return curl_exec($curl);
    }

    private function paymentValidate($request, $tran_ref)
    {


        $response = $this->getPayment('query', $tran_ref);
        
        $response = json_decode($response);

        if ($response->payment_result->response_status != "A") {
            paymentLog('ClickPay::' . json_encode($response));
            throw new \Exception(__('Payment could not be verified.'));
        }
        if (!$response->tran_ref) {
            paymentLog($response);
            throw new \Exception(__('Payment is not completed.'));
        }

        return $response;
    }

    public function validateTransaction($request)
    {
      
        $this->setInstamojo();
        $this->data = GatewayHelper::getPurchaseData(GatewayHelper::getPaymentCode());
        // GET THE PAYMENT LOG
        $paymentLog = PaymentLog::where('code', $this->data->code)->first();

        $response_raw = json_decode($paymentLog->response_raw);
        $tran_ref = $response_raw->tran_ref;

        $response = $this->paymentValidate($request, $tran_ref);


        return new ClickPayResponse($this->data, $response);
    }
}
