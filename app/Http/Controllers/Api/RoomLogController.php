<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RoomLogRequest;
use App\Http\Resources\RoomLogResource;
use App\Models\RoomLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoomLogController extends Controller
{
    public function store(RoomLogRequest $request)
    {
        try {
            $roomLog = RoomLog::create($request->all());
            $result = new RoomLogResource($roomLog);

            return response()->json($result, 201);
        } catch (\Exception $e) {
            return response()->json([
                'meta' => [
                    "success" => false,
                    'error' => is_array($e->getMessage()) ? $e->getMessage() : $e->getMessage()
                ]
            ], 400);
        }
    }
}
