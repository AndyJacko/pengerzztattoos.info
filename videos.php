<?php 
include("cp/dbCon.php");
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM tbl_videos LIMIT 1";
$result = mysqli_query($conn, $sql);
?>

    <section id="videos" class="container-fluid bg-dark bg-gradient py-4">
      <div class="w-75 m-auto text-center mt-5">
        <h2 class="text-uppercase">Latest Video</h2>
        <div class="title-hr py-3"><hr><i class="fa fa-video"></i><hr></div>
        <?php if (mysqli_num_rows($result) > 0) { $row = mysqli_fetch_assoc($result); ?>
        <div class="video-container">
          <iframe src="https://www.youtube.com/embed/<?php echo $row["vid_url"]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <?php } ?>
        <p class="pt-5"><a href="allvideos.php" class="btn btn-sm btn-danger text-uppercase">View All Videos</a></p>
      </div>
    </section>
<?php mysqli_close($conn); ?>
