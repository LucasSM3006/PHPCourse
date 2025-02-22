<?php

class User
{
  public $name;
  public $email;
  protected $status = 'active';

  public function __construct($name, $email)
  {
    $this->name = $name;
    $this->email = $email;
  }

  public function login()
  {
    echo $this->name . ' logged in <br>';
  }
}

class Admin extends User 
{
  public $level;

  public function __construct($name, $email, $level)
  {
    $this->level = $level;
    parent::__construct($name, $email); // Calls parent's constructor
  }

  public function login()
  {
    echo "Admin $this->name logged in <br>";
  }

  public function getStatus()
  {
    return $this->status;
  }
}

$adm = new Admin("Mr. Powerful", "admwebsite@email.com", 5);

echo '<br>';
echo 'Name: ' . $adm->name . '<br>';
echo 'Email: ' . $adm->email . '<br>';
echo 'Level of permission ( 1 -> lowest, 5 -> highest)' . $adm->level . '<br>';

$adm->login();

echo "Status: " . $adm->getStatus() . "<br>";

var_dump($adm);