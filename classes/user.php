<?php

require_once 'db_handler.php';


class User {
    private $username;
    private $name;
    private $pwd;
    private $email;
    private $database;
    
    public function __construct($username, $name, $pwd, $email) {
        $this->username = $username;
        $this->name = $name;
        $this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $this->email = $email;
        $this->database = new Dbh();
    
       
    }

    public function exists() {
        $result = $this->selectUserQuery(["username" => $this->username]);

        if($result["success"]) {
            $user = $result['data']->fetch(PDO::FETCH_ASSOC);
            // var_dump($user);
            if($user) {
                return ["success" => true, "data" => $user];
            } else {
                return ["success" => true, "data" => null];
            }
        } else {
            return $result;
        }
    }


    public function selectUserQuery($data) {
        try {
            $sql = "SELECT * FROM users WHERE username=:username";
            $stmt = $this->database->getConnection()->prepare($sql); 
            $stmt->execute($data);

            return ["success" => true, "data" => $stmt];
        } catch(PDOException $e) {
            return ["success" => false, "error" => $e->getMessage()];
        }
    }

    public function insertUserQuery($data) {
        try {
            $sql = "INSERT INTO users(username, name, email, passwd) VALUES(:username, :name, :email, :password)";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute($data);

            return ["success" => true];

        } catch(PDOException $e) {
            echo $e->getMessage();
            $this->database->getConnection()->rollBack();
            return ["success" => false, 
                    "error" => "Connection failed: " . $e->getMessage()];
        }
    }

    public function createUser() {
        $result = $this->insertUserQuery(["username" => $this->username,
                                          "name" => $this->name, 
                                          "password" => $this->pwd, 
                                          "email" => $this->email]);

        return $result;    
    }

    public function __destruct() {
        $this->database->closeConnection();
    }

    public function getUsername() {
        return $this->username;
    }
    public function getPassword() {
        return $this->pwd;
    }
    public function getEmail() {
        return $this->email;
    }

}
?>