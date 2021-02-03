<?php session_start(); ?>
<?php if (!isset($_SESSION['Username'])) { header("Location: /cp/?s=3"); } ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controlpanel</title>
    <script src="https://kit.fontawesome.com/8692751f21.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/scripts/css/pengerzztattoos.css" type="text/css">
  </head>

  <body>
    <?php include("nav.php");?>
    
    <section id="quickadd" class="container-fluid py-4">
      <div class="row d-flex justify-content-center w-75 m-auto text-center mt-5">        
        <h2 class="text-uppercase mt-5">Add A Video</h2>
        <div class="title-hr py-3"><hr><i class="fa fa-video"></i><hr></div>            
          <form action="addvideo.php" method="POST" class="col-md-8 col-lg-6">
            <label class="visually-hidden" for="ytcode">YouTube Code</label>
            <div class="input-group">
              <div class="input-group-text"><i class="fab fa-youtube"></i></div>
              <input type="text" name="ytcode" class="form-control form-control-sm" id="ytcode" placeholder="YouTube Code" required>
              <button type="submit" class="btn btn-danger">GO</button>
            </div> 
          </form>
        </div>     
      
       <div class="row d-flex justify-content-center w-75 m-auto text-center mt-5">
        <h2 class="text-uppercase">Add An Image</h2>
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
    </section>    
    
    <?php include("../footer.php");?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>