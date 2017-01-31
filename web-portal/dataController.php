<?php
/* Author: Matthias Krijgsman */

class dController {

    function __construct(){
        $this->db_server = "198.211.126.139";
        $this->db_name = "maeslantkering";
        $this->db_username = "matthias";
        $this->db_password = "dikkebmw69";
        try{
            $this->db_connection = new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_username, $this->db_password);
        }catch (PDOException $e){
            echo "Oops something went wrong!";
        }
    }
}

