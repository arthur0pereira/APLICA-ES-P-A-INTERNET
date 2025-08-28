<?php

class DatabaseConnection{
    private static $instance = null; 
    private $dns;
    private $username;
    private $password;
    private $options;
    private $connection;
      

    private function __construct($dns, $username, $password, $options = []){
        $this->dns = $dns;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }
    
    public static function getInstance($dsn = null, $username = null, $password = null, $options = []) {
           if (self::$instance === null) {
               if ($dsn === null || $username === null || $password === null) {
                   throw new Exception("Primeira chamada precisa de DSN, usuário e senha!");
               }
               self::$instance = new self($dsn, $username, $password, $options);
           }
           return self::$instance;
       }

    public function connect(){
        try{
            $pdoconection = new PDO($this->dns, $this->username, $this->password, $this->options);
            $this->connection = $pdoconection;
            return $pdoconection;
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
            return null;
        }
    }

    public function query($sql){
        if ($this->connection) {
            return $this->connection->query($sql);
        }
        return null;
    }
}

