<?php
class Config
{

    public $DB = "shop";
    public $HOST = "127.0.0.1";
    public $PASSWORD = "";
    public $USERNAME = "root";
    public $productTable = "products";

    public $Conn;

    public function connect()
    {
        $this->Conn = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB);
    }
    public function productInsert($name, $prize, $stock)
    {
        $this->connect();
        $query = "INSERT INTO $this->productTable(name,price,stock) VALUES('$name',$prize,$stock);";
        $res = mysqli_query($this->Conn, $query);
        return $res;
    }


    public function productFetch($id)
    {
        $this->connect();

        if ($id == 0) {
            $query = "SELECT * FROM   $this->productTable;";
            $res = mysqli_query($this->Conn, $query);
            return $res;
        } else {
            $query = "SELECT * FROM   $this->productTable WHERE id=$id;";
            $res = mysqli_query($this->Conn, $query);
            return $res;
        }
    }

    public function productDelate($id)
    {
        $this->connect();
        $query = "DELETE FROM $this->productTable WHERE id=$id;";
        $res = mysqli_query($this->Conn, $query);
        return $res;
    }

    public function productUpdate($id, $name, $price)
    {
        $this->connect();
        $query = "UPDATE $this->productTable SET name='$name' , price=$price WHERE id=$id;";
        $res = mysqli_query($this->Conn, $query);
        return $res;
    }

    public function stockUpdate($id, $stock)
    {
        $this->connect();
        $query = "UPDATE $this->productTable SET stock='$stock' WHERE id=$id;";
        $res = mysqli_query($this->Conn, $query);
        return $res;
    }
}
?>