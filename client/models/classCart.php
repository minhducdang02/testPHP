<?php
class Cart
{
    private $connect;
    public function __construct($path = '../config.txt')
    {
        $this->connect = (new connect())->setConnection($path);
    }
    public function getCarts($where = "1=1", $sort = "", $amount = "")
    {
        $get = new DatabaseMySql($this->connect);
        $result = $get->selectFull("carts", $where, $sort, $amount);
        return $result;
    }
    public function setCart($id_pr, $id_user, $size, $sugar, $price, $amount)
    {
        $set = new DatabaseMySql($this->connect);
        $set->insert("carts",[
            "id_pr" => $id_pr,
            "id_user" => $id_user,
            "size" => $size,
            "sugar" => $sugar,
            "price" => $price,
            "amount" => $amount
        ]);
    }
    public function deleteCart($where = "1=1")
    {
        $del = new DatabaseMySql($this->connect);
        $del->delete("carts", $where);
    }
    public function updateCart($id_pr, $id_user, $size, $sugar, $price, $amount)
    {
        $update = new DatabaseMySql($this->connect);
        $update->update("carts",[
            "id_pr" => $id_pr,
            "id_user" => $id_user,
            "size" => $size,
            "sugar" => $sugar,
            "price" => $price,
            "amount" => $amount
        ],"id_pr=$id_pr AND id_user=$id_user");
    }
};

?>