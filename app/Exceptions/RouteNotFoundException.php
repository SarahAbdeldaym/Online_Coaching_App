<?php

namespace App\Exceptions;

class RouteNotFoundException extends APIException {

    public function __construct(private string $route) {

        parent::__construct("Route not found", 404);
    }

    public function toArray(): array {

        return [
            'message' => $this->getMessage(),
            'route' => $this->route
        ];
    }
}
