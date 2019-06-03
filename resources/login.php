<?php

     $pw_hash = hash("sha256", $_POST['loginpwfeld']);
     $_SESSION['login'] = false;

     for($i=0; $i<$GLOBALS['usercount']; $i++){
          if($_POST['benutzernamefeld']==$GLOBALS['userlist'][$i]['username'] && $pw_hash==$GLOBALS['userlist'][$i]['pw_hash'])
          {
               $_SESSION['login'] = true;
               $_SESSION['userdata'] = $GLOBALS['userlist'][$i];
          }
     }



     if($_SESSION['login']==false){
          header("Location:reg_error");
     } else {
          header("Location:home");
     }
?>
