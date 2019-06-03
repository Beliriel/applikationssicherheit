<?php
     //read_bloglist();
     read_blogdb();
?>



<div id="content">
     <?php if(!empty($_SESSION['login']) && $_SESSION['login']){
               if($_SESSION['userdata']['role']=="Admin"){
                    //$_SESSION['nukelist'] = $GLOBALS['userlist'];
                    echo '<form action="nuke" method="post">
                                   <select  class="black-font" name="usernametonuke" id="usernametonuke">';
                                   for($nu = 0; $nu<sizeof($GLOBALS['userlist']); $nu++){
                                        echo '<option  class="black-font" value="'.$GLOBALS['userlist'][$nu]['username']."#".$nu.'">'.$GLOBALS['userlist'][$nu]['username'].'</option>';
                                   }
                    echo '         </select>
                                   <input class="black-font" type="submit" name="nukebutton" id="btn_nuke" value="Nuke user!"/>
                                   <input class="black-font" type="submit" name="nukebutton" id="btn_nuke" value="NUKE ALL!"/>
                         </form>';
               }
               echo '<form action="addblog" method="post">
                              <input class="black-font" type="text" name="blogtitle" id="blogtitle" placeholder="title"/>
                              <br/>
                              <textarea class="black-font" name="blogtext" id="blogtext" placeholder="blogtext" ></textarea>
                              <br/>
                              <input class="black-font" type="submit" id="btn_send_blog"/>
                    </form>';

                    echo '<form action="fileupload" method="post" enctype="multipart/form-data">
                                   <input class="black-font" type="text" name="bildbeschreibung" id="bildbeschreibung" placeholder="Beschreibung"/>
                                   <br/>
                                   <input type="file" name="userfile" class="black-font" accept="image/*">
                                   <br/>
                                   <input class="black-font" type="submit" id="btn_send_blog"/>
                         </form>';
                    if(!empty( $_SESSION['bilder']) && $_SESSION['bilder']!=NULL ){
                         for($p = 0; $p<sizeof($_SESSION['bilder']); $p++){
                              echo $_SESSION['bilder'][$p]['name']." <br/>".$_SESSION['bilder'][$p]['beschreibung'];
                         }
                    }
               }
     ?>
          <?php
               $db = new mysqli($GLOBALS["db"]["host"],$GLOBALS["db"]["username"],$GLOBALS["db"]["password"],$GLOBALS["db"]["dbname"]);

               for($i=sizeof($GLOBALS['bloglist'])-1; $i>=0; $i--)
               {
                    $stmt = $db->prepare('SELECT * FROM bilder where blogid = ?');
                    $stmt->bind_param('i', $GLOBALS['bloglist'][$i]['blid']);
                    $stmt->execute();
                    $results = $stmt->get_result();
                    $row = $results->fetch_assoc();

                    unset($displaybilderpaths);
                    $displaybilderpaths = array();
                    while($row != null){
                         array_push($displaybilderpaths, $row);
                         $row = $results->fetch_assoc();
                    }
                    $stmt->close();

                    for($k=0; $k<sizeof($displaybilderpaths); $k++){
                         $_SESSION['bildcounter'] = $k;
                         $_SESSION['bildpath'] = $displaybilderpaths[$k]['bildklein'];
                         $_POST['bildpath'] = $_SESSION['bildpath'];
                         echo '<img onclick="showbigpicture('.$displaybilderpaths[$k]['imid'].')" id="blog_image_small_'.$displaybilderpaths[$k]['imid'].'" src="bild?'.$displaybilderpaths[$k]['imid'].'?small" />';
                         echo '<img style="display:none" onclick="showsmallpicture('.$displaybilderpaths[$k]['imid'].')" id="blog_image_big_'.$displaybilderpaths[$k]['imid'].'" src="bild?'.$displaybilderpaths[$k]['imid'].'?big" />';
                         echo "<br/>";
                         //echo '<p>'.$_SESSION['bildpath'].'</p>';
                         echo '<p>'.$displaybilderpaths[$k]['beschreibung'].'</p>';
                    }

                    //<img id="img_neuron_bottom1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Complete_neuron_cell_diagram_en.svg/1280px-Complete_neuron_cell_diagram_en.svg.png" alt="Bild eines Neurons"/>
                   echo '<div class="section_basics" id="blocks">
                      <h2>'.$GLOBALS['bloglist'][$i]['blogtitle'].'</h2>
                      <p>'.$GLOBALS['bloglist'][$i]['blogtext'].'</p>
                      <h3>Author: '.$GLOBALS['bloglist'][$i]['username'].'</h3>
                      <h4>Datum: '.$GLOBALS['bloglist'][$i]['date']." <br/> ".$GLOBALS['bloglist'][$i]['likes'].' Likes</h4>
                      </div>';
                      for($ko=0; $ko<sizeof($GLOBALS['bloglist'][$i]['kommentar']); $ko++){
                           echo  '<p>'.$GLOBALS['bloglist'][$i]['kommentar'][$ko]['datum']." : ".$GLOBALS['bloglist'][$i]['kommentar'][$ko]['ersteller'].'
                                   <br/>'.$GLOBALS['bloglist'][$i]['kommentar'][$ko]['kommentartext'].'</p>';
                                    if($GLOBALS['bloglist'][$i]['username']==$_SESSION['userdata']['username']){
                                          echo '<form action="commentblog" method="post">
                                          <input class="black-font" style="display:none" type="text" name="thecommentid" id="thecommentgid_co" value="'.$GLOBALS['bloglist'][$i]['kommentar'][$ko]['kid'].'"/>
                                                  <input class="black-font" type="submit" name="comment_blog" id="btn_comment_blog" value="delete"/>
                                                  </form>';
                                    }
                      }

                      if($GLOBALS['bloglist'][$i]['username']==$_SESSION['userdata']['username']){
                           echo '<form action="changeblog" method="post">
                                          <input class="black-font" type="text" name="ch_blogtitel" id="ch_blogtitel" placeholder="title"/>
                                          <input class="black-font" style="display:none" type="text" name="theblogid" id="theblogid_ch" value="'.$GLOBALS['bloglist'][$i]['blid'].'"/>
                                          <br/>
                                          <textarea class="black-font" name="ch_blogtext" id="blogtext" placeholder="blogtext" ></textarea>
                                          <br/>
                                          <input class="black-font" type="submit" name="change_blog" id="btn_change_blog" value="change"/>';


                         for($delb=0; $delb<sizeof($displaybilderpaths); $delb++){
                              echo '<div>
                                   <input type="radio" name="delete_elements" id="delete_elements" value="b,'.$displaybilderpaths[$delb]['imid'].'"/>
                                      <label for="delete_elements">Bild '.($delb+1).' löschen</label>
                                     </div>';
                         }
                         echo '<div>
                                   <input type="radio" name="delete_elements" id="delete_elements" value="a,'.$GLOBALS['bloglist'][$i]['blid'].'"/>
                                   <label for="delete_elements">Ganzer Blogeintrag löschen</label>
                                   </div>';
                         echo '<input class="black-font" type="submit" name="change_blog" id="btn_change_blog" value="delete"/>';
                         echo '</form>';
                    } else {
                         echo '<form action="commentblog" method="post">
                                        <input class="black-font" style="display:none" type="text" name="theblogid" id="theblogid_co" value="'.$GLOBALS['bloglist'][$i]['blid'].'"/>
                                        <br/>
                                        <textarea class="black-font" name="commenttext" id="blogtext" placeholder="Hier Kommentar eingeben" ></textarea>
                                        <br/>
                                        <input class="black-font" type="submit" name="comment_blog" id="btn_comment_blog" value="comment"/>
                                        <input class="black-font" type="submit" name="comment_blog" id="btn_comment_blog" value="like"/>
                              </form>';

                    }
               }
               $db->close();
          ?>

</div>
