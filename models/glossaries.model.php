<?php

require_once "connection.php";

class ModelGlossaries{


    static public function mdlCreateGlossaryQuery($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(topic, language, term1, term2, term3, term4, term5, user_id) VALUES (:topic, :language, :term1, :term2, :term3, :term4, :term5, :user_id)");
   
        $stmt->bindParam(":topic",$data["topic"],PDO::PARAM_STR);
        $stmt->bindParam(":language",$data["language"],PDO::PARAM_STR);
        $stmt->bindParam(":term1",$data["term1"],PDO::PARAM_STR);
        $stmt->bindParam(":term2",$data["term2"],PDO::PARAM_STR);
        $stmt->bindParam(":term3",$data["term3"],PDO::PARAM_STR);
        $stmt->bindParam(":term4",$data["term4"],PDO::PARAM_STR);
        $stmt->bindParam(":term5",$data["term5"],PDO::PARAM_STR);
        $stmt->bindParam(":user_id",$data["user_id"],PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
   
    }


    static public function mdlShowMyGlossaries($table, $item, $value){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
   
        $stmt->bindParam(":".$item, $value,PDO::PARAM_STR);
        

        $stmt->execute();
       
        return $stmt -> fetchAll();
        

        $stmt->close();
        $stmt = null;
   
    }


    static public function mdlGetAllGlossaries($table){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table");
   
        

        $stmt->execute();
       
        return $stmt -> fetchAll();
        

        $stmt->close();
        $stmt = null;
   
    }
    
    static public function mdlGetGlossary($table, $item, $value){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
   
        $stmt->bindParam(":".$item, $value,PDO::PARAM_STR);
        

        $stmt->execute();
       
        return $stmt -> fetch();
        

        $stmt->close();
        $stmt = null;
   
    }

    static public function mdlCreateGlossaryAnswer($table, $data){

        $stmt = Connection::connect()->prepare("INSERT INTO $table(user_id, glossary_id, term1, term2, term3, term4, term5, language, accepted) VALUES (:user_id, :glossary_id, :term1, :term2, :term3, :term4, :term5, :language, 0)");
   
        $stmt->bindParam(":glossary_id",$data["glossary_id"],PDO::PARAM_STR);
        $stmt->bindParam(":language",$data["language"],PDO::PARAM_STR);
        $stmt->bindParam(":term1",$data["term1"],PDO::PARAM_STR);
        $stmt->bindParam(":term2",$data["term2"],PDO::PARAM_STR);
        $stmt->bindParam(":term3",$data["term3"],PDO::PARAM_STR);
        $stmt->bindParam(":term4",$data["term4"],PDO::PARAM_STR);
        $stmt->bindParam(":term5",$data["term5"],PDO::PARAM_STR);
        $stmt->bindParam(":user_id",$data["user_id"],PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
   
    }

       
    static public function mdlGetAnswers($table, $item, $value){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
   
        $stmt->bindParam(":".$item, $value,PDO::PARAM_STR);
        

        $stmt->execute();
       
        return $stmt -> fetchAll();
        

        $stmt->close();
        $stmt = null;
   

    }

  

   
    


}