<?php
/**
 * Posts Controller Class
 *
 * This class handles the functionality related to posts in the application.
 */
class Posts extends Controller {
    private $postModel;
    private $userModel;

    /**
     * Constructor method.
     */
    public function __construct() {
        // Check if the user is logged in
        if (!isLoggedIn()) {
            // Redirect to the login page if not logged in
            redirect('/users/login');
        }

        // Initialize models
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    /**
     * Index Method
     *
     * Displays a list of posts.
     */
    public function index() {
        // Get all posts
        $posts = $this->postModel->getPosts();

        // Data for the view
        $data = [
            'posts' => $posts,
        ];

        // Load the view with the specified data
        $this->view('/posts/index', $data);
    }

    /**
     * Show Method
     *
     * Displays a single post.
     *
     * @param int $id Post ID
     */
    public function show($id) {
        // Get post and user information
        $post = $this->postModel->getPost($id);
        $user = $this->userModel->getUserById($post->user_id);

        // Data for the view
        $data = [
            'post' => $post,
            'user' => $user,
        ];

        // Load the view with the specified data
        $this->view('/posts/show', $data);
    }

    /**
     * Add Method
     *
     * Adds a new post.
     */
    public function add() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Extract form data
            $data = [
                'title'      => trim($_POST['title']),
                'summary'    => trim($_POST['summary']),
                'body'       => trim($_POST['body']),
                'userId'     => $_SESSION['userId'],
                'titleErr'   => '',
                'summaryErr' => '',
                'bodyErr'    => '',
            ];

            // Validate form data
            if (empty($data['title'])) {
                $data['titleErr'] = 'Please enter a title.';
            }

            if (empty($data['summary'])) {
                $data['summaryErr'] = 'Please enter a summary.';
            }

            if (empty($data['body'])) {
                $data['bodyErr'] = 'Please enter a body.';
            }

            // Check for errors
            if (empty($data['titleErr']) && empty($data['summaryErr']) && empty($data['bodyErr'])) {
                // Add post to the database
                if ($this->postModel->addPost($data)) {
                    message('post_message', 'Your post has been added.', 'alert alert-success');
                    redirect('/posts/index');
                } else {
                    die('Something went wrong.');
                }
            } else {
                // Load the view with the specified data and errors
                $this->view('/posts/add', $data);
            }
        } else {
            // Display the form
            $data = [
                'title'   => '',
                'summary' => '',
                'body'    => '',
            ];

            // Load the view with the specified data
            $this->view('/posts/add', $data);
        }
    }

    /**
     * Edit Method
     *
     * Edits an existing post.
     *
     * @param int $id Post ID
     */
    public function edit($id) {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize input data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            // Extract form data
            $data = [
                'id'         => $id,
                'title'      => trim($_POST['title']),
                'summary'    => trim($_POST['summary']),
                'body'       => trim($_POST['body']),
                'userId'     => $_SESSION['userId'],
                'titleErr'   => '',
                'summaryErr' => '',
                'bodyErr'    => '',
            ];

            // Validate form data
            if (empty($data['title'])) {
                $data['titleErr'] = 'Please enter a title.';
            }

            if (empty($data['summary'])) {
                $data['summaryErr'] = 'Please enter a summary.';
            }

            if (empty($data['body'])) {
                $data['bodyErr'] = 'Please enter a body.';
            }

            // Check for errors
            if (empty($data['titleErr']) && empty($data['summaryErr']) && empty($data['bodyErr'])) {
                // Update post in the database
                if ($this->postModel->updatePost($data)) {
                    message('post_message', 'Your post has been updated.', 'alert alert-success');
                    redirect('/posts/index');
                } else {
                    die('Something went wrong.');
                }
            } else {
                // Load the view with the specified data and errors
                $this->view('/posts/edit', $data);
            }
        } else {
            // Display the form with existing post data
            $post = $this->postModel->getPost($id);

            // Check if the user is authorized to edit the post
            if ($post->user_id != $_SESSION['userId']) {
                redirect('/posts/index');
            }

            // Data for the view
            $data = [
                'id'      => $id,
                'title'   => $post->title,
                'summary' => $post->summary,
                'body'    => $post->body,
            ];

            // Load the view with the specified data
            $this->view('/posts/edit', $data);
        }
    }

    /**
     * Delete Method
     *
     * Deletes a post.
     *
     * @param int $id Post ID
     */
    public function delete($id) {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Delete post from the database
            if ($this->postModel->deletePost($id)) {
                message('post_message', 'Your post has been removed.');
                redirect('/posts/index');
            } else {
                die('Something went wrong');
            }
        } else {
            // Redirect to the posts index page if form is not submitted
            redirect('/posts/index');
        }
    }
}
