<?php

class ControllerGlossaries{

    /*==============================================
    CREATE GLOSSARY QUERY
    ==============================================*/

    static public function ctrCreateGlossaryQuery(){

        if(isset($_POST["topic"])){

            $table = "glossary_queries";

            $data = array("topic" => $_POST["topic"],
            "language" => $_POST["language"],
            "term1" => $_POST["term1"],
            "term2" => $_POST["term2"],
            "term3" => $_POST["term3"],
            "term4" => $_POST["term4"],
            "term5" => $_POST["term5"],
            "user_id" => $_SESSION["id"]);

            $response = ModelGlossaries::mdlCreateGlossaryQuery($table,$data);

            if($response == "ok"){
                echo '<script>alert("The glossary query was successfull created"); window.location="my-glossaries"</script>';
            }
          }
    }


    /*==============================================
    GET ALL MY GLOSSARIES
    ==============================================*/

    static public function ctrGetMyGlossaries(){

        $table = "glossary_queries";
        $item = "user_id";
        $value = $_SESSION["id"];
        $response = ModelGlossaries::mdlShowMyGlossaries($table, $item, $value);

        foreach ($response as $key => $value){

            echo '<tr>
                        <td>'.$_SESSION["username"].'</td>
                        <td>'.$value["topic"].'</td>
                        <td>'.$value["language"].'</td>
                        <td>5</td>
                        <td>
                        <div class="btn-group">
                            <button class="btn btn-success btnSeeGlossary" idGlossary="'.$value["id"].'" ><i class="fas fa-eye"></i></button>
                        </div>
                        </td>
                        
                    </tr>';
        }

    }
    
    /*==============================================
    GET ALL GLOSSARIES
    ==============================================*/

    static public function ctrGetAllGlossaries(){

        $table = "glossary_queries";
        $response = ModelGlossaries::mdlGetAllGlossaries($table);

        foreach ($response as $key => $value){

            $value2 = $value["user_id"];
            $table2 = "users";
            $item2 = "id";

            $response2 = ModelUsers::mdlShowUsers($table2,$item2,$value2);

            
            echo '<tr>
                        <td>'.$response2["username"].'</td>
                        <td>'.$value["topic"].'</td>
                        <td>'.$value["language"].'</td>
                        <td>'.$value["answers"].'</td>
                        <td>
                        <div class="btn-group">
                            <button class="btn btn-success btnSeeGlossary" idGlossary="'.$value["id"].'"><i class="fas fa-eye"></i></button>
                        </div>
                        </td>
                        
                    </tr>';
        }

    }


    /*==============================================
    CREATE GLOSSARY ANSWER
    ==============================================*/

    static public function ctrCreateGlossaryAnswer(){

        if(isset($_POST["idGlossary"])){

            $table = "glossary_responses";

            $data = array(
            "glossary_id" => $_POST["idGlossary"],
            "language" => $_POST["language"],
            "term1" => $_POST["term1"],
            "term2" => $_POST["term2"],
            "term3" => $_POST["term3"],
            "term4" => $_POST["term4"],
            "term5" => $_POST["term5"],
            "user_id" => $_SESSION["id"],
            );

            $response = ModelGlossaries::mdlCreateGlossaryAnswer($table,$data);

            if($response == "ok"){
                echo '<script>alert("The glossary answer was successfull created"); window.location="glossary?id='.$_POST["idGlossary"].'"</script>';
               
            }
          }
    }






}
?>