<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAppointmentStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = auth('api')->user();

        if ($user->isPatient()) {
            return [
                'status' => ['required', 'string', Rule::in(['cancelled'])],
            ];
        }

        if ($user->isDoctor()) {
            return [
                'status' => ['required', 'string', Rule::in(['confirmed', 'cancelled', 'completed'])],
            ];
        }

        return [
            'status' => ['required', 'string', Rule::in([])],
        ];
    }
}
