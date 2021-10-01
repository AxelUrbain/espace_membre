<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Test Wesco</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php
            if(isset($_SESSION['account'])){
                ?>
                    <a class="nav-link" href="account.php">Account</a>
                    <a class="nav-link" href="../../inc/disconnected.php">Disconnected</a>
                <?php
            }
        ?>
      </div>
    </div>
  </div>
</nav>
    