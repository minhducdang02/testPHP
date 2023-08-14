<?php
class connect{
    public $host;
    public $username;
    public $password;
    public $database;
    public function __construct()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "banDongHo";
    }
    public function setConnection($path)
    {
        $file  = file_get_contents($path);
        $arr = json_decode($file, true);
        $this->host = $arr['host'];
        $this->username = $arr['username'];
        $this->password = $arr['password'];
        $this->database = $arr['database'];
        return $this;
    }
};