<?php
/**
 * Pages Controller Class
 *
 * This class handles the main pages of the application.
 */
class Pages extends Controller {
    /**
     * Constructor method.
     */
    public function __construct(){
        // Constructor logic (if any)
    }
    
    /**
     * Index Method
     *
     * Handles the homepage of the application.
     */
    public function index(){
        // Check if the user is logged in
        if (isLoggedIn()) {
            // Redirect to the posts index page
            redirect('/posts/index');
        }

        // Data for the view
        $data = [
            'title'         => 'Home',
            'description'   => '',
        ];
        
        // Load the view with the specified data
        $this->view('pages/index', $data);
    }

    /**
     * About Method
     *
     * Handles the about us page of the application.
     */
    public function about(){
        // Data for the view
        $data = [
            'title'         => 'About Us',
            'description'   => '',
            'version'       => APP_VERSION,
        ];

        // Load the view with the specified data
        $this->view('pages/about', $data);
    }
}
