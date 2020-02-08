<?php


$table = "glossary_queries";
$item = "id";
$value = $_GET["id"];

$responseGlossaryQuery = ModelGlossaries::mdlGetGlossary($table,$item,$value);


$table2 = "users";
$item2 = "id";
$value2 = $responseGlossaryQuery["user_id"];


$responseUser = ModelUsers::mdlShowUsers($table2,$item2,$value2);

$table3 = "glossary_responses";
$item3 = "glossary_id";
$value3 = $_GET["id"];

$responseGlossaryAnswer = ModelGlossaries::mdlGetAnswers($table3,$item3,$value3);

?>

<div class="container">

        <div class="row">
            <div class="col-3 alert alert-primary">
                <h5> 
                    Topic: <?php echo $responseGlossaryQuery["topic"]; ?>
                </h5>
            </div>

            <div class="col-3 alert alert-warning">
                <h5> 
                    Language: <?php echo $responseGlossaryQuery["language"]; ?>
                </h5>
            </div>

            <div class="col-3 alert alert-danger">
                <h5> 
                    Autor: <?php echo $responseUser["username"]; ?>
                </h5>
            </div>
            <div class="col-3 alert alert-info">
                <h5> 
                    Answers: <?php echo $responseGlossaryQuery["answers"]; ?>
                </h5>
            </div>
        </div>

        <div class="row">
            
            <div class="col-12"><button class="btn btn-lg alert alert-success float-right" data-toggle="modal" data-target="#proposeAnswer">Propose answer</button></div>
            

        </div>

        <div class="row">
           
   
            <?php


            for($i = 1; $i <= 5; $i++){
                if($responseGlossaryQuery["term".$i] != ""){

                    echo '<div class="col-12 alert alert-secondary"> <b>Term '.$i.'</b> - '.$responseGlossaryQuery["term".$i].'</div>';
                }

                    
                
            }


            ?>

            
        </div>

        <!-- ANSWERS -->

        <?php
         if($responseGlossaryAnswer){
                    foreach($responseGlossaryAnswer as $key => $value ){

                        $table = "users";
                        $item = "id";
                        $value2 = $value["user_id"];


                        $responseUser2 = ModelUsers::mdlShowUsers($table,$item,$value2);
                    
                    echo'<div class="row">
                        <div class="col-12">
                            <div id="accordion">
                        
                        
                                <div class="col-12 alert alert-warning">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne'.$key.'" aria-expanded="true" aria-controls="collapseOne'.$key.'">
                                    See answer from '.$responseUser2["username"].' - '.$responseGlossaryQuery["language"].' to '.$value["language"].'

                                    <button class="btn btn-sm float-right text-danger rmVote" idrm="'.$value["id"].'"><i class="far fa-thumbs-down"></i></button>
                                    <button class="btn btn-sm float-right text-success addVote" idadd="'.$value["id"].'"><i class="far fa-thumbs-up"></i></button>
                                    <button class="btn btn-sm float-right text-info votes" votes="'.$value["accepted"].'">'.$value["accepted"].'</button>

                                    
                                    </button>
                            
                                </div>
                            

                                <div id="collapseOne'.$key.'" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">';

                                        for($i = 1; $i <= 5; $i++){
                                            if($value["term".$i] != ""){

                                                echo '<div class="col-12 alert alert-success"> <b>Term '.$i.'</b> - '.$value["term".$i].'</div>';
                                            }
                                        }

                                        echo '
                                    </div>
                                </div>
                                        
                            </div>

                        </div>
                    </div>';

                }
    }

        ?>
        
                            <?php
                               

                            ?>
                

<!-- ==================================
MODAL PROPOSE ANSWER
================================== -->


<!-- Modal -->
<div class="modal fade" id="proposeAnswer" tabindex="-1" role="dialog" aria-labelledby="proposeAnswer" aria-hidden="true" style="opacity:0.7;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

            <form role="form" method="post">
              <div class="modal-header" style="background-color:#A49393">
                <h5 class="modal-title" id="modalCreateGlossary">Add New Answer to Glossary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"  style="background-color:#EED6D3">
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="topic" value="<?php echo $responseGlossaryQuery["topic"];?>" disabled >
                      <input type="hidden" name="idGlossary" value="<?php echo $responseGlossaryQuery["id"];?>">
                      
                    </div>
                    <span class="small text-muted">Original language</span>

                    <div class="input-group mb-4">
                     
                      <select class="form-control input-lg" disabled>
                        <option value="<?php echo $responseGlossaryQuery["language"];?>"><?php echo $responseGlossaryQuery["language"];?></option>
                       
                      </select>
                      
                     </div>
                    
                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <select class="form-control input-lg" name="language" id="language" required>
                        <option value="">Select a translator language</option>
                        <option value="English">English</option>
                        <option value="Spanish">Spanish</option>
                        <option value="French">French</option>
                        <option value="German">German</option>
                      </select>
                      
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" value="<?php echo $responseGlossaryQuery["term1"];?>" disabled>
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term1" placeholder="Translate first term" required>
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg"  value="<?php echo $responseGlossaryQuery["term2"];?>" disabled>
                    </div>
                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term2" placeholder="Translate second term" required>
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" value="<?php echo $responseGlossaryQuery["term3"];?>" disabled>
                    </div>
                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term3" placeholder="Translate third term" required>
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg"  value="<?php echo $responseGlossaryQuery["term4"];?>" disabled>
                    </div>
                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term4" placeholder="Translate fourth term">
                    </div>

                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" value="<?php echo $responseGlossaryQuery["term5"];?>" disabled>
                    </div>
                    <div class="input-group mb-4">
                      <span class="input-group-prepend"></span>
                      <input type="text" class="form-control input-lg" name="term5" placeholder="Translate fifth term">
                    </div>

                  </div>
                </div>
              </div>
              <div class="modal-footer"  style="background-color:#A49393">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Glossary Answer</button>
              </div>

              <?php 

              $createGlossary = new ControllerGlossaries();
              $createGlossary -> ctrCreateGlossaryAnswer();
              ?>


            </form>

    </div>
  </div>
</div>


