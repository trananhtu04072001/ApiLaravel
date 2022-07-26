<?php

namespace App\Traits;

  trait ResponseApi {
      protected function successResponse($data , $message = null , $code = 200) {
          return response()->json([
              'status' => 'Thành công',
              'message' => $message,
              'data' => $data,
          ], 200);
      }

      protected function errorResponse($data , $message = null , $code = 404) {
          return response()->json([
              'status' => 'Thất bại',
              'message' => $message,
              'data' => null,
          ], $code);
      }
  }
