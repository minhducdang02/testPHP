<?php
class Product
{
    private $connect;
    public function __construct($path = '../config.txt')
    {
        $this->connect = (new connect())->setConnection($path);
    }
    public function getProducts($where = "1=1", $sort = "", $amount = "")
    {
        $get = new DatabaseMySql($this->connect);
        $result = $get->selectFull("products", $where, $sort, $amount);
        return $result;
    }
    public function setProducts($name, $image, $prices, $pricem, $pricel, $amount)
    {
        $set = new DatabaseMySql($this->connect);
        $set->insert("products",[
            "name" => $name,
            "image" => $image,
            "price_s" => $prices,
            "price_m" => $pricem,
            "price_l" => $pricel,
            "amount" => $amount
        ]);
    }
    public function deleteProduct($id)
    {
        $del = new DatabaseMySql($this->connect);
        $del->delete("products", "id=$id");
    }
    public function updateProduct($id, $name, $image, $prices, $pricem, $pricel, $amount)
    {
        $update = new DatabaseMySql($this->connect);
        $update->update(
            "products",[
            "name" => $name,
            "image" => $image,
            "price_s" => $prices,
            "price_m" => $pricem,
            "price_l" => $pricel,
            "amount" => $amount
        ],"id=$id");
    }
};

?>