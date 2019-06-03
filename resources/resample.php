<?php
     function resample_width($filepath, $new_filepath, $imagewidth){
          list($width, $height) = getimagesize($filepath);
          $new_width = $imagewidth;
          $new_height = ($height * $imagewidth) / $width;

          $im = imagecreatefromjpeg($filepath);
          $is_png = false;
          if(!$im){
               $im = imagecreatefrompng($filepath);
               $is_png = true;
          }

          $newim = imagecreatetruecolor($new_width, $new_height);
          imagecopyresampled($newim, $im, 0,0,0,0, $new_width, $new_height, $width, $height);

          imagejpeg($newim, $new_filepath, 100);

     }
?>
