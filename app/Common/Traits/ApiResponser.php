<?php

namespace App\Common\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * handling all request response
 */
trait ApiResponser
{

    protected function apiSimpleSuccessResponse(int $code = Response::HTTP_CREATED): JsonResponse
    {
        return response()->json(['success' => true], $code);
    }

    protected function apiSuccessResponse($data, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json($data, $code);
    }

    protected function apiErrorResponse(
        string $message,
        Throwable $exception = null,
        $code = Response::HTTP_INTERNAL_SERVER_ERROR
    ): JsonResponse {
        $response = ['message' => $message];

        if (config('app.debug') && !empty($exception)) {
            $response['debug'] = [
                'message' => $exception->getMessage(),
                'file'    => $exception->getFile(),
                'line'    => $exception->getLine(),
                'trace'   => $exception->getTrace()
            ];
        }

        return response()->json($response, $code);
    }
}
