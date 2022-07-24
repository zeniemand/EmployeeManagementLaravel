<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'last_name' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'department_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
            'country_id' => ['required', 'integer'],
            'zip_code' => ['required', 'string'],
            'birthdate' => ['nullable', 'date'],
            'date_hired' => ['nullable', 'date']
        ];
    }
}
