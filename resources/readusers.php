<?php
     function read_userlist(){
          $filename_ul = '../userlist.txt';
          $userlist = fopen( $filename_ul, "r" ) or die('Unable to open userlist for reading!');
          $filecontents = fread( $userlist, filesize($filename_ul) );
          $rows = explode("\n", $filecontents);

          $GLOBALS['userlist'] = array();
          $GLOBALS['usercount'] = 0;


          for($i=0; $i<sizeof($rows); $i++){
               $record_arr = explode('#', $rows[$i]);
               if($record_arr[0] != NULL){             //null werte werden ausgelassen
                    $record = array(
                              "ID"=>$record_arr[0],
                              "username"=>$record_arr[1],
                              "pw_hash"=>$record_arr[2],
                              "role"=>$record_arr[3],
                         );
                    array_push($GLOBALS['userlist'], $record);
                    $GLOBALS['usercount']++;
               }
          }

          //var_dump($GLOBALS['userlist']);
          fclose($userlist);
     }

     function read_userlist_db(){
          $filename_ul = '../userlist.txt';
          $userlist = fopen( $filename_ul, "r" ) or die('Unable to open userlist for reading!');
          $filecontents = fread( $userlist, filesize($filename_ul) );
          $rows = explode("\n", $filecontents);

          $GLOBALS['userlist'] = array();
          $GLOBALS['usercount'] = 0;


          for($i=0; $i<sizeof($rows); $i++){
               $record_arr = explode('#', $rows[$i]);
               if($record_arr[0] != NULL){             //null werte werden ausgelassen
                    $record = array(
                              "ID"=>$record_arr[0],
                              "username"=>$record_arr[1],
                              "pw_hash"=>$record_arr[2],
                              "role"=>$record_arr[3],
                         );
                    array_push($GLOBALS['userlist'], $record);
                    $GLOBALS['usercount']++;
               }
          }

          //var_dump($GLOBALS['userlist']);
          fclose($userlist);
     }


?>
