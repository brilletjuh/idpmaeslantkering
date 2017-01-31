<?php
/* Author: Matthias Krijgsman */

class sController {

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

    function checkAuthorization(){
        if(isset($_SESSION['logged'])){
            return true;
        }else{
            return false;
        }
    }

}

$sessionController = new sController();
