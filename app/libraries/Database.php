<?php
/**
 * PDO Database Class
 *
 * This class is responsible for connecting to the database, creating prepared statements,
 * binding values, and returning rows and results.
 */
class Database {
    private $host = DBHOST;
    private $user = DBUSER;
    private $pass = DBPASS;
    private $dbname = DBNAME;

    private $dbh;   // PDO instance
    private $stmt;  // Prepared statement
    private $error; // Error message

    /**
     * Constructor method.
     */
    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Query Method
     *
     * Prepares a statement with the provided SQL query.
     *
     * @param string $sql The SQL query
     */
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Bind Method
     *
     * Binds a value to a parameter in the prepared statement.
     *
     * @param mixed  $param The parameter to bind
     * @param mixed  $value The value to bind
     * @param string $type  The data type (default: null)
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Execute Method
     *
     * Executes the prepared statement.
     *
     * @return bool Returns true on success, false on failure
     */
    public function execute() {
        return $this->stmt->execute();
    }

    /**
     * ResultSet Method
     *
     * Gets the result set as an array of objects.
     *
     * @return array An array of objects representing the result set
     */
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Single Method
     *
     * Gets a single record as an object.
     *
     * @return object An object representing a single record
     */
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * RowCount Method
     *
     * Gets the row count of the result set.
     *
     * @return int The number of rows affected by the last SQL statement
     */
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
