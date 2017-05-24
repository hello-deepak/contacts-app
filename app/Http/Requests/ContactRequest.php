<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ContactRequest extends FormRequest
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
        $user = Auth::user();
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' =>'required|unique:contacts,phone,'.$user->id,
            'address' => 'required',
            'company'=>'required',
            'birth_date'=>'required'
        ];
    }
}
