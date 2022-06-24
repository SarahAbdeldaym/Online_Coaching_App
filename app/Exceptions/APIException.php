<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

abstract class APIException extends Exception {

    public function __construct(string $message, private int $statusCode) {

        parent::__construct($message);
    }

    public function toResponse(): JsonResponse {

        return response()->json([
            'status' => false,
            'error' => $this->toArray()
        ], $this->statusCode);
    }

    public function toArray(): array {

        return [ 'message' => $this->getMessage() ];
    }
}
