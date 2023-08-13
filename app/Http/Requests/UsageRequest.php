<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UsageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'vechile_id' => 'required',
            'driver_id' => 'required',
            'usage_date' => 'required',
            'end_of_usage_date' => 'required',
            'fuel_consumption' => 'required|numeric',
            'headOffice_id' => 'required',
            'headMine_id' => 'required'
        ];
    }
}
