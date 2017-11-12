<?php

namespace ViasLibres\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidenteFormRequest extends FormRequest
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
            'description' => 'required|string|max:100',
            'incident_status' => 'required',
            'user_id' => 'required',
            'calificationA'=>'max:11',
            'calificationB' =>'max:11', 
            'calificationC' =>'max:11', 
            'long_location'=>'required',
            'lat_location'=>'required',
            'imagen' =>'mimes:jpeg,jpg,bmp,png',
        ];
    }
}
