  <section id="gallery" class="container-fluid text-center">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <br><br><br>
        <h1>MY LATEST TATTOOS</h1>
        <h2>MULTI AWARD WINNING TATTOO ARTIST</h2>
        <div class="hbar"><i class="fa fa-camera-retro"></i></div>
        <?php 
          $g_img = scandir("images/tattoos/t/", 1);
          $arrayLength = count($g_img);
          if ($arrayLength>31) {$arrayLength = 32;}
          for ($i=0;$i<$arrayLength-2;$i++) { ?>
            <a href="/images/tattoos/m/<?php echo $g_img[$i]; ?>" data-lightbox="t_gallery"><img src="/images/tattoos/t/<?php echo $g_img[$i]; ?>" class="img-fluid img-thumbnail m-1"></a>
        <?php } ?>
        <br><br>
        <p><a href="fullgallery.php" class="btn btn-sm btn-danger">VIEW FULL GALLERY</a></p>
        <br><br>
      </div>
    </div>
  </section>