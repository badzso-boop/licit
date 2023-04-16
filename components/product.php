<head>
    <?php include_once 'header.php';  session_start(); ?>
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

<div class="container">
    <div class="row m-2">
        
    
<?php                    
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$id = $_GET["id"];

$product = getSpecificProduct($conn, $id);

if (isset($_SESSION['type'])) {
    if ($_SESSION["type"] == "admin") {
        if ($product->num_rows > 0) {
            while($seged = $product->fetch_assoc()) {
                $kepek = explode(";", $seged["images"]);

                echo '  <div class="col-7 text-center">
                            <img src="../img/'.$kepek[0].'" class="d-inline-block text-center kep kep-telo mt-2">
                            <h3 class="text-center"><b>'.$seged["title"].'</b></h3>
                            <h4 class="text-start">Ár: <span class="badge bg-success">'.number_format($seged["price"], 0, '.', '.').' Ft</span></h4>
                            <h6 class="text-start">Minimum ár: <span class="badge bg-danger">'.number_format($seged["priceMin"], 0, '.', '.').' Ft</span></h6>
                            <h6 class="text-start">Árlépcső: <span class="badge bg-info">'.number_format($seged["steppingPrice"], 0, '.', '.').' Ft</span></h6>
                        </div>
                        <div class="col-5">';
                            echo '<div id="kepek">';
                            for ($i=0; $i < count($kepek); $i++) {
                                echo '<img src="../img/'.$kepek[$i].'" class="d-inline-block kep-rounded kep-telo-rounded m-1">';
                            }
                            echo '</div>
                        </div>
                        <div class="col-12 border rounded mt-2">
                            <p>'.$seged["description"].'</p>
                            <div id="form" class="text-center my-4">
                                <form action="../includes/licit.inc.php" method="post" class="mx-2 d-inline-block">
                                    <input type="number" name="id" value="'.$seged["id"].'" class="hide">
                                    <button type="submit" class="btn btn-success" name="licitUp">Licit fel</button>
                                </form>
                            
                                <form action="../includes/licit.inc.php" method="post" class="mx-2 d-inline-block">
                                    <input type="number" name="id" value="'.$seged["id"].'" class="hide">
                                    <button type="submit" class="btn btn-danger" name="licitDown">Licit le</button>
                                </form>';
                                if (isset($_SESSION["type"])) {
                                    if ($_SESSION["type"] == "admin") {
                                        echo '<div>
                                                <a href="product-delete.php?id='.$seged["id"].'">
                                                    <button type="button" class="btn btn-danger">Törlés</button>
                                                </a>
                                            </div>';
                                    }
                                }
                            echo '</div>
                        </div>';
                        $tomb = explode("?", $seged["pPrice"]);
                        $tomb = array_filter($tomb);
                        if($seged["pPrice"] != "-" && count($tomb) > 1)
                        {
                            echo '<div class="col-12 border rounded mt-2">
                                    <div style="height: 18rem;" class="d-none d-xl-none d-lg-block">
                                        <!---<h1>ANYAD MD</h1>--->
                                        <table class="charts-css line" id="my-chart">
        
                                            <tbody>';
                                            
                                            $max = $seged['price'] * 2;
                                            $arak = explode("?", $seged["pPrice"]);
                                            if (count($arak) > 7) {
                                                $arak = array_slice($arak, -7);
                                            }
                                            $elozo = 0.2;
                                            echo '  <tr>
                                                        <td style="--start: '.round($elozo,2).'; --size: '.round($arak[0]/$max,2).'">'.number_format(($arak[0]), 0, '.', '.').' Ft</td>
                                                    </tr>';
                                                $elozo = round($arak[0]/$max,2);
                                            for ($i=1; $i < count($arak); $i++) { 
                                                //echo "elozo: " . round($elozo,2) . " - Ar: " . round($arak[$i],2);
                                                echo '<tr>
                                                            <td style="--start: '.round($elozo,2).'; --size: '.round(($arak[$i]/$max),2).'">'.number_format(($arak[$i]), 0, '.', '.').' Ft</td>
                                                        </tr>';
                                                $elozo = round($arak[$i]/$max,2);
                                            }
                                            echo '
                                            </tbody>
                                        
                                        </table>
                                    </div>
                                    <div style="height: 18rem;" class="d-none d-lg-none d-xl-block">
                                        <!---<h1>ANYAD XL</h1>--->
                                        <table class="charts-css line" id="my-chart">
        
                                            <tbody>';
                                            
                                            $max = $seged['price'] * 2;
                                            $arak = explode("?", $seged["pPrice"]);
                                            if (count($arak) > 10) {
                                                $arak = array_slice($arak, -10);
                                            }
                                            $elozo = 0.2;
                                            echo '  <tr>
                                                        <td style="--start: '.round($elozo,2).'; --size: '.round($arak[0]/$max,2).'">'.number_format(($arak[0]), 0, '.', '.').' Ft</td>
                                                    </tr>';
                                                $elozo = round($arak[0]/$max,2);
                                            for ($i=1; $i < count($arak); $i++) { 
                                                //echo "elozo: " . round($elozo,2) . " - Ar: " . round($arak[$i],2);
                                                echo '<tr>
                                                            <td style="--start: '.round($elozo,2).'; --size: '.round(($arak[$i]/$max),2).'">'.number_format(($arak[$i]), 0, '.', '.').' Ft</td>
                                                        </tr>';
                                                $elozo = round($arak[$i]/$max,2);
                                            }
                                            echo '
                                            </tbody>
                                        
                                        </table>
                                    </div>
                                    <div style="height: 18rem;" class="d-lg-none d-md-block">
                                        <!---<h1>ANYAD XS</h1>--->
                                        <table class="charts-css line" id="my-chart">
        
                                            <tbody>';
                                            
                                            $max = $seged['price'] * 2;
                                            $arak = explode("?", $seged["pPrice"]);
                                            if (count($arak) > 5) {
                                                $arak = array_slice($arak, -5);
                                            }
                                            $elozo = 0.2;
                                            echo '  <tr>
                                                        <td style="--start: '.round($elozo,2).'; --size: '.round($arak[0]/$max,2).'">'.number_format(($arak[0]), 0, '.', '.').' Ft</td>
                                                    </tr>';
                                                $elozo = round($arak[0]/$max,2);
                                            for ($i=1; $i < count($arak); $i++) { 
                                                //echo "elozo: " . round($elozo,2) . " - Ar: " . round($arak[$i],2);
                                                echo '<tr>
                                                            <td style="--start: '.round($elozo,2).'; --size: '.round(($arak[$i]/$max),2).'">'.number_format(($arak[$i]), 0, '.', '.').' Ft</td>
                                                        </tr>';
                                                $elozo = round($arak[$i]/$max,2);
                                            }
                                            echo '
                                            </tbody>
                                        
                                        </table>
                                    </div>
                                </div>';       
                        }
            }
        }
    }
}
?>

    </div>
</div>

