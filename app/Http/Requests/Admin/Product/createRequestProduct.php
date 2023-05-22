<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class createRequestProduct extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'integer'],
            'title_fa' => ['required'],
            'title_en' => ['required'],
            'desc' => ['required'],
            'image' => ['required'],
            'price' => ['required'],
            'brand' => ['required'],
            'seller' => ['required'],
            'options' => ['required'],
        ];
    }
}
