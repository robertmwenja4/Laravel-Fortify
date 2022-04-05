<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlightStatus extends FormRequest
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
            'bag_tagID'=>'required|string|unique:flight_statuses,bag_tagID',
            'Terminal_at'=>'required|string',
            'pid'=>'required|string|unique:flight_statuses,pid',
            'flight_no'=>'required|string'
        ];
    }
}
