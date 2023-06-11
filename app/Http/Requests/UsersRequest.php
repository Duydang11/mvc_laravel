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
            "name"=>'required',
            
            "email"=>'email|unique:users',
            "password"=> 'required',
            "repassword"=>'required|same:password'
          
          
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Bắt buộc phải nhập ',
            'email' => ' Bạn cần nhập dúng email',
            'repassword.same'=> 'Phải trùng mật khẩu cũ',
            'email.unique'=>'email đã tồn tại'
            
        ];
    }
}
