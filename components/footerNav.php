<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<nav class="navbar navbar-expand nav-footer bg-dark footer" data-bs-theme="dark">
    <div class="container-fluid">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
            <a class="nav-link text-center" aria-current="page" href="index.php">
                <i class="bi bi-house icon"></i>
                <p class="icon-text">Adnijo.hu</p>
            </a>
        </li>
        <?php 
            if (!isset($_SESSION["uname"])) {
                echo '  <li class="nav-item">
                            <a class="nav-link text-center" href="login.php">
                                <i class="bi bi-box-arrow-in-right icon"></i>
                                <p class="icon-text">Belépés</p>
                            </a>
                        </li>';
                echo '  <li class="nav-item">
                            <a class="nav-link text-center" href="signup.php">
                                <i class="bi bi-person-plus icon"></i>
                                <p class="icon-text">Regisztráció</p>
                            </a>
                        </li>';
            }
            else {
                echo '  <li class="nav-item">
                            <a class="nav-link text-center" href="#">
                                <i class="bi bi-box2 icon"></i>
                                <p class="icon-text">Termékek</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="#">
                                <i class="bi bi-person icon"></i>
                                <p class="icon-text">Fiókom</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="logout.php">
                                <i class="bi bi-box-arrow-right icon"></i>
                                <p class="icon-text">Kilépés</p>
                            </a>
                        </li>';
            }
        ?>

        
        <?php 
            if (isset($_SESSION["type"])) {
                if ($_SESSION["type"] == "admin") {
                    echo '  <li class="nav-item">
                                <a class="nav-link text-center" href="admin.php">
                                    <i class="bi bi-cpu icon"></i>
                                    <p class="icon-text">Admin</p>
                                </a>
                            </li>';
                }
            }
        ?>
      </ul>
  </div>
</nav>