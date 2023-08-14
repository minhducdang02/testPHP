<?php
class User
{
    private $connect;
    public function __construct($path = '../config.txt')
    {
        $this->connect = (new connect())->setConnection($path);
    }
    public function getUsers($where = "1=1", $sort = "", $amount = "")
    {
        $get = new DatabaseMySql($this->connect);
        $result = $get->selectFull("users", $where, $sort, $amount);
        return $result;
    }
    public function deleteUsers($id)
    {
        $del = new DatabaseMySql($this->connect);
        $del->delete("users", "id=$id");
    }
    public function setUsers($email, $pass, $name, $phone = "", $address = "")
    {
        $set = new DatabaseMySql($this->connect);
        $set->insert("users",[
            "email" => $email,
            "pass" => $pass,
            "name" => $name,
            "phone" => $phone,
            "address" => $address
        ]);
    }
    public function getName($name)
    {
        $name = explode(" ", $name);
        return $name[count($name) - 1];
    }
};

?>