<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GymnastUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|numeric',
            'name' => 'required',
            'member_id' => 'required',
            'coach' => 'required',
            'club' => 'required',
            'grouping' => 'required',
            'year_of_birth' => 'present',
            'note' => 'present',
        ];
    }
}
