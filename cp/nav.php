
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" aria-label="Main Page Navigation">
      <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#pengNav" aria-controls="pengNav" aria-expanded="false" aria-label="Toggle Navigation">
        <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand" href="/" aria-current="page"><h4>Pengerzz Tattoos</h4></a>
      <div class="collapse navbar-collapse" id="pengNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="cpmain.php">CP HOME</a></li>
          <li class="nav-item"><a class="nav-link" href="managevideos.php">VIDEOS</a></li>
          <li class="nav-item"><a class="nav-link" href="managegallery.php">GALLERY</a></li>
          <?php if (isset($_SESSION['Username'])) { ?>
          <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>        
          <?php } ?>
        </ul>
      </div>
      </div>
    </nav>
