<?php
/**
 * Post Class
 *
 * This class is responsible for handling post-related database operations.
 */
class Post {
    private $db; // Database instance

    /**
     * Constructor method.
     */
    public function __construct() {
        $this->db = new Database;
    }

    /**
     * GetPosts Method
     *
     * Fetches all posts from the database.
     *
     * @return array An array of post objects
     */
    public function getPosts() {
        $this->db->query('SELECT *, posts.id as postId,
                          users.id as userId,
                          posts.created_at as postCreated,
                          users.created_at as userCreated
                          FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC');

        $res = $this->db->resultSet();

        return $res;
    }

    /**
     * GetPost Method
     *
     * Fetches a single post by its ID.
     *
     * @param int $id The ID of the post
     * @return object An object representing a single post
     */
    public function getPost($id) {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    /**
     * AddPost Method
     *
     * Inserts a new post into the database.
     *
     * @param array $data An associative array containing post data
     * @return bool Returns true on success, false on failure
     */
    public function addPost($data) {
        $this->db->query('INSERT INTO posts (user_id, title, summary, body) VALUES(:userId, :title, :summary, :body)');

        $this->db->bind(':userId',  $data['userId']);
        $this->db->bind(':title',   $data['title']);
        $this->db->bind(':summary', $data['summary']);
        $this->db->bind(':body',    $data['body']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * UpdatePost Method
     *
     * Updates an existing post in the database.
     *
     * @param array $data An associative array containing post data
     * @return bool Returns true on success, false on failure
     */
    public function updatePost($data) {
        $this->db->query('UPDATE posts SET title=:title, summary=:summary, body=:body WHERE id=:id');

        $this->db->bind(':id',      $data['id']);
        $this->db->bind(':title',   $data['title']);
        $this->db->bind(':summary', $data['summary']);
        $this->db->bind(':body',    $data['body']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * DeletePost Method
     *
     * Deletes a post from the database by its ID.
     *
     * @param int $id The ID of the post
     * @return bool Returns true on success, false on failure
     */
    public function deletePost($id) {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}