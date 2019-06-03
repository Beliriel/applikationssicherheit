<?php
     function read_bloglist(){
          $filename_ul = '../blogs.txt';
          $bloglist = fopen( $filename_ul, "r" ) or die('Unable to open userlist for reading!');
          $filecontents = fread( $bloglist, filesize($filename_ul) );
          $rows = explode("\n", $filecontents);

          $GLOBALS['bloglist'] = array();
          $GLOBALS['blogcount'] = 0;


          for($i=0; $i<sizeof($rows); $i++){
               $record_arr = explode('#', $rows[$i]);
               if($record_arr[0] != NULL){             //null werte werden ausgelassen
                    $record = array(
                              "username"=>$record_arr[0],
                              "date"=>$record_arr[1],
                              "blogtitle"=>$record_arr[2],
                              "blogtext"=>$record_arr[3],
                         );
                    array_push($GLOBALS['bloglist'], $record);
                    $GLOBALS['blogcount']++;
               }
          }

          //var_dump($GLOBALS['userlist']);
          fclose($bloglist);
     }


     function read_blogdb(){
          $db = new mysqli($GLOBALS["db"]["host"],$GLOBALS["db"]["username"],$GLOBALS["db"]["password"],$GLOBALS["db"]["dbname"]);
          $stmt = $db->prepare('SELECT * FROM blogeintrag');
          $stmt->execute();
          $results = $stmt->get_result();
          $row = $results->fetch_assoc();
          $stmt->close();


          $GLOBALS['bloglist'] = array();
          $GLOBALS['blogcount'] = 0;

          while($row != NULL){

               $stmt = $db->prepare('SELECT * FROM kommentar WHERE blogid = ?');
               $stmt->bind_param('i', $row['blid']);
               $stmt->execute();
               $com_results = $stmt->get_result();
               $com_row = $com_results->fetch_assoc();
               $com_array = array();
               while($com_row != null){
                    array_push($com_array, $com_row);
                    $com_row = $com_results->fetch_assoc();
               }
               $stmt->close();

               $stmt = $db->prepare('SELECT COUNT(*) FROM likes WHERE idblog = ?');
               $stmt->bind_param('i', $row['blid']);
               $stmt->execute();
               $likes_results = $stmt->get_result();
               $likes_row = $likes_results->fetch_array();
               $stmt->close();

               $record = array(
                    "username"=>$row['ersteller'],
                    "date"=>$row['datum'],
                    "blogtitle"=>$row['blogtitel'],
                    "blogtext"=>$row['blogtext'],
                    "blid"=>$row['blid'],
                    "kommentar"=>$com_array,
                    "likes"=>$likes_row[0]
               );

               array_push($GLOBALS['bloglist'], $record);
               $GLOBALS['blogcount']++;
               $row = $results->fetch_assoc();
          }

     }


?>
