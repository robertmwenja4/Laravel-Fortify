<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePassangerData extends FormRequest
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
            'pid' => 'required|string|unique:passangers,pid',
            'name' => 'required|string',
            'fligh_no' =>'required|string',
            'email' =>'required|string',
            'phone_number'=>'required|digits:10',
            'flight_class'=>'required|string',
            'flight_origin'=>'required|string',
            'destination'=>'required|string',
            'status'=>'required|string',
        ];
    }
}
