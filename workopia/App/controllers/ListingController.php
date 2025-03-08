<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use Framework\Authorization;

class ListingController
{
    protected $db;

    /**
     * Expects no parameters.
     */

    public function __construct() {
        $config = require basePath("config/db.php");
        $this->db = new Database($config);
    }

    /**
     * Index. Main page.
     * @return void
     */

    public function index()
    {
        $listings = $this->db->query('SELECT * FROM listings ORDER BY created_at DESC')->fetchAll();

        loadView('listings/index', [
            'listings' => $listings
        ]); 
    }

    /**
     * Create. Loads the create view. Form for submitting job applications.
     * @return void
     */

    public function create()
    {
        loadView('listings/create');
    }

    /**
     * Listing. Shows a singular listing based on the ID.
     * @param array params
     * @return void
     */

    public function listing($params)
    {
        $id = $params['id'] ?? '';

        $queryParams =
        [
            'id' => $id
        ];
        
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $queryParams)->fetch();

        // Check if listing exists
        if(!$listing)
        {
            ErrorController::notFound("Listing not found");
            return;
        }
        
        loadView('listings/show', ['listing' => $listing]);
    }

    /**
     * Stores data in the database
     * 
     * @return void
     */

    public function store()
    {
        $allowedFields = 
        [
            'title',
            'description',
            'salary',
            'tags',
            'company',
            'address',
            'city',
            'state',
            'phone',
            'email',
            'requirements',
            'benefits'
        ];

        // Creates a new array if both keys are in the arrays.
        // Array flip will reverse and turn the values into the keys and keys into values.
        // Basically, allowedfields is a normal array without keys. What we are doing is turning the values into keys.
        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));

        // Gets the id of the logged in user.
        $newListingData['user_id'] = Session::get('user')['id'];

        // will run the 'sanitize' function we have in the helpers.php file. On every piece of the listing data.    
        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = ['title', 'salary', 'description', 'email', 'city', 'state'];

        $errors = [];

        foreach($requiredFields as $field)
        {
            if(empty($newListingData[$field]) || !Validation::string($newListingData[$field]))
            {
                $errors[$field] = ucfirst($field) . " is required";
            }
        }

        if(!empty($errors))
        {
            // Reload the view w/ errors!
            loadView("listings/create", [
                'errors' => $errors,
                'listing' => $newListingData
            ]);
        }
        else
        {
            // Submit data
            $fields = [];

            foreach($newListingData as $field => $value)
            {
                $fields[] = $field;
            }

            $fields = implode(', ', $fields);

            $values = [];

            foreach($newListingData as $field => $value)
            {
                // Convert empty strings to null
                if($value === '')
                {
                    $newListingData[$field] = null;
                }

                $values[] = ':' . $field;
            }

            $values = implode(', ', $values);

            $query = "INSERT INTO listings ({$fields}) VALUES ({$values})";

            $this->db->query($query, $newListingData);

            Session::setFlashMessage('success_message', "Listing created successfully");
            
            redirect('/listings');
        }
    }

    /**
     * Delete data in DB
     * @param array params
     * @return void
     */

    public function destroy($params)
    {
        $id = $params['id'];

        $queryParams =
        [
            'id' => $id
        ];

        $listing = $this->db->query("SELECT * FROM listings WHERE id = :id", $queryParams)->fetch();

        // If listings doesn't exist.
        if(!$listing)
        {
            ErrorController::notFound("Listing not found");
            return;
        }

        // CHECK IF THE USER TRYING TO DELETE MATCHES W/ THE OWNER ON THE DB.
        if(!Authorization::isOwner($listing->user_id))
        {
            Session::setFlashMessage('error_message', 'You are not authorized to delete this listing');
            return redirect('/listings/' . $listing->id);
        }

        // If it does exist.
        $this->db->query("DELETE FROM listings WHERE id = :id", $queryParams);

        // Set flash message (aka giving the user messages)

        Session::setFlashMessage('success_message', 'Listing deleted successfully!');

        redirect('/listings');
    }

    /**
     * Show the list edit form
     * 
     * @param array params
     * @return void
     */

    public function edit($params)
    {
        $id = $params['id'] ?? '';

        $queryParams =
        [
            'id' => $id
        ];
        
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $queryParams)->fetch();

        // Check if listing exists
        if(!$listing)
        {
            ErrorController::notFound("Listing not found");
            return;
        }
        
        loadView('listings/edit', ['listing' => $listing]);
    }

    /**
     * Update a listing
     * @param array params
     * @return void
     */
    public function update($params)
    {
        $allowedFields = 
        [
            'title',
            'description',
            'salary',
            'tags',
            'company',
            'address',
            'city',
            'state',
            'phone',
            'email',
            'requirements',
            'benefits'
        ];

        $id = $params['id'] ?? '';
        
        $queryParams =
        [
            'id' => $id
        ];
        
        $listing = $this->db->query('SELECT * FROM listings WHERE id = :id', $queryParams)->fetch();
        
        // Check if listing exists
        if(!$listing)
        {
            ErrorController::notFound("Listing not found");
            return;
        }
        
        $updateValues = [];

        $updateValues = array_intersect_key($_POST, array_flip($allowedFields));

        $updateValues = array_map('sanitize', $updateValues);

        $requiredFields = ['title', 'salary', 'description', 'email', 'city', 'state'];

        $errors = [];

        foreach($requiredFields as $field)
        {
            if(empty($updateValues[$field]) || !Validation::string($updateValues[$field]))
            {
                $errors[$field] = ucfirst($field) . " is required";
            }
        }

        if(!empty($errors))
        {
            // Reload the view w/ errors!
            loadView("listings/edit", [
                'errors' => $errors,
                'listing' => $listing
            ]);
            exit;
        }
        else
        {
            // Submit to DB
            $updateFields = [];

            foreach(array_keys($updateValues) as $field)
            {
                $updateFields[] = "{$field} = :{$field}";
            }
            
            $updateFields = implode(', ', $updateFields);

            $updateQuery = "UPDATE listings SET $updateFields WHERE id = :id";

            $updateValues['id'] = $id;

            $this->db->query($updateQuery, $updateValues);

            Session::setFlashMessage('success_message', "Listing updated successfully");

            redirect('/listings/' . $id);
        }
    }
}