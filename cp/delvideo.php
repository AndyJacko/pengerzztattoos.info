<?php require_once('dbCon.php'); ?>
<?php session_start(); ?>
<?php if (!isset($_SESSION['Username'])) { header("Location: /cp/?s=3"); } ?>
<?php
if (isset($_GET['tbl_id'])) {
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $sql = "DELETE FROM tbl_videos WHERE tbl_id = (". $_GET['tbl_id'] .")";
  mysqli_query($conn, $sql);
  mysqli_close($conn);  
  header("Location: /cp/managevideos.php?s=2");
}
?>