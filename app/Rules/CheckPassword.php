<?php

namespace App\Rules;
use DB;
use Illuminate\Contracts\Validation\Rule;

class CheckPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       
       $user =  DB::table("users")->where('id',1);
      
       $checkPass = Hash::check($value,$user->password);
      
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'nhập lại mật khẩu không đúng';
    }
}
