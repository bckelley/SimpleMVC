# SimpleMVC

## Description

Welcome to SimpleMVC, a web application built with PHP that provides
a versatile platform for creating, managing, and sharing posts.
This project follows the MVC (Model-View-Controller) architecture,
ensuring a clean and organized codebase.

## Table of Contents

- [RouteEase MVC](#routeease-mvc)
  - [Description](#description)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
  - [Usage](#usage)
  - [File Structure](#file-structure)
  - [Code Documentation](#code-documentation)
  - [Contributing](#contributing)
  - [TODO: Lists](#todo-lists)
  - [License](#license)

## Installation

1. Clone the repository: `git clone https://github.com/bckelley/SimpleMVC.git`
2. Navigate to the project directory: `cd SimpleMVC`
3. Set up the configuration file: `config/config.php` with required values.
4. Ensure the following PHP and MySQL and Apache are installed.
   a. PHP version 8.1
   b. MySQL version 8.0
   c. Apache version 2.4
5. Visit the project URL in your browser.

## Usage

1. Setup Configuration
   a. Open the `config/config.php` file and configure settings such
      as database connection details and other constants.
2. Setup Database
   a. Create a MySQL database based on the configured details in `config/config.php`.
   b. Import the provided SQL file to set up the necessary tables and data.

## File Structure

- `config/`: Contains configuration files.
- `helpers/`: Includes helper functions for URL and sessions.
- `libraries/`: Core libraries with autoloading.
- `app/`: Application files including controllers, models, and views.
- `public/`: Publicly accessible files (CSS, JS, images).
- `README.md`: Project documentation.
- `LICENSE`: Project License.

## Code Documentation

- `Controller.php`: Base controller class.
- `Core.php`: Core class for URL handling and loading controllers.
- `Database.php`: PDO Database class for database operations.
- `Post.php`: Class handling post-related database operations.
- `User.php`: Class handling user-related database operations.
- ...

## Contributing

If you'd like to contribute to the project, please follow the standard procedures:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature/new-feature`
3. Make your changes and commit them: `git commit -m '[Your feature commit message]'`
4. Push to the branch: `git push origin feature/new-feature`
5. Create a pull request.

## TODO: Lists

[TODO](.todo)

## License

This project is licensed under a derivative of the [CC-BY-NC-SA License](https://creativecommons.org/licenses/by-nc-sa/4.0/legalcode.txt) - see the [LICENSE](LICENSE) file for details.
