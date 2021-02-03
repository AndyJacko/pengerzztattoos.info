
    <section id="gallery" class="container-fluid bg-secondary bg-gradient py-4">
      <div class="w-75 m-auto text-center mt-5">
        <h2 class="text-uppercase">Latest Tattoos</h2>
        <h4 class="text-uppercase">Multi Award Winning Tattoo Artist</h4>
        <div class="title-hr py-3"><hr><i class="far fa-image"></i><hr></div> 
        <?php 
        $g_img = array_diff(scandir("images/tattoos/t/", 1), array('..', '.'));
        $arrayLength = count($g_img);
        if ($arrayLength > 10) { $arrayLength = 10; }
        for ($i = 0; $i < $arrayLength; $i++) { ?>
<a href="" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="<?php echo $g_img[$i]; ?>"><img src="/images/tattoos/t/<?php echo $g_img[$i]; ?>" class="img-fluid m-1 img-thumbnail"></a>
        <?php } ?>
<p class="pt-5"><a href="fullgallery.php" class="btn btn-sm btn-danger text-uppercase">View Full Gallery</a></p>
        
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">           
              <div class="modal-body">
                <a type="button" data-bs-dismiss="modal" aria-label="Close"><img src="" class="img-fluid img-thumbnail"></a>
              </div>
            </div>
          </div>
        </div>        
      </div>
      <script src="scripts/js/pengerzztattoos.js"></script>
    </section>
