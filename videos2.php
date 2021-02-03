<?php 
include("cp/dbCon.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM tbl_videos";
$result = mysqli_query($conn, $sql);
?>

    <section id="videos" class="container-fluid py-4">
      <div class="row d-flex justify-content-center w-75 m-auto text-center mt-5">
        <h2 class="text-uppercase">Video Gallery</h2>
        <div class="title-hr py-3"><hr><i class="fa fa-video"></i><hr></div>
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
  <div class="col-md-6 p-2">
          <div class="video-container">
            <iframe src="https://www.youtube.com/embed/<?php echo $row["vid_url"]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      <?php } ?>
        <p class="pt-5"><a href="/#videos" class="btn btn-sm btn-danger text-uppercase">Back To Latest Video</a></p>
</div>
    </section>
<?php mysqli_close($conn); ?>
