<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class DoctorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/doctors/available",
     *     tags={"Doctors"},
     *     summary="Get available doctors",
     *     @OA\Parameter(
     *         name="specialization",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string", format="date")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Available doctors retrieved successfully",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/SuccessResponse"),
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         @OA\Items(ref="#/components/schemas/Doctor")
     *                     )
     *                 )
     *             }
     *         )
     *     )
     * )
     */
    public function available(Request $request)
    {
    }

    /**
     * @OA\Get(
     *     path="/api/doctors/{doctor}",
     *     tags={"Doctors"},
     *     summary="Get specific doctor details",
     *     @OA\Parameter(
     *         name="doctor",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Doctor retrieved successfully",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/SuccessResponse"),
     *                 @OA\Schema(
     *                     @OA\Property(property="data", ref="#/components/schemas/Doctor")
     *                 )
     *             }
     *         )
     *     ),
     *     @OA\Response(response=404, description="Doctor not found")
     * )
     */
    public function show($doctor)
    {
    }

    /**
     * @OA\Get(
     *     path="/api/doctors/{doctor}/appointments",
     *     tags={"Doctors"},
     *     summary="Get all appointments for a doctor",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="doctor",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string", format="date")
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
     *     @OA\Response(response=404, description="Doctor not found")
     * )
     */
    public function appointments($doctor, Request $request)
    {
    }
}
