<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'name' => 'required | min:2 | max:255 | string',
            'description' => 'required | min:3 | string',
            'unit_price' => 'required | numeric | min:0',
            'promotion_price' => 'numeric | lt:unit_price',
            'id_categories' => 'required | numeric',
            'image1' => 'image | mimes:png,jpg,jpeg | max:8000',
            'image2' => 'image | mimes:png,jpg,jpeg | max:8000',
            'image3' => 'image | mimes:png,jpg,jpeg | max:8000',
            'image4' => 'image | mimes:png,jpg,jpeg | max:8000',
            'highlight' => 'required | boolean',
            'new' => 'required | boolean',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return    array
     */
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Tên sản phẩm không được để trống',
    //         'name.string' => "Tên phải là ký tự",
    //         'name.max' => "Tên tối đa được 255 ký tự",
    //         'phone.required' => 'Số điện thoại không được để trống',
    //         'phone.numeric' => 'Số điện thoại phải là một dãy số',
    //         'phone.unique' => 'Số điện thoại đã tồn tại',
    //         'address.max' => 'Địa chỉ tối đa được 255 ký tự',
    //         'current_password.required' => 'Mật khẩu không được để trống'
    //     ];
    // }
}