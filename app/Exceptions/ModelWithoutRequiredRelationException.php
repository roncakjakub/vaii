<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class ModelWithoutRequiredRelationException extends Exception implements ICustomException
{
    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = "Model dont have required relation ".$message." !";
    }

}
