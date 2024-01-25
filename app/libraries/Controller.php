<?php
/**
 * Base Controller Class
 *
 * This class serves as the base controller, responsible for loading models and views.
 */
class Controller {
    /**
     * Load Model Method
     *
     * Loads and instantiates the specified model.
     *
     * @param string $model The name of the model to be loaded
     * @return object An instance of the specified model
     */
    public function model($model) {
        // Require the model file
        require_once '../app/models/' . $model . '.php';

        // Instantiate the model
        return new $model();
    }

    /**
     * Load View Method
     *
     * Loads the specified view file and passes data to it.
     *
     * @param string $view  The name of the view file to be loaded
     * @param array  $data  Data to be passed to the view (default: [])
     * @param array  $class Additional classes to be applied to the view (default: [])
     */
    public function view($view, $data = [], $class = []) {
        // Check if the view file exists
        if (file_exists('../app/views/' . $view . '.php')) {
            // Require the view file
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}
