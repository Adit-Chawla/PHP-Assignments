<?php
class Database{
    private $connection;        //connection variable
    
    function __construct(){
        $this->connect_db();
    }

    //Connect Function
    public function connect_db(){
        $this->connection = mysqli_connect('172.31.22.43', 'Adit200531948', '6ym96Kt8-R', 'Adit200531948');  //Credentials
        if(mysqli_connect_error()){
            die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_error());    //If the connection fails
        }
    }

    //Create Function
    public function create($fname,$lname,$phone,$email,$address_line,$size,$toppings,$special){
        $sql = "INSERT INTO pizzaOrders (fname, lname, phone, email, address_line, pizzaSize, toppings, specialInstructions) VALUES ('$fname', '$lname', '$phone', '$email', '$address_line', '$size', '$toppings', '$special')";
        $res = mysqli_query($this->connection, $sql);
        
        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    //Read Function
    public function read($fname=null){
        $sql = "SELECT * FROM pizzaOrders";
        if($fname){
            $sql .= " WHERE id=$fname";
        }
        $res = mysqli_query($this->connection, $sql);
        return $res;
    }

    //Sanitize Function
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->connection, $var);
        return $return;
    }
}
$database = new Database();
//End of Code