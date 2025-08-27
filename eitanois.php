<?php

class DatabaseConnection{
    private static $instance = null; 
    private $dns;
    private $username;
    private $password;
    private $options;
      

    private function __construct($dns, $username, $password, $options = []){
        $this->dns = $dns;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }
    
    public static function getIntance($dns = null, $username = null, $password = null, $options = []){
        if (self::$instance == null){
            if ($dns === null || $username === null || $password === null){
                throw new Exception("Parameters required for the first instantiation");
            }
            self::$instance = new self($dns, $username, $password, $options);
        }
        return self::$instance;
    }
}