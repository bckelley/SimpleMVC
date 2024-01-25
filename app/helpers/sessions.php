<?php
/**
 * Start Session
 *
 * Start the PHP session.
 */
session_start();

/**
 * Message Function
 *
 * Set or display a flash message.
 *
 * @param string $name   Name of the message session variable
 * @param string $msg    Message content
 * @param string $class  CSS class for styling the message (default: 'alert alert-primary')
 */
function message($name='', $msg='', $class='alert alert-primary') {
    if (!empty($name)) {
        if (!empty($msg) && empty($_SESSION[$name])) {
            // Set the message and its class in the session
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }

            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $msg;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($msg) && !empty($_SESSION[$name])) {
            // Display the message and its class
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="'. $class .'" id="route-msg">' . $_SESSION[$name] . '</div>';

            // Clear the session variables
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

/**
 * Is Logged In Function
 *
 * Check if a user is logged in.
 *
 * @return bool Returns true if the user is logged in, false otherwise.
 */
function isLoggedIn() {
    if (isset($_SESSION['userId'])) {
        return true;
    } else {
        return false;
    }
}
