<?php

namespace App\Controllers;

class ErrorController
{
    /**
     * 404 not found
     *
     * @return void
     */
    public static function notFound($message = "Resource not found")
    {
        http_response_code(404);

        loadView('error', [
            'status' => '404',
            'message' => $message
        ]);
    }

        /**
     * 403 unauthorized
     *
     * @return void
     */
    public static function unauthorized($message = "Not authorized")
    {
        http_response_code(403);

        loadView('error', [
            'status' => '403',
            'message' => $message
        ]);
    }
}