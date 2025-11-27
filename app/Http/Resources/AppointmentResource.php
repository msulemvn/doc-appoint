<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'appointment_date' => $this->appointment_date,
            'status' => $this->status->label(),
            'notes' => $this->notes,
            'updated_at' => $this->when(
                $this->wasRecentlyCreated === false && $this->wasChanged('status'),
                $this->updated_at
            ),
            'patient' => $this->whenLoaded('patient', function () {
                return [
                    'id' => $this->patient->id,
                    'name' => $this->patient->name,
                    'email' => $this->patient->email,
                    'phone' => $this->patient->phone,
                    'date_of_birth' => $this->patient->date_of_birth?->format('Y-m-d'),
                ];
            }),
            'doctor' => $this->whenLoaded('doctor', function () {
                return [
                    'id' => $this->doctor->id,
                    'name' => $this->doctor->name,
                    'specialization' => $this->doctor->specialization,
                    'email' => $this->doctor->email,
                    'phone' => $this->doctor->phone,
                ];
            }),
        ];
    }
}
