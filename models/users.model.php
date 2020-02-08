<?php

require_once "connection.php";

class ModelUsers{

    /*=================================
    SHOW USERS
    =================================*/

    static public function mdlShowUsers($table,$item,$value){

        

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;


    }


    /*=================================
    REGISTER USERS
    =================================*/

    static public function mdlCreateUser($table, $data){
        
        $stmt = Connection::connect()->prepare("INSERT INTO $table(username, mail, password, premium) VALUES (:username, :mail, :password, 'no')");

        $stmt -> bindParam(":username", $data["username"], PDO::PARAM_STR);
        $stmt -> bindParam(":mail", $data["mail"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
       

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt -> close();

        $stmt = null;
    }
}


?>