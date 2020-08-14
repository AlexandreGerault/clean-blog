<?php


namespace App\UserInterface\Presentation;


use AGerault\DBlog\Security\UseCase\Login\LoginPresenterInterface;
use AGerault\DBlog\Security\UseCase\Login\LoginResponse;

class LoginJsonPresenter implements LoginPresenterInterface
{
    private LoggedUserViewModel $loggedUser;

    /**
     * @return LoggedUserViewModel
     */
    public function getLoggedUser(): LoggedUserViewModel
    {
        return $this->loggedUser;
    }

    /**
     * @param LoginResponse $response
     * @return mixed|void
     */
    public function present(LoginResponse $response)
    {
        $this->loggedUser = new LoggedUserViewModel($response->getLoggedUser()->getUsername());
    }
}