<?php
     ob_clean();
     $dbb = new mysqli($GLOBALS["db"]["host"],$GLOBALS["db"]["username"],$GLOBALS["db"]["password"],$GLOBALS["db"]["dbname"]);

     $stmt = $dbb->prepare('SELECT * FROM bilder WHERE imid = ?');
     $stmt->bind_param("i", $_POST['imid']);
     $stmt->execute();
     $resultingimage = $stmt->get_result();
     $imagerow = $resultingimage->fetch_assoc();

     //var_dump($_POST['imid']);
     //var_dump($imagerow);
     if($_POST['imsize'] == "small"){
          $imageres = imagecreatefromjpeg($imagerow['bildklein']);//$_SESSION['bildpath']
     } else {
          $imageres = imagecreatefromjpeg($imagerow['bildgross']);
     }
     /*if(file_exists($_SESSION['bildpath'])){
          echo "FILE DOES EXIST";
     } else {
          echo "FUCK!";
     }*/
     header('Content-Type: image/jpeg');

     ob_start();
     imagejpeg($imageres);
     //readfile($_SESSION['bildpath']);
     ob_end_flush();
     $stmt->close();
     $dbb->close();
?>
