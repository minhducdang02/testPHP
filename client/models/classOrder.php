<?php
class Order
{
    private $connect;
    public function __construct($path = '../config.txt')
    {
        $this->connect = (new connect())->setConnection($path);
    }
    public function getOrders($join = "",$where = "1=1", $sort = "", $amount = "")
    {
        $get = new DatabaseMySql($this->connect);
        $result = $get->selectFull("orders $join", $where, $sort, $amount);
        return $result;
    }
    public function setOrders($id_user, $date, $price, $status)
    {
        $set = new DatabaseMySql($this->connect);
        $set->insert("orders",[
            "id_user" => $id_user,
            "date" => $date,
            "price" => $price,
            "status" => $status
        ]);
    }
    public function deleteOrders($where)
    {
        $del = new DatabaseMySql($this->connect);
        $del->delete("orders",$where);
    }
    public function deleteOrderDetails($where)
    {
        $del = new DatabaseMySql($this->connect);
        $del->delete("order_details",$where);
    }
    public function deleteOrderLists($where)
    {
        $del = new DatabaseMySql($this->connect);
        $del->delete("order_lists",$where);
    }
    public function getOrderDetails($where = "1=1", $sort = "", $amount = "")
    {
        $get = new DatabaseMySql($this->connect);
        $result = $get->selectFull("order_details", $where, $sort, $amount);
        return $result;
    }
    public function setOrderDetails($id_order, $name, $phone, $address, $note)
    {
        $set = new DatabaseMySql($this->connect);
        $set->insert("order_details",[
            "id_order" => $id_order,
            "name" => $name,
            "phone" => $phone,
            "address" => $address,
            "note" => $note
        ]);
    }
    public function getOrderList($join = "", $where = "1=1", $sort = "", $amount = "")
    {
        $get = new DatabaseMySql($this->connect);
        $result = $get->selectFull("order_lists $join", $where, $sort, $amount);
        return $result;
    }
    public function setOrderList($id_order, $id_pr, $sugar, $size, $amount, $price)
    {
        $set = new DatabaseMySql($this->connect);
        $set->insert("order_lists",[
            "id_order" => $id_order,
            "id_pr" => $id_pr,
            "sugar" => $sugar,
            "size" => $size,
            "amount" => $amount,
            "price" => $price
        ]);
    }
    public function updateOrders($id, $status)
    {
        $update = new DatabaseMySql($this->connect);
        $update->update("orders",[
            "status" => $status
        ],"id=$id");
    }
};

?>