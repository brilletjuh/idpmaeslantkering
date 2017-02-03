<?php
/* Author: Matthias Krijgsman */

class sController {

    //  Simpele niet-beveiligde manier van inloggen
    function login($user, $pass){
        $dataController = new dController();
        $stmt = $dataController->db_connection->prepare("SELECT id FROM users WHERE users.username='".$user."' AND users.password='".$pass."'");
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
            $id = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['logged'] = $id['id'];
            return true;
        }else{
            return false;
        }

    }

    function logout(){
        session_destroy();
    }

    //  Checken of de gebruiker rechten heeft om de pagina te bezoeken
    function checkAuthorization(){
        if(isset($_SESSION['logged'])){
            return true;
        }else{
            return false;
        }
    }

}

$sessionController = new sController();
