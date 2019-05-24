<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required|min:5',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'address' => 'required',
            'role' => 'required|integer|max:3',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min ki tu',
            'max' => ':attribute không được lớn hơn :max',
            'integer' => ':attribute chỉ được nhập số',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'role' => 'Role'
        ];
    }
}
