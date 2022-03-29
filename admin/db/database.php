<?php
class database
{
    private $servername = "localhost";
    private $username = "root";
    private $pass = "";
    private $dbname = "fanjum_blog";
    private $mysqli = "";

    public function __construct()
    {
        $this-> mysqli = new mysqli($this-> servername,$this-> username,$this-> pass,$this -> dbname);
    }
    public function insert_data($query)
    {
       if($this->mysqli->query($query) === true)
       {
           return true;
       }
       else{
           return false;
       }
    }

    public function fetch_data($query){
        return $this->mysqli->query($query);
    }
}


?>