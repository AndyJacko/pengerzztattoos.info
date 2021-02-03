<?php require_once('dbCon.php'); ?>
<?php session_start(); ?>
<?php if (!isset($_SESSION['Username'])) { header("Location: /cp/?s=3"); } ?>
<?php
if (isset($_POST['ytcode'])) {
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $sql = "INSERT INTO tbl_videos (vid_url) VALUES ('". $_POST['ytcode'] ."')";
  mysqli_query($conn, $sql);
  mysqli_close($conn);  
  header("Location: /cp/managevideos.php?s=1");
}
?>