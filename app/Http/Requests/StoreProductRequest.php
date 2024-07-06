<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|max:255|',
            'img_url' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'mfg' => 'required',
            'life' => 'required',
            'slug' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'discount' => 'required|numeric',
            'qty' => 'required|numeric',
        ];
    }
}
