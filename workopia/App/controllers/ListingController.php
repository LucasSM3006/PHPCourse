<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

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
        $listings = $this->db->query('SELECT * FROM listings')->fetchAll();

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

        // Will eventually use $_SESSION[];
        $newListingData['user_id'] = 1;

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
            
            redirect('/listings');
        }
    }

    

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

        // If it does exist.
        $this->db->query("DELETE FROM listings WHERE id = :id", $queryParams);

        redirect('/listings');
    }
}