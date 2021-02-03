<?php session_start(); ?>
<?php if (!isset($_SESSION['Username'])) { header("Location: /cp/?s=3"); } ?>
<?php
if (isset($_GET['img'])) {
  unlink("../images/tattoos/m/".$_GET['img']);
  unlink("../images/tattoos/t/".$_GET['img']);
  header("Location: /cp/managegallery.php?s=2");
}
?>