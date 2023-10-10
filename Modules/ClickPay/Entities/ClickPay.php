<?php

namespace Modules\ClickPay\Entities;

use Modules\Gateway\Entities\Gateway;
use Modules\ClickPay\Scope\ClickPayScope;

class ClickPay extends Gateway
{

    protected $table = 'gateways';

    protected static function booted()
    {
        static::addGlobalScope(new ClickPayScope);
    }
}
