<?php

class Dbh {
    protected $connection;

    public function __construct() {
        $config = parse_ini_file('../config/config.ini', true);

        $host = $config['db']['host'];
        $db = $config['db']['name'];
        $user = $config['db']['user'];
        $password = $config['db']['password'];

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$db", 
                                         $user, $password, 
                                         array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}


?>