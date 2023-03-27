<?php include_once 'header.php' ?>
<section>
    <div class="container mt-2">
        <h2 class="text-center">Felhasználó szerkesztése</h2>
        <?php
            require_once '../includes/dbh.inc.php';
            require_once '../includes/functions.inc.php';

            $id = $_GET["id"];

            $user = getSpecificUser($conn, $id);

            if ($user->num_rows > 0) {
                while($seged = $user->fetch_assoc()) {
                    echo '<form action="../includes/edit-user.inc.php" method="post">
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
                                <!--LINKEK-->
                                <label for="exampleInputEmail1">Linkek</label>
                                <input type="text" name="links" class="form-control" value="'.$seged["links"].'">
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
                                <!--SZINT-->
                                <label for="exampleInputEmail1">Szint</label>
                                <input type="number" name="level"  min="1" max="100" class="form-control" value="'.$seged["level"].'">
                            </div>
                            <div class="form-group">
                                <!--HOBBY-->
                                <label for="exampleInputEmail1">Hobby</label>
                                <input type="text" name="hobby" class="form-control" value="'.$seged["hobby"].'">
                            </div>
                            <div class="form-group">
                                <!--MUNKA-->
                                <label for="exampleInputEmail1">Munka</label>
                                <input type="text" name="work" class="form-control" value="'.$seged["work"].'">
                            </div>
                            <div class="form-group">
                                <!--SPORT-->
                                <label for="exampleInputEmail1">Sport</label>
                                <input type="text" name="sport" class="form-control" value="'.$seged["sport"].'">
                            </div>
                            <div class="form-group">
                                <!--KEDVENC ELŐADÓ-->
                                <label for="exampleInputEmail1">Kedvenc előadó</label>
                                <input type="text" name="music" class="form-control" value="'.$seged["music"].'">
                            </div>
                            <button type="submit" class="btn btn-primary mt-2" name="userEditSave">Mentés</button>
                            <button type="submit" class="btn btn-primary mt-2" name="userEditBack">Vissza</button>
                        </form>';
                }
            }
        ?>
    </div>
</section>