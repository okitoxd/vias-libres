<?php

namespace ViasLibres\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagesFormRequest extends FormRequest
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
            'folder' => 'required|string|max:50',
            'name' =>'mimes:jpeg,jpg,bmp,png|max:30', 
            'incident_id' =>'required'
        ];
    }
}
