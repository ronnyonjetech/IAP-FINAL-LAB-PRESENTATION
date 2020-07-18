<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newCar extends FormRequest
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
            'make' => 'required|unique:cars',
            'model' => 'required|unique:cars',
            'production' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'make.required' => 'Please give a make of the car',
            'model.required'  => 'Please give a model of the car',
            'production.required'  => 'Please give a valid date of production of the car',
            'make.unique'  => 'The make of this car already exists in the DB',
            'model.unique' => 'The model of this car already exists in the DB',
            'production.date' => 'The production day must be a valid date',
        ];
    }
}
