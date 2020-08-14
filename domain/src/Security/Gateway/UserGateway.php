<?php


namespace AGerault\DBlog\Security\Gateway;


use AGerault\DBlog\Security\Entity\User;

interface UserGateway
{
    /**
     * @param User $user
     * @param string $password
     * @return bool
     */
    public function check(User $user, string $password): bool;

    /**
     * @param string $login
     * @return User
     */
    public function get(string $login): User;
}