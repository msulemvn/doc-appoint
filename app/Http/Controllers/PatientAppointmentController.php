<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class PatientAppointmentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/patients/{patient}/appointments",
     *     tags={"Patient Appointments"},
     *     summary="Get all appointments for a patient",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="patient",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string", enum={"pending", "confirmed", "cancelled", "completed"})
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Appointments retrieved successfully",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/SuccessResponse"),
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         @OA\Items(ref="#/components/schemas/Appointment")
     *                     )
     *                 )
     *             }
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=404, description="Patient not found")
     * )
     */
    public function index($patient, Request $request)
    {
    }

    /**
     * @OA\Get(
     *     path="/api/patients/{patient}/appointments/{appointment}",
     *     tags={"Patient Appointments"},
     *     summary="Get specific appointment for a patient",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="patient",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="appointment",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Appointment retrieved successfully",
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
     *     @OA\Response(response=404, description="Appointment not found")
     * )
     */
    public function show($patient, $appointment)
    {
    }

    /**
     * @OA\Post(
     *     path="/api/patients/{patient}/appointments",
     *     tags={"Patient Appointments"},
     *     summary="Create new appointment for a patient",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="patient",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AppointmentRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Appointment created successfully",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(
     *                     @OA\Property(property="message", type="string", example="Appointment created successfully"),
     *                     @OA\Property(property="statusCode", type="integer", example=201),
     *                     @OA\Property(property="status", type="string", example="Created")
     *                 ),
     *                 @OA\Schema(
     *                     @OA\Property(property="data", ref="#/components/schemas/Appointment")
     *                 )
     *             }
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=404, description="Patient not found"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function store($patient, Request $request)
    {
    }

    /**
     * @OA\Delete(
     *     path="/api/patients/{patient}/appointments/{appointment}",
     *     tags={"Patient Appointments"},
     *     summary="Delete appointment for a patient",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="patient",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="appointment",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Appointment deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Appointment deleted successfully"),
     *             @OA\Property(property="statusCode", type="integer", example=200),
     *             @OA\Property(property="status", type="string", example="OK")
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(response=404, description="Appointment not found")
     * )
     */
    public function destroy($patient, $appointment)
    {
    }
}
