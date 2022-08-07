<?php

namespace App\Message;

use App\Entity\User;

class EmailNotification
{
    public function __construct(public User $user)
    {
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getEmail(): string
    {
        return $this->user->email;
    }
}