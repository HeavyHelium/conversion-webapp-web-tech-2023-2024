<?php

require_once 'db_handler.php';


class User {
    private $username;
    private $name;
    private $pwd;
    private $email;
    private $database;
    
    public function __construct($username="", $name="", $pwd="", $email="") {
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

    public function selectAreasQuery() {
        try {
            $sql = "SELECT * FROM ProfileHistory WHERE username=:username ORDER BY version DESC LIMIT 1;";
            $stmt = $this->database->getConnection()->prepare($sql); 
            $stmt->execute(["username" => $this->username]);

            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            

            return ["success" => true, "data" => $data];
        } catch(PDOException $e) {
            return ["success" => false, "error" => $e->getMessage()];
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

    public function historyUserQuery() {
        try {
            $sql = "SELECT * FROM ProfileHistory WHERE username=:username ORDER BY version DESC";
            $stmt = $this->database->getConnection()->prepare($sql); 
            $stmt->execute(["username" => $this->username]);

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            

            return ["success" => true, "data" => $data];
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
        try {
            $result = $this->insertUserQuery(["username" => $this->username,
                                             "name" => $this->name, 
                                             "password" => $this->pwd, 
                                             "email" => $this->email]);
            $sql = "INSERT INTO ProfileHistory(username, inputfield, configfield, outputfield, version) VALUES(:username, NULL, 2, NULL, (NOW()))";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute(["username" => $this->username]);
        } catch(PDOException $e) {
            echo $e->getMessage();
            $this->database->getConnection()->rollBack();
            return ["success" => false, 
                    "error" => "Connection failed: " . $e->getMessage()];
        }

        return $result;    
    }

    public function insertConversionHistory($inputField,
                                            $outputField, 
                                            $configField, 
                                            $conversionType, 
                                            $comment) {
        try {
            $sql = "INSERT INTO ProfileHistory(username, inputfield, configfield, outputfield, version, comment, conversiontype) VALUES(:username, :inputfield, :configfield, :outputfield, (NOW()), :comment, :conversiontype)";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->execute([ "username" => $this->username, 
                             "inputfield" => $inputField,
                             "outputfield" => $outputField,
                             "configfield" => $configField,
                             "conversiontype" => $conversionType,
                             "comment" => $comment]);
        } catch(PDOException $e) {
            echo $e->getMessage();
            $this->database->getConnection()->rollBack();
            return ["success" => false, 
                    "error" => "Connection failed: " . $e->getMessage()];
        }
        return ["success" => true];
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