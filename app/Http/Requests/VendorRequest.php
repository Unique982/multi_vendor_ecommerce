<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           
            'vendor_name'=>'required|string|min:3',
            'vendor_email'=>'required|email|unique:users,email',
            'vendor_password'=>'required|min:8',
            'shop_name'=>'required|string|min:3|max:255',
            'shop_description'=>'required|min:3',
            'logo' =>'nullable|image|mimes:jpeg,png,jpg',
            'banner'=>'nullable|image|mimes:png,jpg,jpeg',
            'phone'=>'required|unique:vendors,phone|numeric|digits:10',
            'address'=>'required|string',
            'status'=>'required|in:pending,approved,suspended',
        ];
    }
}
