<?php


namespace AGerault\DBlog\Security\UseCase\Login;


use AGerault\DBlog\Security\Entity\User;

class LoginResponse
{
    private User $loggedUser;

    /**
     * LoginResponse constructor.
     * @param User $loggedUser
     */
    public function __construct(User $loggedUser)
    {
        $this->loggedUser = $loggedUser;
    }

    /**
     * @return User
     */
    public function getLoggedUser(): User
    {
        return $this->loggedUser;
    }
}