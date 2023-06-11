<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "title"=>'regex:/(?=.*^[A-Z])(?=.*[a-z])(?=.*[0-9]).{6}/',
          
        
            "description"=>'required|min:6',
          
          
        ];
    }
    public function messages()
    {
        return [
            'title.regex'=>'Bạn cần nhập 3 chữ 3 số chữ cái đầu viết hoa',
            'required' => 'Bắt buộc phải nhập ',
            'min' => 'tối thiểu 6 kí tự',
            
            
        ];
    }
    
}
