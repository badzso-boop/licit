<?php include_once 'header.php'; ?>
<?php include_once 'headerNav.php'; ?>
<section>
    <div class="container mt-2">
        <h2 class="text-center">Felhasználó szerkesztése</h2>
        <?php
            echo '<script src="../js/script.js"></script>';

            require_once '../includes/dbh.inc.php';
            require_once '../includes/functions.inc.php';

            $id = -1;

            if (isset($_SESSION["type"])) {
                if ($_SESSION["type"] == "admin") {
                    $id = $_GET["id"];

                    $user = getSpecificUser($conn, $id);

                    //ADMIN
                    if ($user->num_rows > 0) {
                        while($seged = $user->fetch_assoc()) {
                            echo '<form action="../includes/edit-user.inc.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <!--ID-->
                                        <label for="exampleInputEmail1">ID</label>
                                        <input readonly type="number" name="id" class="form-control" placeholder="Teljes név" value="'.$seged["id"].'">
                                    </div>
                                    <div class="form-group">
                                        <!--TELJES NÉV-->
                                        <label for="exampleInputEmail1">Teljes név</label>
                                        <input type="text" name="name" class="form-control" placeholder="Teljes név" value="'.$seged["name"].'">
                                    </div>
                                    <div class="form-group">
                                        <!--FELHASZNÁLÓNÉV-->
                                        <label for="exampleInputEmail1">Felhasználónév</label>
                                        <input type="text" name="uname" class="form-control" placeholder="Felhasználónév" value="'.$seged["uname"].'">
                                    </div>
                                    <div class="form-group">
                                        <!--E-MAIL CÍM-->
                                        <label for="exampleInputEmail1">Email cím</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="'.$seged["email"].'">
                                    </div>
                                    <div class="form-group">
                                        <!--DÁTUM-->
                                        <label for="exampleInputEmail1">Születési dátum</label>
                                        <input type="date" name="borndate" class="form-control" value="'.$seged["bornDate"].'">
                                    </div>



                                    <div class="form-group">
                                        <!--TÍPUS-->
                                        <label for="exampleInputEmail1">TÍPUS</label>
                                        <select name="type" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="user">Felhasználó</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <img src="../img/'.$seged['profileImg'].'" class="card-img-top d-none d-lg-block kep mt-4" alt="'.$seged['name'].'">
                                        <!--PROFILKÉP-->
                                        <label for="exampleInputEmail1">Profilkép</label>
                                        <input type="file" name="profileImg" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <!--RÓLAM-->
                                        <label for="exampleInputEmail1">Rólam</label>
                                        <textarea name="about" cols="30" rows="10" class="form-control">'.$seged["about"].'</textarea>
                                    </div>
                                    <div class="form-group">
                                        <!--JELVÉNY-->
                                        <label for="exampleInputEmail1">Jelvény</label>
                                        <input type="text" name="badge" class="form-control" value="'.$seged["badge"].'">
                                    </div>
                                    <div class="form-group">
                                        <!--KUPON-->
                                        <label for="exampleInputEmail1">Kupon</label>
                                        <input type="text" name="coupon" class="form-control" value="'.$seged["coupon"].'">
                                    </div>
                                    <div class="form-group">
                                        <!--PHONE-->
                                        <label for="exampleInputEmail1">Telefonszám</label>
                                        <input type="text" name="phone" class="form-control" value="'.$seged["phone"].'">
                                    </div>
                                    <div class="form-group">
                                            <!--ZIP-->
                                            <label for="exampleInputEmail1">Irányítószám</label>
                                            <input type="number" name="zip" class="form-control" value="'.$seged["zip"].'">
                                    </div>
                                    <div class="form-group">
                                        <!--CITY-->
                                        <label for="exampleInputEmail1">Város</label>
                                        <input type="text" name="city" class="form-control" value="'.$seged["city"].'">
                                    </div>
                                    <div class="form-group">
                                        <!--ADDR-->
                                        <label for="exampleInputEmail1">Cím</label>
                                        <input type="text" name="addr" class="form-control" value="'.$seged["addr"].'" placeholder="Utca házszám emelet ajtó">
                                    </div>
                                    <div class="form-group">
                                        <!--SZINT-->
                                        <label for="exampleInputEmail1">Szint</label>
                                        <input type="number" name="level"  min="1" max="100" class="form-control" value="'.$seged["level"].'">
                                    </div>
                                    <div class="form-group">
                                        <!--LINKEK-->
                                        <label for="exampleInputEmail1">Linkek</label>
                                        <div id="links"></div>';
                                        echo "<script>addInputs(".json_encode($seged['links']).", 'links', 'Fontos Linkek...')</script>";
                                echo '</div>
                                    <div class="form-group">
                                        <!--HOBBY-->
                                        <label for="exampleInputEmail1">Hobby</label>
                                        <div id="hobby"></div>';
                                        echo "<script>addInputs(".json_encode($seged['hobby']).", 'hobby', 'Hobbym...')</script>";
                                echo '</div>
                                    <div class="form-group">
                                        <!--MUNKA-->
                                        <label for="exampleInputEmail1">Munka</label>
                                        <div id="work"></div>';
                                        echo "<script>addInputs(".json_encode($seged['work']).", 'work', 'Munkám...')</script>";
                                echo '</div>
                                    <div class="form-group">
                                        <!--SPORT-->
                                        <label for="exampleInputEmail1">Sport</label>
                                        <div id="sport"></div>';
                                        echo "<script>addInputs(".json_encode($seged['sport']).", 'sport', 'Kedvenc sportágam...')</script>";
                                echo '</div>
                                    <div class="form-group">
                                        <!--KEDVENC ELŐADÓ-->
                                        <label for="exampleInputEmail1">Kedvenc előadó</label>
                                        <div id="music"></div>';
                                        echo "<script>addInputs(".json_encode($seged['music']).", 'music', 'Kedvenc zenei előadóm...')</script>";
                                echo '</div>
                                    <button type="submit" class="btn btn-primary mt-2" name="userEditSave">Mentés</button>
                                    <button type="submit" class="btn btn-primary mt-2" name="userEditBack">Vissza</button>
                                </form>';
                        }
                    }
                }
                else if ($_SESSION["type"] == "user") {
                    if ($_SESSION["id"] == $_GET["id"]) {
                        $id = $_GET["id"];
                        
                        $user = getSpecificUser($conn, $id);

                        //USER
                        if ($user->num_rows > 0) {
                            while($seged = $user->fetch_assoc()) {
                                echo '<form action="../includes/edit-user.inc.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <!--ID-->
                                            <label for="exampleInputEmail1">ID</label>
                                            <input readonly type="number" name="id" class="form-control" placeholder="Teljes név" value="'.$seged["id"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--TELJES NÉV-->
                                            <label for="exampleInputEmail1">Teljes név</label>
                                            <input type="text" name="name" class="form-control" placeholder="Teljes név" value="'.$seged["name"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--FELHASZNÁLÓNÉV-->
                                            <label for="exampleInputEmail1">Felhasználónév</label>
                                            <input type="text" name="uname" class="form-control" placeholder="Felhasználónév" value="'.$seged["uname"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--E-MAIL CÍM-->
                                            <label for="exampleInputEmail1">Email cím</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="'.$seged["email"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--DÁTUM-->
                                            <label for="exampleInputEmail1">Születési dátum</label>
                                            <input type="date" name="borndate" class="form-control" value="'.$seged["bornDate"].'">
                                        </div>



                                        <div class="form-group">
                                            <img src="../img/'.$seged['profileImg'].'" class="card-img-top d-none d-lg-block kep mt-4" alt="'.$seged['name'].'">
                                            <!--PROFILKÉP-->
                                            <label for="exampleInputEmail1">Profilkép</label>
                                            <input type="file" name="profileImg" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <!--RÓLAM-->
                                            <label for="exampleInputEmail1">Rólam</label>
                                            <textarea name="about" cols="30" rows="10" class="form-control">'.$seged["about"].'</textarea>
                                        </div>
                                        <div class="form-group">
                                            <!--JELVÉNY-->
                                            <label for="exampleInputEmail1">Jelvény</label>
                                            <input type="text" name="badge" class="form-control" value="'.$seged["badge"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--KUPON-->
                                            <label for="exampleInputEmail1">Kupon</label>
                                            <input type="text" name="coupon" class="form-control" value="'.$seged["coupon"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--PHONE-->
                                            <label for="exampleInputEmail1">Telefonszám</label>
                                            <input type="text" name="phone" class="form-control" value="'.$seged["phone"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--ZIP-->
                                            <label for="exampleInputEmail1">Irányítószám</label>
                                            <input type="number" name="zip" class="form-control" value="'.$seged["zip"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--CITY-->
                                            <label for="exampleInputEmail1">Város</label>
                                            <input type="text" name="city" class="form-control" value="'.$seged["city"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--ADDR-->
                                            <label for="exampleInputEmail1">Cím</label>
                                            <input type="text" name="addr" class="form-control" value="'.$seged["addr"].'" placeholder="Utca házszám emelet ajtó">
                                        </div>
                                        <div class="form-group">
                                            <!--SZINT-->
                                            <label for="exampleInputEmail1">Szint</label>
                                            <input type="number" name="level"  min="1" max="100" class="form-control" value="'.$seged["level"].'">
                                        </div>
                                        <div class="form-group">
                                            <!--LINKEK-->
                                            <label for="exampleInputEmail1">Linkek</label>
                                            <div id="links"></div>';
                                            echo "<script>addInputs(".json_encode($seged['links']).", 'links', 'Fontos Linkek...')</script>";
                                    echo '</div>
                                        <div class="form-group">
                                            <!--HOBBY-->
                                            <label for="exampleInputEmail1">Hobby</label>
                                            <div id="hobby"></div>';
                                            echo "<script>addInputs(".json_encode($seged['hobby']).", 'hobby', 'Hobbym...')</script>";
                                echo '</div>
                                        <div class="form-group">
                                            <!--MUNKA-->
                                            <label for="exampleInputEmail1">Munka</label>
                                            <div id="work"></div>';
                                            echo "<script>addInputs(".json_encode($seged['work']).", 'work', 'Munkám...')</script>";
                                echo '</div>
                                        <div class="form-group">
                                            <!--SPORT-->
                                            <label for="exampleInputEmail1">Sport</label>
                                            <div id="sport"></div>';
                                            echo "<script>addInputs(".json_encode($seged['sport']).", 'sport', 'Kedvenc sportágam...')</script>";
                                echo '</div>
                                        <div class="form-group">
                                            <!--KEDVENC ELŐADÓ-->
                                            <label for="exampleInputEmail1">Kedvenc előadó</label>
                                            <div id="music"></div>';
                                            echo "<script>addInputs(".json_encode($seged['music']).", 'music', 'Kedvenc zenei előadóm...')</script>";
                                echo '</div>
                                        <button type="submit" class="btn btn-primary mt-2" name="userEditSaveUser">Mentés</button>
                                        <button type="submit" class="btn btn-primary mt-2" name="userEditBackUser">Vissza</button>
                                    </form>';
                            }
                        }
                    }
                }
                else
                {
                    echo '<script>showAlert("Nincs jogosultsága ehhez!", "../index.php")</script>';
                }
            }
        ?>
    </div>

</section>