<?php


namespace AGerault\DBlog\Security\UseCase\Login;


interface LoginPresenterInterface
{
    /**
     * @param LoginResponse $response
     * @return mixed
     */
    public function present(LoginResponse $response);
}