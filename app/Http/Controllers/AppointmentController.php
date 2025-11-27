<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class AppointmentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/appointments/available-slots",
     *     tags={"Appointments"},
     *     summary="Get available appointment slots",
     *     @OA\Parameter(
     *         name="doctor_id",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string", format="date")
     *     ),
     *     @OA\Parameter(
     *         name="specialization",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Available slots retrieved successfully",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/SuccessResponse"),
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         @OA\Items(ref="#/components/schemas/AvailableSlot")
     *                     )
     *                 )
     *             }
     *         )
     *     )
     * )
     */
    public function availableSlots(Request $request)
    {
    }

    /**
     * @OA\Put(
     *     path="/api/appointments/{appointment}/status",
     *     tags={"Appointments"},
     *     summary="Update appointment status",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="appointment",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UpdateAppointmentStatus")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Appointment status updated successfully",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/SuccessResponse"),
     *                 @OA\Schema(
     *                     @OA\Property(property="data", ref="#/components/schemas/Appointment")
     *                 )
     *             }
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=404, description="Appointment not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function updateStatus(Request $request, $appointment)
    {
    }
}
