<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutRequest extends FormRequest
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
            'name_ar' => 'required|max:20',
            'name_en' => 'required|max:20',
            'slug_ar' => 'required|max:20',
            'slug_en' => 'required|max:20',
            'description_ar' => 'required',
            'description_en' => 'required',
            'orginal_price' => 'required',
            'tax' => 'required',
            'sku' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,jpg,png|max:700',
            'main_categorys_id' => 'required|exists:main_categorys,id',
            'sub_categories_id' => 'required|exists:sub_categories,id',
            'sub_sub_category_id' => 'required|exists:sub_sub_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'sub_id.*' => 'required|exists:subscriptions,id',
            'all_imgs.*' => 'required|image|mimes:jpeg,jpg,png|max:700',
            'price.*' => 'required',
        ];
    }
}
