<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
// use App\Rules\CheckPassword;
class UsersUpdateRequest extends FormRequest
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
            "name"=>['required'],
            // "email"=>['email',Rule::unique('users')->where(fn ($query)=>$query->where('id','!=',$this->id))],
        
           
          
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Bắt buộc phải nhập ',
            // 'email' => ' Bạn cần nhập dúng email',
            // 'email.unique'=> 'Email đã tồn tại'
            
            

            
            
        ];
    }
}
