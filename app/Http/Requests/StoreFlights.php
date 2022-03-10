<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlights extends FormRequest
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
            'flight_no' =>'required|string|unique:flights,flight_no',
            'destination'=>'required|string',
            'origin'=>'required|string',
            'date'=>'required|string',
            'flight_status'=>'required|string',
            'no_bags'=>'required|string',
        ];
    }
}
