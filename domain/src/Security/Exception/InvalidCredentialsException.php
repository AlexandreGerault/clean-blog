<?php


namespace AGerault\DBlog\Security\Exception;

use Exception;

class InvalidCredentialsException extends Exception
{
    /**
     * UserNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct("Les identifiants ne correspondent à aucun enregistrement !");
    }
}