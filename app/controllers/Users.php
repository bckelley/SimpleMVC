<?php
/**
 * Users Controller Class
 *
 * This class handles user-related functionality such as registration, login, and logout.
 */
class Users extends Controller {
    private $userModel;

    /**
     * Constructor method.
     */
    public function __construct() {
        // Initialize the user model
        $this->userModel = $this->model('User');
    }

    /**
     * Register Method
     *
     * Handles user registration.
     */
    public function register() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Extract form data
            $data = [
                'username'    => trim($_POST['username']),
                'email'       => trim($_POST['email']),
                'password'    => trim($_POST['password']),
                'again'       => trim($_POST['again']),
                'usernameErr' => '',
                'emailErr'    => '',
                'passErr'     => '',
                'againErr'    => '',
            ];

            // Validate form data
            if (empty($data['email'])) {
                $data['emailErr'] = 'Please provide an email.';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailErr'] = 'Email exists.';
                }
            }

            if (empty($data['username'])) {
                $data['usernameErr'] = 'Please provide a valid username.';
            }

            if (empty($data['password'])) {
                $data['passErr'] = 'Please provide a valid password.';
            } elseif (strlen($data['password']) < 6) {
                $data['passErr'] = 'Please provide a password 6 or more characters in length.';
            }

            if (empty($data['again'])) {
                $data['againErr'] = 'Please confirm your password.';
            } else {
                if ($data['password'] != $data['again']) {
                    $data['passErr'] = 'Passwords do not match.';
                }
            }

            // Check for errors
            if (empty($data['usernameErr']) && empty($data['emailErr']) &&
                empty($data['passErr']) && empty($data['againErr'])) {
                
                // Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

                // Register the user
                if ($this->userModel->register($data)) {
                    message('reg_success', 'You are now registered and can login.', 'alert alert-success');
                    redirect('/users/login');
                } else {
                    die('Something went wrong.');
                }
            } else {
                // Load the view with the specified data and errors
                $this->view('users/register', $data);
            }

        } else {
            // Display the registration form
            $data = [
                'username'    => '',
                'email'       => '',
                'password'    => '',
                'again'       => '',
                'usernameErr' => '',
                'emailErr'    => '',
                'passErr'     => '',
                'againErr'    => '',
            ];

            // Load the view with the specified data
            $this->view('users/register', $data);
        }
    }

    /**
     * Login Method
     *
     * Handles user login.
     */
    public function login() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Extract form data
            $data = [
                'email'    => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailErr' => '',
                'passErr'  => '',
            ];

            // Validate form data
            if (empty($data['email'])) {
                $data['emailErr'] = 'Please provide an email.';
            }

            if (empty($data['password'])) {
                $data['passErr'] = 'Please provide a valid password.';
            } elseif (strlen($data['password']) < 6) {
                $data['passErr'] = 'Please provide a password 6 or more characters in length.';
            }

            // Check if the user exists
            if ($this->userModel->findUserByEmail($data['email'])) {
                
            } else {
                $data['emailErr'] = 'No user found.';
            }

            // Check for errors
            if (empty($data['emailErr']) && empty($data['passErr'])) {
                // Attempt to log in the user
                $loggedIn = $this->userModel->login($data['email'], $data['password']);

                if ($loggedIn) {
                    $this->createUserSession($loggedIn);
                } else {
                    $data['passErr'] = 'Password was incorrect.';
                }
            } else {
                // Load the view with the specified data and errors
                $this->view('users/login', $data);
            }

        } else {
            // Display the login form
            $data = [
                // 'username'      => '',
                'email'         => '',
                'password'      => '',
                // 'usernameErr'   => '',
                'emailErr'      => '',
                'passErr'       => '',
            ];

            // Load the view with the specified data
            $this->view('users/login', $data);
        }
    }

    /**
     * createUserSession Method
     *
     * Creates a user session upon successful login.
     *
     * @param object $user User object
     */
    public function createUserSession($user) {
        // Set session variables
        $_SESSION['userId'] = $user->id;
        $_SESSION['username'] = $user->name;
        $_SESSION['userEmail'] = $user->email;

        // Redirect to the posts index page
        redirect('/posts/index');
    }

    /**
     * Logout Method
     *
     * Logs out the user.
     */
    public function logout() {
        // Unset session variables
        unset($_SESSION['userId']);
        unset($_SESSION['username']);
        unset($_SESSION['userEmail']);

        // Redirect to the login page
        redirect('/users/login');
    }
}
