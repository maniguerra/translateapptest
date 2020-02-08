<?php
  session_start();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Translate App - Mini-Glossary Application Test</title>
	
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- PLUGINS  -->   
    <script src="views/plugins/jquery/jquery.min.js"></script>
    <link href="views/plugins/bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="views/css/style.css" rel="stylesheet">
    <script src="views/plugins/bootstrap/bootstrap.min.js"></script>

    <link href="views/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet">
    <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>

    <script src="https://kit.fontawesome.com/a7ff13fa89.js" crossorigin="anonymous"></script>
   

</head>

<body>

<?php

if(isset($_SESSION["login"]) && $_SESSION["login"] == "ok" ){
  
      /*=================================================
      HEADER
      =================================================*/

      include "modules/header.php";

      /*=================================================
      MAIN CONTENT
      =================================================*/
      if(isset($_GET["route"])){

        if( 
            $_GET["route"] == "logout" ||
            $_GET["route"] == "my-glossaries" ||
            $_GET["route"] == "all-glossaries" ||
            $_GET["route"] == "get-premium" ||
            $_GET["route"] == "premium" ||
            $_GET["route"] == "glossary"
        ){
          include "modules/".$_GET["route"].".php";
        } else{
          include "modules/404.php";
        }


      }
      


      /*=================================================
      FOOTER
      =================================================*/
      include "modules/footer.php";
} else {



  if(isset($_GET["route"])){

    if( $_GET["route"] == "register"){}
      include "modules/register.php";
    } else {
      include "modules/login.php";
    }


  }

?>





<script src="views/js/template.js"></script>
<script src="views/js/glossary.js"></script>

   
</body>


</html>