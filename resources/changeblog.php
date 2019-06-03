<?php
     $db = new mysqli($GLOBALS["db"]["host"],$GLOBALS["db"]["username"],$GLOBALS["db"]["password"],$GLOBALS["db"]["dbname"]);

     var_dump($_POST);
     if($_POST['change_blog']=="change"){
          $var1=htmlspecialchars($_POST['ch_blogtext']);
          $var2=htmlspecialchars($_POST['ch_blogtitel']);
          $var3=$_POST['theblogid'];

          if(empty( $_POST['ch_blogtitel']) ){
               $stmt = $db->prepare('UPDATE blogeintrag SET blogtext = ? WHERE blid = ? ');
               $stmt->bind_param("si", $var1, $var3);
          } elseif(empty( $_POST['ch_blogtext']) ){
               $stmt = $db->prepare('UPDATE blogeintrag SET blogtitel = ? WHERE blid = ? ');
               $stmt->bind_param("si", $var2, $var3);
          } else {
               $stmt = $db->prepare('UPDATE blogeintrag SET blogtext = ? , blogtitel = ? WHERE blid = ? ');
               $stmt->bind_param("ssi", $var1, $var2, $var3);
          }
          $stmt->execute();
          $stmt->close();
     }
     elseif($_POST['change_blog']=="delete"){
          $delete_option = explode(",", $_POST['delete_elements']);
          if($delete_option[0]=="b"){
               $stmt = $db->prepare("SELECT * FROM bilder WHERE imid = ?");
               $stmt->bind_param("i", $delete_option[1]);
               $stmt->execute();
               $removing_images_results = $stmt->get_result();
               $unlink_bilder = $removing_images_results->fetch_assoc();
               unlink($unlink_bilder['bildklein']);
               unlink($unlink_bilder['bildgross']);
               $stmt->close();

               $stmt = $db->prepare('DELETE FROM bilder WHERE imid = ?');
          } elseif ($delete_option[0]=="a"){
               $stmt = $db->prepare("SELECT * FROM bilder WHERE blogid = ?");
               $stmt->bind_param("i", $delete_option[1]);
               $stmt->execute();
               $removing_images_results = $stmt->get_result();
               $unlink_bilder = $removing_images_results->fetch_assoc();
               unlink($unlink_bilder['bildklein']);
               unlink($unlink_bilder['bildgross']);
               $stmt->close();

               $stmt = $db->prepare('DELETE FROM blogeintrag WHERE blid = ?');
          }
          $stmt->bind_param("i", $delete_option[1]);
          $stmt->execute();
          $stmt->close();
     }

     $db->close();
     header("Location:blog");
?>
