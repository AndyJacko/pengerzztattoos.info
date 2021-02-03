<?php require_once('dbCon.php'); ?>
<?php session_start(); ?>
<?php if (!isset($_SESSION['Username'])) { header("Location: /cp/?s=3"); } ?>
<?php
$g_img = array_diff(scandir("../images/tattoos/t/", 1), array('..', '.'));
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$total = count($g_img);
$limit = 30;  
$totalPages = ceil($total/ $limit);
$page = max($page, 1);
$page = min($page, $totalPages);
$offset = ($page - 1) * $limit;
if($offset < 0) $offset = 0;
$g_img = array_slice($g_img, $offset, $limit);
$link = "managegallery2.php?page=";
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
    <section id="images" class="container-fluid py-4">      
      <div class="row d-flex justify-content-center w-75 m-auto text-center mt-5">
        <h2 class="text-uppercase mt-5">Add An Image</h2>
        <div class="title-hr py-3"><hr><i class="far fa-image"></i><hr></div>
        <form action="addimage.php" method="POST" enctype="multipart/form-data" class="col-md-8 col-lg-6">
          <label class="visually-hidden" for="addimg">Add Image</label>
          <div class="input-group">
            <div class="input-group-text"><i class="far fa-image"></i></div>
            <input type="file" name="addimg" class="form-control" id="addimg" placeholder="Add Image" required>
            <button type="submit" class="btn btn-danger">GO</button>
          </div>
        </form>
      </div>      
      
      <div class="row d-flex justify-content-center w-75 m-auto text-center mt-5">
        <h2 class="text-uppercase">Manage Image Gallery</h2>
        <div class="title-hr py-3"><hr><i class="far fa-images"></i><hr></div>
        <h4 class="text-uppercase"><?php if ($_GET['s'] == 1){ echo "New Image Added Successfully"; } ?><?php if ($_GET['s'] == 2){ echo "Image Deleted Successfully"; } ?></h4>
        <?php foreach ($g_img as $img) { ?>
        <div class="col-6 col-sm-3 col-md-2 col-lg-1 p-2">        
          <img src="/images/tattoos/t/<?php echo $img; ?>" class="img-fluid m-1 img-thumbnail"><br>
          <div class="cp-hr"><a href="delimage.php?img=<?php echo $img; ?>"><i class="fas fa-trash-alt"></i></a></div>
        </div>
        <?php } ?>
      </div>
      
      <div class="row d-flex justify-content-center w-75 m-auto text-center mt-5">
        <?php if($totalPages != 0) { ?>  
        <nav class="mt-3" aria-label="Gallery Page Navigation">
          <ul class="pagination pagination-sm justify-content-center">
            <li class="page-item<?php if ($page == 1) { echo " disabled"; } ?>"><a class="page-link" href="<?php echo $link.($page - 1);?>" aria-label="Previous"><i class="fas fa-angle-double-left"></i></a></li>
            <?php for ($j = 1; $j <= $totalPages; $j++) { ?>
            <li class="page-item<?php if ($page == $j) { echo " active"; } ?>"><a class="page-link" href="<?php echo $link.$j;?>" aria-label="Page <?php echo $j; ?>"><?php echo $j; ?></a></li>
            <?php } ?>
            <li class="page-item<?php if ($page == $totalPages) { echo " disabled"; } ?>"><a class="page-link" href="<?php echo $link.($page + 1); ?>" aria-label="Next"><i class="fas fa-angle-double-right"></i></a></li>
          </ul>
        </nav>
        <?php } ?>
      </div>
    </section>
    
    <?php include("../footer.php");?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
<?php mysqli_close($conn); ?>
