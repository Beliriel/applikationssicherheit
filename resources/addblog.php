<?php
     $db = new mysqli($GLOBALS["db"]["host"],$GLOBALS["db"]["username"],$GLOBALS["db"]["password"],$GLOBALS["db"]["dbname"]);

     $stmt = $db->prepare('INSERT INTO blogeintrag (blid, datum, blogtitel, blogtext, ersteller) VALUES (null, ?, ?, ?, ?)');
     $stmt->bind_param("ssss", $var1, $var2, $var3, $var4);
     $var1 = date("d.m.Y");
     $var2 = htmlspecialchars($_POST['blogtitle']);
     $var3 = htmlspecialchars($_POST['blogtext']);
     $var4 = $_SESSION['userdata']['username'];
     //$blogstring = $_SESSION['userdata']['username']."#".date("d.m.Y")."#".$_POST['blogtitle']."#".$_POST['blogtext']."\n";
     $stmt->execute();
     $stmt->close();

     $result_id = $db->query('SELECT blid FROM blogeintrag ORDER BY blid DESC LIMIT 1');
     $row = $result_id->fetch_row();
     if($row != null){
          $blog_id = $row[0];
     }


     if( isset($_SESSION['bilder']) && !empty($_SESSION['bilder']) ){
          //bilder upload

          for($it=0; $it<sizeof( $_SESSION['bilder'] ); $it++){
               if( file_exists($_SESSION['bilder'][$it]['tmp_name']) ){
                    $randnr = mt_rand(1000, 9999);
                    $big_pic = 'big'.$randnr.$_SESSION['bilder'][$it]['name'];
                    $small_pic = 'small'.$randnr.$_SESSION['bilder'][$it]['name'];
                    $filenamepath = '../bilder/';
                    //move_uploaded_file( $_SESSION['bilder'][$it]['tmp_name'], $filenamepath);
                    resample_width($_SESSION['bilder'][$it]['tmp_name'], $filenamepath.$small_pic, 100);
                    resample_width($_SESSION['bilder'][$it]['tmp_name'], $filenamepath.$big_pic, 1000);

                    $stmt = $db->prepare('INSERT INTO bilder (imid, bildklein, bildgross, beschreibung, blogid) VALUES (null, ?, ?, ?, ?)');
                    $stmt->bind_param("sssi", $var1, $var2, $var3, $blog_id);
                    $var1 =  $filenamepath.$small_pic;
                    $var2 = $filenamepath.$big_pic;
                    $var3 = $_SESSION['bilder'][$it]['beschreibung'];
                    $stmt->execute();
                    $stmt->close();

                    unlink('../bildertemp/'.$_SESSION['bilder'][$it]['name']);
               }
          }

     }

     $db->close();

     unset($_SESSION['bilder']);
     header("Location:blog");
?>
