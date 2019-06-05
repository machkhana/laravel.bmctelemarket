<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'DELETE': {
                return [];
            }
            default: {
                return [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|same:confirm-password',
                    'city_id' => 'required|int|exists:cities,id',
                    'roles' => 'required'
                ];
            }
        }
    }
}
