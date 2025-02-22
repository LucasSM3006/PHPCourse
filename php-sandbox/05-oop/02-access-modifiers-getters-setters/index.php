<?php

class User
{
  // Properties
  public $name;
  public $email;
  private $status = 'inactive';

  public function __construct($name, $email)
  {
    $this->name = $name;
    $this->email = $email;
  }

  // Methods
  public function login()
  {
    $this->status = 'active';
    echo $this->name . ' logged in <br>';
  }

  public function logOut()
  {
    $this->status = 'inactive';
    echo $this->name . ' has logged out <br>';
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }
}

// Instantiate a new object
$user1 = new User('John Doe', 'john@gmail.com');

$user1->login();

$user2 = new User('Jane Doe', 'jane@gmail.com');

$user2->login();

// echo $user1->status; // error. private stuff. let's use getters & setters.

$user2->setStatus("active");

echo $user2->getStatus() . "<br>";

$user2->logOut();

echo $user2->getStatus() . "<br>";

// var_dump($user2);
