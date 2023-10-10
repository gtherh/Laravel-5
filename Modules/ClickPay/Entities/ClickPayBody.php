<?php

namespace Modules\ClickPay\Entities;

use Modules\Gateway\Entities\GatewayBody;

class ClickPayBody extends GatewayBody
{
    public $profile_id;
    public $server_key;
    public $instruction;
    public $sandbox;
    public $status;


    public function __construct($request)
    {
        $this->profile_id = $request->profile_id;
        $this->server_key = $request->server_key;
        $this->instruction = $request->instruction;
        $this->status = $request->status;
        $this->sandbox = $request->sandbox;
    }
}
