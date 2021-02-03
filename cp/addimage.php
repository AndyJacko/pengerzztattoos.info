<?php session_start(); ?>
<?php if (!isset($_SESSION['Username'])) { header("Location: /cp/?s=3"); } ?>
<?php
if (isset($_FILES["addimg"])) {  
  $target_dir = "../images/temp/";
  $target_file = $target_dir . basename($_FILES["addimg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $savename = $target_dir.$_FILES["addimg"]["name"];
  
  $check = getimagesize($_FILES["addimg"]["tmp_name"]);
  if($check !== false) {
      $uploadOk = 1;
  } else {
      $uploadOk = 0;
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $uploadOk = 0;
  }
  if ($uploadOk == 1) {
    move_uploaded_file($_FILES["addimg"]["tmp_name"], $savename);
  }
  
  $usrCode = date("YmdHis");
  $newfile = $usrCode.".".$imageFileType;
    
  if (file_exists("../images/tattoos/m/".$newfile)) {
    unlink("../images/tattoos/m/".$newfile);
    unlink("../images/tattoos/t/".$newfile);       
    copy($savename, "../images/tattoos/m/".$newfile);
  } else {
    copy($savename, "../images/tattoos/m/".$newfile);
  }
  
  unlink($savename);  
  
  $mainwidth = 100;
  $mainheight = 100;
  list($width, $height) = getimagesize("../images/tattoos/m/".$newfile);
  
  $source = imagecreatefromjpeg("../images/tattoos/m/".$newfile);
  $resizedimg = imagescale($source, 800);
  imagejpeg($resizedimg,"../images/tattoos/m/".$newfile);
  
  $srcx = 0;
  $srcy = 0;
  $thumb = imagecreatetruecolor($mainwidth, $mainheight);
  if ($width > $height) {
    $srcx = ceil(($width - $height) /2);
    $srcy = 0;
    imagecopyresampled($thumb, $source, 0, 0, $srcx, $srcy, $mainwidth, $mainheight, $height, $height);
  } else {
    $srcx = 0;
    $srcy = ceil(($height - $width) /2);
    imagecopyresampled($thumb, $source, 0, 0, $srcx, $srcy, $mainwidth, $mainheight, $width, $width);
  }

  imagejpeg($thumb,"../images/tattoos/t/".$newfile);
  
  $stamp = imagecreatefrompng("../images/watermark.png");
  $im = imagecreatefromjpeg("../images/tattoos/m/".$newfile);

  imagecopy($im, $stamp, (imagesx($im) - imagesx($stamp)), (imagesy($im) - imagesy($stamp)), 0, 0, imagesx($stamp), imagesy($stamp));

  imagejpeg($im,"../images/tattoos/m/".$newfile);
  imagedestroy($im);
  
  header("Location: /cp/managegallery.php?s=1");
}
?>