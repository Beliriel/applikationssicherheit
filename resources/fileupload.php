<?php
     if($_SESSION['bilder'] == null || empty($_SESSION['bilder'])){
          $_SESSION['bilder'] = array();
     }

     if($FILES['userfile']['size']>4200000){ //File bigger than 4MB gives error
          header("Location:error");
     }
     $tempfile = '../bildertemp/'.$_FILES['userfile']['name'];
     move_uploaded_file( $_FILES['userfile']['tmp_name'],  $tempfile );

     $eintrag = $_FILES['userfile'];
     $eintrag['tmp_name'] = $tempfile;
     $eintrag['beschreibung'] = $_POST['bildbeschreibung'];
     array_push($_SESSION['bilder'], $eintrag);

     header("Location:blog");
?>
