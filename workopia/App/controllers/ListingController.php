<?php

namespace App\Controllers;

use Framework\Database;

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
            'requirements',
            'benefits',
            'company',
            'address',
            'city',
            'state',
            'phone',
            'email',
            'requirements',
            'benefits'
        ];

        $newListingData = array_intersect_key($_POST, $allowedFields);

        inspectAndDie($_POST);
    }
}