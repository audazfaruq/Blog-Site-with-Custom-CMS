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
    public function insert_data($insert_query)
    {
       if($this->mysqli->query($insert_query) === true)
       {
           return true;
       }
       else{
           return false;
       }
    }

    public function fetch_data($fetch_query){
        return $this->mysqli->query($fetch_query);
    }

    public function update_data($update_query)
    {
        if($this->mysqli->query($update_query) === true){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete_data($delete_query)
    {
        if($this->mysqli->query($delete_query) === true){
            return true;
        }
        else{
            return false;
        }
    }
    
}



?>