<?php
    include "../BackEnd/Function/backend.php";
    session_start();
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetJob-Home</title>
    <script src="https://kit.fontawesome.com/bdc80979be.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css.css">
</head>
<body>
    <div class="nav-box h-box flex-align-center flex-space-between">
        <a href="">
            <h1> <span>Get</span>Job</h1>
        </a>
        <div class="h-box nod-link">
            <a href="../Condidate/condidat.php">Condidature</a>
            <a href="">Job Postuler</a>
            <a href="">Entreprise</a>
            <a href="">Gestion demandes</a>
        </div>
        <div class="h-box flex-align-center profil-nod">
            <img src="../BackEnd/Media/ProfilPictures/OIP.jfif" height="50px" width="50px">
            <button class="h-box flex-align-center">
                <?php echo $username;?>
                <i class="fa-sharp fa-solid fa-caret-down"></i>
            </button>
        </div>
        <form action="" method="get" class="search">
            <div class=" h-box flex-align-center">
                <div class="v-box">
                    <label>Trouve une entreprise</label>
                    <input type="text" placeholder="Rechercher" name="search">
                </div>
                <div class="h-box flex-align-center" id="btn-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="submit" value="Rechercher">
                </div>
            </div>
        </form>
    </div>
    <div class="h-box flex-space-between">
        <div class="filter v-box">
            <div class="h-box flex-align-center filter-header">
                <h2>Filtere</h2>
                <p>clear</p>
            </div>
            <form action="" class="v-box">
                <table>
                    <h4>Salaire</h4>
                    <tr>
                        <td><input type="radio" name="salary" value=""></td>
                        <td><p>Inferieur de 1500</p></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="salary" value=""></td>
                        <td><p>Entre 1500 et 2500</p></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="salary" value=""></td>
                        <td><p>Entre 2500 et 6000</p></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="salary" value=""></td>
                        <td><p>Superieur de 6000</p></td>
                    </tr>
                </table>
                <hr>
                <table>
                    <h4>Date de concoure</h4>
                    <tr>
                        <td><input type="radio" name="date_concour" value=""></td>
                        <td><p>Dans cette semaine</p></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="date_concour" value=""></td>
                        <td><p>Dans ce mois</p></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="date_concour" value=""></td>
                        <td><p>Dans cette annee</p></td>
                    </tr>
                </table>
                <hr>
                <h4>Ville</h4>
                <select name="ville">
                    <option value="all">Toute</option>
                    <option value="rabat">Rabat</option>
                </select>
                <input type="submit" value="Filtrer">
            </form>
        </div>
        <div class="jobs v-box">
            <!-- job list -->
            <div class="h-box flex-align-center flex-space-between">
                <span id="rs_count"></span>
                <a href="./home.php" class="reset-search"><i class="fa-solid fa-repeat"></i></a>
            </div>
            <div class="v-box flex-align-center">
                <?php 
                    if(isset($_GET['search']))
                        echo echo_jobs_list_by_search($_GET['search']);
                    else
                        echo echo_jobs_list();
                ?>
            </div>
        </div>
        <div class="v-box notify flex-align-center">
            <h2>Notifications</h2>
            <div class="v-box">
                <?php echo echo_notification($id);?>
            </div>
        </div>
    </div>
    <script src="js.js"></script>
</body>
</html>