<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<script src="js/script.js"></script>
<link rel="stylesheet" href="css/style.css">

<nav class="navbar navbar-expand bg-body-tertiary nav-header" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Adnijo.hu</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Főoldal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Termékek</a>
            </li>
            <?php 
              if (!isset($_SESSION["uname"])) {
                echo '<li class="nav-item">
                      <a class="nav-link" href="login.php">Belépés</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="signup.php">Regisztárció</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="logout.php">Kilépés</a>
                    </li>';
              }
              else {
                echo ' <li class="nav-item">
                        <a class="nav-link" onclick="profile('.$_SESSION["id"].')" href="#">Fiókom</a>
                      </li>';
              }

              if (isset($_SESSION["type"])) {
                if ($_SESSION["type"] == "admin") {
                  echo '<li class="nav-item">
                        <a class="nav-link" href="admin/admin.php">Admin</a>
                      </li>';
                }
              }
            ?>
            
        </ul>
        </div>
    </div>
</nav>