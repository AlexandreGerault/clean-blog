<?php


namespace AGerault\DBlog\Security\Exception;

use Exception;

class UserNotFoundException extends Exception
{
    /**
     * UserNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct("Aucun utilisateur trouvé !");
    }
}