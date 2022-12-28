<?php

namespace App\Http\Middleware;

class Response
{
    public static function json($data, $statusCode = 200, $statusMessage = true)
    {
        $response = $statusMessage ? ['data' => $data, 'statusCode' => $statusCode, 'statusMessage' => $statusMessage] : $response = ['data' => $data, 'statusCode' => $statusCode];
        $response = json_encode($response);
        return $response;
    }

    public static function obj($data, $statusCode = 200, $statusMessage = true)
    {
        $response = $statusMessage ? ['data' => $data, 'statusCode' => $statusCode, 'statusMessage' => $statusMessage] : $response = ['data' => $data, 'statusCode' => $statusCode];
        $response = json_decode(json_encode($response, false));
        return $response;
    }
}
