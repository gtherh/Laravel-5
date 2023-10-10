<?php

namespace Modules\ClickPay\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Addons\Entities\Addon;
use Modules\ClickPay\Entities\ClickPay;
use Modules\ClickPay\Entities\ClickPayBody;
use Modules\ClickPay\Http\Requests\ClickPayRequest;
use Mpdf\Tag\Dd;

class ClickPayController extends Controller
{


    /**
     * Store a newly created resource in storage.
     * @param ClickPayRequest $request
     *
     * @return redirect
     */
    public function store(ClickPayRequest $request)
    {
        $instamojoBody = new ClickPayBody($request);

        ClickPay::updateOrCreate(
            ['alias' => config('clickpay.alias')],
            [
                'name' => config('clickpay.name'),
                'instruction' => $request->instruction,
                'profile_id' => $request->profile_id,
                'server_key' => $request->server_key,
                'status' => $request->status,
                'sandbox' => $request->sandbox,
                'image' => 'thumbnail.png',
                'data' => json_encode($instamojoBody)
            ]
        );

        return back()->with(['AddonStatus' => 'success', 'AddonMessage' => __('clickpay settings updated.')]);
    }

    public function edit(Request $request)
    {
     
       
        try {
            $module = ClickPay::first()->data;
        } catch (\Exception $e) {
            $module = null;
        }
        $addon = Addon::findOrFail('clickpay');

        return response()->json(
            [
                'html' => view('gateway::partial.form', compact('module', 'addon'))->render(),
                'status' => true
            ],
            200
        );
    }
}
