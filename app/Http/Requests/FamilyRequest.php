<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyRequest extends FormRequest
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
                    'user_id' => 'required|int:clients,user_id,'.$this->id,
                    'wife' => 'required|text:clienthasfamily,wife,',
                    'childrens' => 'required|text:clienthasfamily,childrens,',
                ];
            }
        }
    }
}
