<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

<script src="js/script.js"></script>
<link rel="stylesheet" href="css/style.css">


<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Főoldal</a>
    <button class="navbar-toggler feher" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-center" onclick="show('products')" aria-current="page" href="#">
                <i class="bi bi-box2 icon"></i>
                <p class="icon-text">Termék kezelés</p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center" onclick="show('users')" aria-current="page" href="#">
                <i class="bi bi-person icon"></i>
                <p class="icon-text">Felhasználó kezelés</p>
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>