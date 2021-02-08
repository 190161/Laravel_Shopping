<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ItemRequest extends FormRequest
{
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'カラム名' => 'validate の条件'
            'name' => 'required|string',
            'code' => 'required|string',
            'price' => 'required|min:0|integer',
            'amount' => 'min:0|integer',
        ];
    }

    public function messages()
    {
        return [
            //'カラム名.条件' => 'エラーメッセージ',
            'code.required' => Lang::get('messages.code_required'),
            'price.required' => Lang::get('messages.price_required'),
            'price.integer' => Lang::get('messages.price_invalid'),
            'price.min' => Lang::get('messages.price_invalid'),
            'amount.integer' => Lang::get('messages.amount_invalid'),
            'amount.min' => Lang::get('messages.amount_invalid'),
        ];
    }
}
