<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;


trait TraitResponseMessage {
    public function responseSuccess($message = '', $data = null, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ],$code);
    }

    public function responseError($message = '', $data = null, $code = 400): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
            
        ],$code);
    }
}
