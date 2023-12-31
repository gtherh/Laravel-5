<?php

namespace Modules\ClickPay\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClickPayRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return config('clickpay.validation')['rules'];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Attributes custom names
     *
     * @return array
     */
    public function attributes()
    {
        return config('clickpay.validation')['attributes'];
    }
}
