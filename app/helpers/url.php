<?php
/**
 * Redirect Function
 *
 * Redirect the user to a specified page.
 *
 * @param string $page The page to redirect to
 */
function redirect($page) {
    // Use the header function to perform the redirection
    header('Location: ' . URL_ROOT . $page);
}
