<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GendersRequest extends FormRequest
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
        $name_validation = 'required|unique:genders|min: 3|max:80';

        if($this->method() == "PUT" || $this->method() == "PATCH"){
            $name_validation = 'required|min:3|max:80|unique:genders,name,'.$this->gender;
        }

        return [
            'name' => $name_validation
        ];
    }

    public function messages(){
        return[
        'name.required' => 'Debe indicar el nombre',
        'name.unique' => 'El nombre indicado ya fue registrado',
        'name.min' => 'El genero debe tener por lo menos 3 caracteres',
        'name.max' => 'El genero debe tener menos de 80'
        ];
    }

}
