<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
                    'firstname' => 'required|string',
                    'lastname' => 'required|string',
                    'mobile' => 'required|string',
                    'email' => 'required|string',
                    'idnumber' => 'required|string',
                    'banknumber' => 'string',
                    'birthday' => 'required',
                    'city_id' => 'required|int|exists:cities,id',
                    'address' => 'required|string',
                    'interes' => 'string',
                    'work_place' => 'string',
                    'family_status' => 'required|string',
                    'card_id' => 'required|string',
                    'position_id' => 'required|int',
                    'agremeent_start' => 'required',
                    'agremeent_end' => 'required',
                ];
            }
        }
    }
}
