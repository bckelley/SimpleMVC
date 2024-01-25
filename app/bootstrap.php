<?PHP

/*
 * Explanation:
 * - The code loads the configuration file, which typically contains constants and settings.
 * - It includes helper files for URL and session-related functions.
 * - The spl_autoload_register function is used to automatically load class files when needed.
 * - The anonymous function within spl_autoload_register dynamically requires the class file based on its name.
 * - This allows for a more organized and modular structure in loading core libraries.
 */

// Load Config
require_once 'config/config.php';

// Include URL Helper Functions
require_once 'helpers/url.php';

// Include Session Helper Functions
require_once 'helpers/sessions.php';

// Autoload Core Libraries using spl_autoload_register
spl_autoload_register(function ($className) {
    // Require the specified class file from the libraries directory
    require_once 'libraries/' . $className . '.php';
});