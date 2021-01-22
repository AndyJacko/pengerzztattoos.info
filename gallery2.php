<?php
$g_img = array_diff(scandir("images/tattoos/t/", 1), array('..', '.'));
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$total = count($g_img);
$limit = 30;  
$totalPages = ceil($total/ $limit);
$page = max($page, 1);
$page = min($page, $totalPages);
$offset = ($page - 1) * $limit;
if( $offset < 0 ) $offset = 0;
$g_img = array_slice($g_img, $offset, $limit);
$link = "fullgallery2.php?page=";
?>

    <section id="gallery" class="container-fluid bg-gradient py-4">
      <div class="w-75 m-auto text-center mt-5">
        <h2>TATTOO GALLERY</h2>        
        <div class="title-hr py-3"><hr><i class="far fa-images"></i><hr></div>
        <?php for ($i = 0; $i < count($g_img); $i++) { ?>
<a href="" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-img="<?php echo $g_img[$i]; ?>"><img src="/images/tattoos/t/<?php echo $g_img[$i]; ?>" class="img-fluid m-1 img-thumbnail"></a>
        <?php } ?>
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
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">           
              <div class="modal-body">
                <a data-bs-dismiss="modal" aria-label="Close"><img src="" class="img-fluid m-1 img-thumbnail"></a>
              </div>
            </div>
          </div>
        </div> 
      </div>   
      <script src="scripts/js/pengerzztattoos.js"></script>
    </section>
