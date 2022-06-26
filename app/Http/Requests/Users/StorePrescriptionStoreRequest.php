<?php

namespace App\Http\Requests\Users;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePrescriptionStoreRequest extends FormRequest
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
            'note' => 'required|string|min:50',
            'address_line_1' => 'required|string',
            'address_line_2' => 'required|string',
            'address_line_3' => 'nullable|string',
            'delevery_date' => 'required|date|date_format:Y-m-d|after_or_equal:'.date('Y-m-d'),
            'delevery_time' => 'required',
            'prescription' => 'array|max:5',
            'prescription.*' => 'required|image'
        ];
    }
}
