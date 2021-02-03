<?php require_once('dbCon.php'); ?>
<?php session_start(); ?>
<?php if (!isset($_SESSION['Username'])) { header("Location: /cp/?s=3"); } ?>
<?php 
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM tbl_videos";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Video Gallery</title>
    <script src="https://kit.fontawesome.com/8692751f21.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/scripts/css/pengerzztattoos.css" type="text/css">
  </head>

  <body>
    <?php include("nav.php");?>
    
    <section id="videos" class="container-fluid py-4">
      <div class="row d-flex justify-content-center w-75 m-auto text-center mt-5">
        
        <h2 class="text-uppercase mt-5">Add A Video</h2>
        <div class="title-hr py-3"><hr><i class="fa fa-video"></i><hr></div>     
        <form action="addvideo.php" method="POST" class="col-md-8 col-lg-6 mb-5">
          <label class="visually-hidden" for="ytcode">YouTube Code</label>
          <div class="input-group">
            <div class="input-group-text"><i class="fab fa-youtube"></i></div>
            <input type="text" name="ytcode" class="form-control form-control-sm" id="ytcode" placeholder="YouTube Code" required>
            <button type="submit" class="btn btn-danger">GO</button>
          </div> 
        </form>        
        
        <h2 class="text-uppercase">Manage Video Gallery</h2>
        <div class="title-hr py-3"><hr><i class="fa fa-video"></i><hr></div>
        <h4 class="text-uppercase"><?php if ($_GET['s'] == 1){ echo "New Video Added Successfully"; } ?><?php if ($_GET['s'] == 2){ echo "Video Deleted Successfully"; } ?></h4>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
  <div class="col-6 col-md-4 p-2">
          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/<?php echo $row["vid_url"]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="cp-hr py-2"><a href="delvideo.php?tbl_id=<?php echo $row["tbl_id"]; ?>"><i class="fas fa-trash-alt"></i></a></div>
        </div>
      <?php } ?>
</div>
    </section>
    
    <?php include("../footer.php");?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
<?php mysqli_close($conn); ?>
