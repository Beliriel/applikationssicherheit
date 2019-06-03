<?php
     $db = new mysqli($GLOBALS["db"]["host"],$GLOBALS["db"]["username"],$GLOBALS["db"]["password"],$GLOBALS["db"]["dbname"]);
     if($_POST['nukebutton']=="NUKE ALL!"){
          $db->query("DELETE FROM bilder");
          $db->query("DELETE FROM likes");
          $db->query("DELETE FROM kommentar");
          $db->query("DELETE FROM blogeintrag");

          $files = glob('../bilder/*'); // get all file names // modifiziert von https://stackoverflow.com/questions/4594180/deleting-all-files-from-a-folder-using-php
          foreach($files as $file){ // iterate files
               if(is_file($file))
               unlink($file); // delete file
          }
     }
     elseif($_POST['nukebutton']=="Nuke user!"){
          $filename_ul = '../userlist.txt';
          $delete_vars = explode("#", $_POST['usernametonuke']);
          $stmt = $db->prepare('SELECT * FROM blogeintrag AS bl JOIN bilder AS bi ON bl.blid = bi.blogid WHERE bl.ersteller = ?');
          $stmt->bind_param("s", $delete_vars[0]);
          $stmt->execute();
          $results_bilder = $stmt->get_result();
          $r_bild = $results_bilder->fetch_assoc();

          while(!empty($r_bild)){
               unlink($r_bild['bildklein']);
               unlink($r_bild['bildgross']);
               $r_bild = $results_bilder->fetch_assoc();
          }
          $stmt->close();

          $stmt = $db->prepare('DELETE FROM blogeintrag WHERE ersteller = ?');
          $stmt->bind_param("s", $delete_vars[0]);
          $stmt->execute();
          $stmt->close();

          $stmt = $db->prepare('DELETE FROM likes WHERE liker = ?');
          $stmt->bind_param("s", $delete_vars[0]);
          $stmt->execute();
          $stmt->close();

          $stmt = $db->prepare('DELETE FROM kommentar WHERE ersteller = ?');
          $stmt->bind_param("s", $delete_vars[0]);
          $stmt->execute();
          $stmt->close();

          $userlistfile = fopen($filename_ul, "w") or die('Unable to open userlist!');
          $usercount = 0;
          for($op = 0; $op<sizeof($GLOBALS['userlist']); $op++){
               $userstring = $usercount."#".$GLOBALS['userlist'][$op]['username']."#".$GLOBALS['userlist'][$op]['pw_hash']."#".$GLOBALS['userlist'][$op]['role']."#\n";

               if( $delete_vars[0] != $GLOBALS['userlist'][$op]['username'] ){
                    fwrite($userlistfile, $userstring);
                    $usercount++;
               }
          }
          fclose($userlistfile);

     }

     $db->close();
     header("Location:blog");
?>
