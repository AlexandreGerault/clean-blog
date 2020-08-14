<?php


namespace AGerault\DBlog\Security\UseCase\Login;


use AGerault\DBlog\Security\Exception\InvalidCredentialsException;
use AGerault\DBlog\Security\Gateway\UserGateway;

class Login
{
    private UserGateway $userGateway;

    /**
     * Login constructor.
     * @param UserGateway $userGateway
     */
    public function __construct(UserGateway $userGateway)
    {
        $this->userGateway = $userGateway;
    }


    /**
     * @param LoginRequest $request
     * @param LoginPresenterInterface $presenter
     * @throws InvalidCredentialsException
     */
    public function execute(LoginRequest $request, LoginPresenterInterface $presenter)
    {
        $user = $this->userGateway->get($request->getUsername());

        if ($this->userGateway->check($user, $request->getPassword()))
        {
            $presenter->present(new LoginResponse($user));
        }
        else
        {
            throw new InvalidCredentialsException("Invalid credentials provided to log in!");
        }
    }
}