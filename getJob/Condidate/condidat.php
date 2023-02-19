<?php
    include "../BackEnd/Function/backend.php";
    $id = 730;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetJob-Condidatures</title>
    <script src="https://kit.fontawesome.com/bdc80979be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">
</head>
<body>
        <!-- menu  -->
        <section class="menu v-box">
            <div class="logo">
                <a href="" class="link-nod"><h1>GetJob</h1></a>
            </div>
            <div class="nods">
                <h5>MENU</h5>
                <table>
                    <tr>
                        <td><i class="fa-solid fa-cubes"></i></td>
                        <td><a href="../Home/home.php" class="link-nod"><p>Dachboard</p></a></td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-user"></i></td>
                        <td><a href="../Profil/profil.html" class="link-nod"><p>Compte</p></a></td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-rectangle-list current-nod"></i></td>
                        <td><a href="../Condidate/condidat.php" class="link-nod  current-link"><p>Condidatures</p></a></td>
                    </tr>
                </table>
                <h5>Gestion</h5>
                <table>
                    <tr>
                        <td><i class="fa-solid fa-building"></i></td>
                        <td><a href="" class="link-nod"><p>Entreprises</p></a></td>
                    </tr>
                </table>
                <h5>Support</h5>
                <table>
                    <tr>
                        <td><i class="fa-solid fa-circle-info"></i></td>
                        <td><a href="" class="link-nod"><p>Aide</p></a></td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-right-from-bracket"></i></td>
                        <td><a href="" class="link-nod"><p>Deconnecter</p></a></td>
                    </tr>
                </table>
    
            </div>
            <div class="support"></div>
        </section>




        <!-- content -->
        <section class="content v-box flex-align-center">
            <div class="main v-box flex-align-center">
                <div class="cover"></div>
                <div></div>    
                <img  class="img-profil"src="../BackEnd/Media/ProfilPictures/OIP.jfif" alt="" height="100px" width="100px">
                <h4>Assedmer Mohamed</h4>
                <h1>Condidature</h1>
            </div>
            <div class="list-cond h-box flex-justify-center">
        <!-- print the condidates -->
                <?php printInfoCondidateById($id)?>
            </div>
            <div class="add-cond v-box  ">
                <h1>Ajouter condidature</h1>
                <form action="Process/addCond.php" method="post" enctype="multipart/form-data">
                    <div class="v-box">
                        <label for="">Nom</label>
                        <input type="text" name="first_name">
                    </div>
                    <div class="v-box">
                        <label for="">Prenom</label>
                        <input type="text" name="last_name">
                    </div>
                    <div class="v-box">
                        <label for="">Adresse</label>
                        <input type="text" name="adress">
                    </div>
                    <div class="h-box gap-c">
                        <div class="v-box flex-demi">
                            <label for="">Telephone</label>
                            <input type="text" name="phone">
                        </div>
                        <div class="v-box flex-demi">
                            <label for="">CIN</label>
                            <input type="text" name="cin">
                        </div>
                    </div>
                    <div class="v-box">
                        <label for="">Diplome</label>
                        <input type="text" name="diplome">
                    </div>
                    <div class="v-box">
                        <label for="">Specialite</label>
                        <input type="text" name="specialite">
                    </div>
                    <div class="v-box">
                        <label for="">Experience</label>
                        <input type="text" name="experience">
                    </div>
                    <div class="h-box">
                        <input type="radio" name="etat" value="maried">
                        <label for="">Marier</label>
                        <input style="margin-left: 50px;" type="radio" name="etat" value="nomaried" checked>
                        <label for="">Celibataire</label>
                    </div>
                    <div class="v-box">
                        <label for="">Cv</label>
                        <p>Apres la creation de condidature vous pouvez ajouter un cv</p>
                    </div>
                    <div class="h-box"style="justify-content: flex-end;">
                        <input type="reset" value="annule">
                        <input type="submit" value="Ajouter">
                    </div>
                </div>
                </form>
                <div class="tips v-box flex-align-center">
                    <div class="v-box flex-align-center">
                        <i class="fa-sharp fa-solid fa-clipboard-check"></i>
                        <p>N'oublier pas de clicker sur la button <span>Modifier</span> apres avoir ajouter votre CV</p>
                    </div>
                    <div class="v-box flex-align-center">
                        <i class="fa-solid fa-file-pdf"></i>
                        <p>Il est preferable que le CV soit de la forme <span>PDF</span></p>
                    </div>
                    <div class="v-box flex-align-center">
                        <i class="fa-solid fa-database"></i>
                        <p>le fichier de CV ne doit pas passer <span>5M</span></p>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>