<?php
/**
 * User Class
 *
 * This class is responsible for handling user-related database operations.
 */
class User {
    private $db; // Database instance

    /**
     * Constructor method.
     */
    public function __construct() {
        $this->db = new Database;
    }

    /**
     * GetUserById Method
     *
     * Fetches a user by their ID.
     *
     * @param int $id The ID of the user
     * @return object An object representing the user
     */
    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    /**
     * FindUserByEmail Method
     *
     * Checks if a user with the given email exists.
     *
     * @param string $email The email of the user
     * @return bool Returns true if the user exists, false otherwise
     */
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Register Method
     *
     * Registers a new user in the database.
     *
     * @param array $data An associative array containing user data
     * @return bool Returns true on success, false on failure
     */
    public function register($data) {
        $this->db->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');

        $this->db->bind(':name', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Login Method
     *
     * Performs user login based on email and password.
     *
     * @param string $email The email of the user
     * @param string $password The password of the user
     * @return mixed Returns the user object on success, false on failure
     */
    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashedPassword = $row->password;
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }
}