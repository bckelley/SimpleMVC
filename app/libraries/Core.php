<?php
/**
 * App Core Class
 *
 * This class creates the URL and loads the core controller.
 * URL FORMAT - /controller/method/params
 */
class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    /**
     * Constructor method.
     */
    public function __construct() {
        // Get the URL
        $url = $this->getUrl();

        // Look in controllers for the first value
        if (!empty($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);
                // Unset 0 Index
                unset($url[0]);
            }
        }

        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate the controller class
        $this->currentController = new $this->currentController;

        // Check for the second part of the URL
        if (isset($url[1])) {
            // Check to see if the method exists in the controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with an array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * Get URL Method
     *
     * Gets the URL and prepares it for processing.
     *
     * @return array An array representing the URL
     */
    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
