<?php
class DatabaseMySql{
    private $hostName;
    private $dbName;
    private $user;
    private $pass;
    private $connection;
    public function __construct($connect)
    {
        $this->hostName = $connect->host;
        $this->dbName = $connect->database;
        $this->user = $connect->username;
        $this->pass = $connect->password;
        $this->connection = new mysqli($this->hostName, $this->user, $this->pass, $this->dbName);
        $this->connection->set_charset('utf8');
    }
    public function update($table, $arrData, $where)
    {
        $values = "";
        foreach($arrData as $key => $val)
        {
            $values .= "`$key`" . "='$val'" . ',';
        }
        $values = rtrim($values, ',');
        $query = "UPDATE $table set $values WHERE $where";
        $this->connection->query($query);
        return;
    }
    public function insert($table, $arrData)
    {
        $fields = "";
        $values = "";
        foreach($arrData as $key => $val)
        {
            $fields .= '`' . $key . '`' .  ',';
            $values .= "'" . $val . "'" . ',';
        }
        $fields = rtrim($fields, ',');
        $values = rtrim($values, ',');
        $values = '(' . $values . ')';
        $query = "INSERT INTO $table($fields) VALUES $values";
        $this->connection->query($query);
        return;
    }
    public function delete($table, $where)
    {
        $query = "DELETE FROM `$table` WHERE $where";
        $this->connection->query($query);
        return;
    }
    public function selectFull($table, $where, $sortby, $limit)
    {
        if($sortby != "")
        {
            $sort = explode(" ", $sortby);
            $sortby = "ORDER BY {$sort[0]} {$sort[1]}";
        }
        if($limit != "")
        {
            $limit = "LIMIT $limit";
        }
        $query = "SELECT * FROM $table WHERE $where $sortby $limit";
        $result = $this->connection->query($query);
        return $result;
    }
    public function __destruct()
    {
        $this->connection->close();
    }
};
?>