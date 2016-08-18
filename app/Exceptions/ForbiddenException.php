<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ForbiddenException extends HttpException {

    public function __construct($message = NULL) {
        parent::__construct(403, $message);
    }

}
