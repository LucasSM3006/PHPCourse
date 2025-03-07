<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;

class UserController
{
    protected $db;

    public function __construct() {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * Show the login view
     * 
     * @return void
     */

    public function login()
    {
        loadview('users/login');
    }

    /**
     * Show the register page
     * 
     * @return void
     */

    public function create()
    {
        loadview('users/create');
    }

    /**
     * Store user in DB
     * 
     * @return void
     */

    public function store()
    {
        $MIN_PASS_LENGTH = 6;
        $MAX_PASS_LENGTH = 50;

        $MIN_NAME_LENGTH = 2;
        $MAX_NAME_LENGTH = 50;

        $userData =
        [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'password' => $_POST['password'],
            'password_confirmation' => $_POST['password_confirmation']
        ];

        $errors = [];

        // Validation

        if(!Validation::email($userData['email']))
        {
            $errors['email'] = "Please enter a valid e-mail address";
        }

        if(!Validation::string($userData['name'], $MIN_NAME_LENGTH, $MAX_NAME_LENGTH))
        {
            $errors['name'] = "Name must be between {$MIN_NAME_LENGTH} and {$MAX_NAME_LENGTH} characters";
        }

        if(!Validation::string($userData['password'], $MIN_PASS_LENGTH, $MAX_PASS_LENGTH))
        {
            $errors['password'] = "Password must be between {$MIN_PASS_LENGTH} and {$MAX_PASS_LENGTH} characters";
        }

        if(!Validation::match($userData['password'], $userData['password_confirmation']))
        {
            $errors['password_confirmation'] = "Passwords do not match";
        }

        if(!empty($errors))
        {
            // Reload the view w/ errors!
            loadView("users/create", [
                'errors' => $errors,
                'user' => $userData
            ]);
            exit;
        }

        $params = 
        [
            'email' => $userData['email']
        ];
        
        $query = "SELECT * FROM users WHERE email = :email";

        $listing = $this->db->query($query, $params)->fetch();

        if($listing)
        {
            $errors['user_already_exists'] = "Email {$userData['email']} already in use";
            loadView('users/create', ['errors' => $errors]);
            exit;
        }

        // User Creation
        $userQueryParams =
        [
            'name' => $userData['name'],
            'email' => $userData['email'],
            'city' => $userData['city'],
            'state' => $userData['state'],
            'password' => password_hash($userData['password'], PASSWORD_DEFAULT)
        ];
        
        $query = "INSERT INTO users (name, email, city, state, password) VALUES (:name, :email, :city, :state, :password)";

        $this->db->query($query, $userQueryParams);

        // Get new user ID
        $userId = $this->db->conn->lastInsertId();

        Session::set('user', [
            'id' => $userId,
            'name' => $userData['name'],
            'email' => $userData['email'],
            'city' => $userData['city'],
            'state' => $userData['state']
        ]);

        redirect('/');
    }

    /**
     * Logout method to log the user out & destroy the session.
     * 
     * @return void
     */
    public function logout()
    {
        Session::clearAll();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', (time() - 86400), $params['path'], $params['domain']);

        redirect('/');
    }

    /**
     * Authenticate/login the user w/ email and password. Creates a session.
     * 
     * @return void
     */
    public function authenticate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userData =
        [
            'email' => $email
        ];

        $errors = [];

        // Validation

        if(!Validation::email($email))
        {
            $errors['email'] = 'Email is incorrect. Epected format: "user@email.com"';
        }
        
        if(!Validation::string($password))
        {
            $errors['password'] = 'Password is incorrect. Must be at least 6 characters."';
        }

        if(!empty($errors))
        {
            loadView('users/login', [
                'errors' => $errors,
                'user' => $userData
            ]);
            exit;
        }

        $query = "SELECT * FROM users WHERE email = :email";

        $userListing = $this->db->query($query, $userData)->fetch();

        if(!$userListing)
        {
            $errors['email'] = "Incorrect Credentials";
            loadView('users/login', [
                'errors' => $errors,
                'user' => $userData
            ]);
            exit;
        }

        // Check for password match
        if(!password_verify($password, $userListing->password))
        {
            $errors['email'] = "Incorrect Credentials";
            loadView('users/login', [
                'errors' => $errors,
                'user' => $userData
            ]);
        }

        $query = "SELECT * FROM users WHERE email = :email AND password = :password";

        Session::set('user', [
            'id' => $userListing->id,
            'name' => $userListing->name,
            'email' => $userListing->email,
            'city' => $userListing->city,
            'state' => $userListing->state
        ]);

        redirect('/');
    }
}