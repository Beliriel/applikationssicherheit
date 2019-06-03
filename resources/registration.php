<?php

     $filename_ul = '../userlist.txt';
     $userlist = fopen($filename_ul, "a") or die('Unable to open userlist!');

     $user_already_exists = false;
     for($i=0; $i<$GLOBALS['usercount']; $i++){
          if($_POST['benreg']==$GLOBALS['userlist'][$i]['username']){
               $user_already_exists = true;
          }
     }

     if(!$user_already_exists){
          $role = "User";
          $userstring = $GLOBALS['usercount']."#".$_POST['benreg']."#".hash("sha256", $_POST['passwd_reg'])."#".$role."#\n";
          fwrite($userlist, $userstring);
          fclose($userlist);

          unset($GLOBALS['userlist']);
          unset($GLOBALS['usercount']);

          header("Location:home");
     } else {
          header("Location:reg_error");
     }


?>
