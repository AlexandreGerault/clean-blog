<?php


namespace App\UserInterface\Presentation;


class LoggedUserViewModel
{
    private string $username;

    /**
     * LoggedUserViewModel constructor.
     * @param string $username
     */
    public function __construct(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
}