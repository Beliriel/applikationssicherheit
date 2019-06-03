<?php
     $db = new mysqli($GLOBALS["db"]["host"],$GLOBALS["db"]["username"],$GLOBALS["db"]["password"],$GLOBALS["db"]["dbname"]);

     var_dump($_POST);
     if($_POST['comment_blog']=="comment"){

          if(empty( $_POST['commenttext']) ){
               header("Location:error");
          } else {
               $stmt = $db->prepare('INSERT INTO kommentar (kid, datum, kommentartext, ersteller, blogid) VALUES (null, ?, ?, ?, ?)');
               $stmt->bind_param("sssi", $var1, $var2, $var3, $var4);
               $var1 = date("d.m.Y");
               $var2 = htmlspecialchars($_POST['commenttext']);
               $var3 = $_SESSION['userdata']['username'];
               $var4 = $_POST['theblogid'];
          }
          $stmt->execute();
          $stmt->close();
     }
     elseif($_POST['comment_blog']=="like"){
          $stmt = $db->prepare('SELECT * FROM likes WHERE liker = ? AND idblog = ?');
          $stmt->bind_param("si", $var1, $var2);
          $var1 = $_SESSION['userdata']['username'];
          $var2 = $_POST['theblogid'];
          $stmt->execute();
          $res_hasliked = $stmt->get_result();
          $hasliked = $res_hasliked->fetch_assoc();
          $stmt->close();

          if( empty($hasliked) ){
               $stmt = $db->prepare('INSERT INTO likes (Like_ID, idblog, liker) VALUES (null, ?, ?)');
               $stmt->bind_param("is", $var1, $var2);
               $var1 = $_POST['theblogid'];
               $var2 = $_SESSION['userdata']['username'];
               $stmt->execute();
               $stmt->close();
          } else {
               $stmt = $db->prepare('DELETE FROM likes WHERE liker = ? AND idblog = ?');
               $stmt->bind_param("si", $var1, $var2);
               $var1 = $_SESSION['userdata']['username'];
               $var2 = $_POST['theblogid'];
               $stmt->execute();
               $stmt->close();
          }
     }
     elseif($_POST['comment_blog']=="delete"){
          $stmt = $db->prepare('DELETE FROM kommentar WHERE kid = ?');
          $stmt->bind_param("i", $var1);
          $var1 = $_POST['thecommentid'];
          $stmt->execute();
          $stmt->close();
     }

     $db->close();
     header("Location:blog");
?>
