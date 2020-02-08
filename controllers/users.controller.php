<?php

class ControllerUsers{

    /*=================================
    USER LOGIN
    =================================*/

    static public function ctrUserLogin(){

        if(isset($_POST["username"])){
            $table = "users";
            $item = "username";

            $value = $_POST["username"];

            $response = ModelUsers::mdlShowUsers($table,$item,$value);
            
            if($response["username"] == $_POST["username"] &&
                 $response["password"] == $_POST["password"]){

                    $_SESSION["login"] = "ok";
                    $_SESSION["username"] = $response["username"];
                    $_SESSION["id"] = $response["id"];
                    $_SESSION["mail"] = $response["mail"];
                    $_SESSION["premium"] = $response["premium"];

                    echo '<script> window.location = "all-glossaries" </script>';

                 }else{
                     echo '<br><div class="alert-danger mt-1 text-center">Error, wrong username or password</div>';
                 };
        }

    }


    /*=================================
    CREATE NEW USER
    =================================*/

    static public function ctrCreateUser(){

        if(isset($_POST["username"])){

            if($_POST["password"] == $_POST["password2"]){
           
                    $table = "users";

                    $data = array("username" => $_POST["username"],
                                "mail" => $_POST["mail"],
                                "password" => $_POST["password"]);

                    $response = ModelUsers::mdlCreateUser($table,$data);

                    if($response == "ok"){
                        echo '<script> alert("The user was successful created"); window.location = "/translateapp"; </script>';
                    } 


            } else {
                echo '<br><div class="alert-danger text-center mt-3">
                Error, different passwords</div>';
            }

    }
}

}
