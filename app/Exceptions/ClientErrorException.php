<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ClientErrorException extends HttpException {

    public function __construct($message = NULL) {
        parent::__construct(400, $message);
    }

}
