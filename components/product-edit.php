<head>
    <?php include_once 'header.php';?>
    <script src="../js/script.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Adnijo.hu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../admin/admin.php">Admin főoldal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/adminUsers.php">Felhasználók</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/adminProducts.php">Termékek</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/adminProductUpload.php">Termék feltöltése</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">Kilépés</a>
          </li>
    </div>  
  </div>
</nav>

<?php
session_start();

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    include_once '../includes/dbh.inc.php';
    include_once '../includes/functions.inc.php';


    $users = getUsers($conn);
    $felhasznalok = [];
    if ($users->num_rows > 0) {
        while($seged = $users->fetch_assoc()) {
            array_push($felhasznalok, $seged["uname"]);
        }
    }

    $product = getSpecificProduct($conn, $id);

    if (isset($_SESSION['type'])) {
        if ($_SESSION["type"] == "admin") {
            if ($product->num_rows > 0) {
                while($seged = $product->fetch_assoc()) {
                    echo '<div class="container">
                            <div class="row">
                                <div class="col">
                                    <form action="../includes/productEdit.inc.php" method="POST">
                                        <div class="form-group hide">
                                            <!--ID-->
                                            <label>ID</label>
                                            <input readonly type="number" name="id" class="form-control" placeholder="ID" value="'.$seged["id"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--TITLE-->
                                            <label>Megnevezés</label>
                                            <input type="text" name="title" class="form-control" placeholder="Megnevezés" value="'.$seged["title"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--DESCRIPTION-->
                                            <label>Leírás</label>
                                            <textarea name="description" class="form-control" cols="30" rows="10">'.$seged["description"].'</textarea>
                                        </div>
                                        <div class="form-group">
                                            <!--PRICE-->
                                            <label>Ár</label>
                                            <input type="number" name="price" class="form-control" placeholder="Ár" value="'.$seged["price"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--MINIMUM PRICE-->
                                            <label>Minimum ár</label>
                                            <input type="number" name="priceMin" class="form-control" placeholder="Minimum ár" value="'.$seged["priceMin"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--SETEPPING PRICE-->
                                            <label>Árlépcső</label>
                                            <input type="number" name="steppingPrice" class="form-control" placeholder="Árlépcső" value="'.$seged["steppingPrice"].'">
                                        </div>';
                                        if (isset($_SESSION["type"])) {
                                            if ($_SESSION["type"] == "admin") {
                                                echo '<div class="form-group">
                                                    <label>Termék tulajdonosa</label>
                                                    <select class="form-select" aria-label="Default select example" name="owner">
                                                        <option selected>Felhasználók...</option>';
                                                        for ($i=0; $i < count($felhasznalok); $i++) { 
                                                            echo '<option value="'.$felhasznalok[$i].'">'.$felhasznalok[$i].'</option>';
                                                        }
                                                    echo '</select>';
                                            }
                                        }
                                        echo '</div>
                                        <button type="submit" class="btn btn-primary mt-2" name="productEditSave">Mentés</button>
                                        <button type="submit" class="btn btn-primary mt-2" name="productEditBack">Vissza</button>
                                    </form>
                                </div>
                                <div class="col">
                        
                                </div>
                            </div>
                        </div>';
                }
            }
        }
    }
}
?>