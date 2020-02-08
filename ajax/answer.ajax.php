<?php 

require_once "../models/glossaries.model.php";

require_once "../controllers/glossaries.controller.php";

class AjaxAnswers{

    
    public $idAnswerAdd;
    public $idAnswerRm;
    public $votes;

    

    public function ajaxAddVote(){
        $table = "glossary_responses";
        $field = "accepted";
        $id = $this->idAnswerAdd;
        
        $vote = $this->votes;

        

        $value = $vote + 1;

        $response = ModelGlossaries::mdlAddVote($table,$field,$value,$id);

        echo '<script>console.log('.$vote.')</script>';

        echo json_encode($response);
    }
    

 
}

if(isset($_POST["idAnswerAdd"])){
    echo '<script>console.log("chau")</script>';
    $idAnswerAdd = new AjaxAnswers();
    $idAnswerAdd -> idAnswerAdd = $_POST["idAnswerAdd"];
    $idAnswerAdd -> ajaxAddVote();

} else {
    echo '<script>console.log("chau")</script>';
}

