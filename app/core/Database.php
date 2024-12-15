<?php 

class Database {
    private $conn;
    private $stmt;

    public function __construct() {
        try {
            $this->conn = new PDO("sqlsrv:server=SCAREBAT\SQLEXPRESS;database=Presma");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            die("Connection failed: " . $error->getMessage());
        }
    }

    public function query($query) {
        $this->stmt = $this->conn->prepare($query);
        return $this;
    }

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

    public function execute() {
        try {
            return $this->stmt->execute();
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function closeConnection() {
        $this->conn = null;
    }
}
?>