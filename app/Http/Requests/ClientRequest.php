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
        return false;
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
                    'firstname' => 'required|string:clients,fisrtname,',
                    'lastname' => 'required|string:categories,lastname,',
                    'mobile' => 'required|string:categories,mobile,',
                    'email' => 'required|string:clients,email,',
                    'banknumber' => 'clients,banknumber',
                    'birthday' => 'required|date|clients,birthday',
                    'city_id' => 'required|int|clients,city_id',
                    'address' => 'required|text|clients,address',
                    'interes' => 'text|clients,interes',
                    'work_place' => 'text|clients,work_place',
                    'family_status' => 'required|int|clients,family_status',
                    'card_id' => 'required|int|clients,card_id',
                    'position_id' => 'required|int|clients,position_id',
                    'agremeent_start' => 'required|date|clients,agremeent_start',
                    'agremeent_end' => 'required|date|clients,agremeent_end',
                ];
            }
        }
    }
}
