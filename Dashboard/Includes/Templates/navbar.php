<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Qowa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="app">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><?php echo lo('HOME') ?></a>
        </li>
        <li> <a class="nav-link" href="catogery.php"><?php echo lo('CATEGORTES'); ?>     </a> </li>
        <li> <a class="nav-link" href="#"> <?php echo lo('ITEMS'); ?>      </a> </li>
        <li> <a class="nav-link" href="member.php"> <?php echo lo('MEMBER'); ?>     </a> </li>
        <li> <a class="nav-link" href="#"> <?php echo lo('STATISTICS'); ?> </a> </li>
        <li> <a class="nav-link" href="#"> <?php echo lo('LOGS'); ?>       </a> </li>
      </ul>
      <ul class="nav navbar-nav navbar-right ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo lo('ADMIN'); ?> 
                </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="member.php?do=Edit&user=<?php echo $_SESSION["ID"];?>">Edit Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="loug.php"> Loug out</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>