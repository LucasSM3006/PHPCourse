<?php

class User
{
    public string $name;
    public string $email;
    private string $password;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function login()
    {
        echo "User logged in.";
    }
}

$user = new User(null, null);

$user->name = "john";
$user->email = "john@email.com";

var_dump($user);