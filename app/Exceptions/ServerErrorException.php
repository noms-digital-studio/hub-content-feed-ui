<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ServerErrorException extends HttpException {

    public function __construct($message = NULL) {
        parent::__construct(500, $message);
    }

}
