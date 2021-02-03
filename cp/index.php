<?php require_once('dbCon.php'); ?>
<?php session_start(); ?>
<?php
if (isset($_POST['Username'])) {
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $loginSQL = "SELECT * FROM tbl_admin WHERE admin_user='".$_POST['Username']."' LIMIT 1";
  $LoginRS = mysqli_query($conn, $loginSQL);
  mysqli_close($conn);
  
  if (mysqli_num_rows($LoginRS) > 0) {
    $row = mysqli_fetch_assoc($LoginRS);    
    $hash = $row["admin_pass"];
    $pass = $_POST['Password'];    
    if (password_verify($pass, $hash)) {
      $_SESSION['Username'] = $_POST['Username'];
      header("Location: /cp/cpmain.php");     
    } else {
      incorrectUsr();
    }
  }
  else {
    incorrectUsr();
  }
}

function incorrectUsr() {
  session_unset();
  session_destroy();
  header("Location: /cp/?s=1");
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unauthorised Access Not Permitted</title>
    <script src="https://kit.fontawesome.com/8692751f21.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/scripts/css/pengerzztattoos.css" type="text/css">
  </head>

  <body>    
    <section id="login" class="container-fluid py-4">
      <div class="w-75 m-auto text-center mt-5">
        <h2 class="text-uppercase">Login To Controlpanel</h2>
        <div class="title-hr py-3"><hr><i class="fas fa-cogs"></i><hr></div>
  
         <h4 class="text-uppercase">
          <?php
          if (isset($_GET['s'])){            
            switch ($_GET['s']) {
            case 1:
              echo "Sorry, the details you entered were incorrect";
              break;
            case 2:
              echo "To log back in, please re-enter your details";
              break;
            case 3:
              echo "Sorry, you are not authorised to view that page unless you login first";
              break;          
            }
          }
          ?>      
        </h4>       
        
        <form class="w-50 m-auto text-center" method="POST">          
          <input id="username" name="Username" class="form-control form-control-sm my-2" type="text" placeholder="Enter Username" aria-label="Username">
          <input id="password" name="Password" class="form-control form-control-sm my-2" type="password" placeholder="Enter Password" aria-label="Password">
          <button type="submit" class="btn btn-danger btn-sm my-2">LOGIN</button>
        </form>        

      </div>  
    </section>       
    <?php include("../footer.php");?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>