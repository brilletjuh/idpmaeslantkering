<?php
/* Author: Matthias Krijgsman */

class dController {

    function __construct(){
        $this->db_server    = "Helaas! Geen gratis database";
        $this->db_name      = "";
        $this->db_username  = " (Oh shit ze staan natuurlijk ";
        $this->db_password  = " gewoon in github) ";
        try{
            $this->db_connection = new PDO("mysql:host=$this->db_server;dbname=$this->db_name", $this->db_username, $this->db_password);
        }catch (PDOException $e){
            echo "Cannot connect to the DB";
        }
    }
}

