<?php

namespace touiteur\app\exceptions;

use Exception;

class UnsufficientRightsException extends Exception
{

    /**
     * @param string $string
     */
    public function __construct(string $string)
    {
        throw new \Exception($string);
    }
}