<?php

namespace Modules\ClickPay\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;


class ClickPayResponse extends Response implements HasDataResponseInterface
{
    protected $response;
    private $data;

    public function __construct($data, $response)
    {
        $this->data = $data;
        $this->response = $response;
        $this->updateStatus();
        return $this;
    }


    public function getRawResponse(): string
    {
        return json_encode($this->response);
    }


    protected function updateStatus()
    {
        if ($this->response->payment_result->response_status == 'A') {
            $this->setPaymentStatus('completed');
        } else {
            $this->setPaymentStatus('failed');
        }
    }


    public function getResponse(): string
    {
        return json_encode($this->getSimpleResponse());
    }


    private function getSimpleResponse()
    {
        return [
            'amount' => $this->data->total,
            'amount_captured' => $this->response->cart_amount,
            'currency' => $this->response->tran_currency,
            'code' => $this->data->code
        ];
    }


    public function getGateway(): string
    {
        return 'clickpay';
    }


    protected function setPaymentStatus($status)
    {
        $this->status = $status;
    }
}
