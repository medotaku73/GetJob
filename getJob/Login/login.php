<?php
    include "../BackEnd/Function/backend.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetJob-Se-connecter</title>
    <link rel="stylesheet" href="css.css">
    <script src="https://kit.fontawesome.com/bdc80979be.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="login-form h-box">
        <div class="left v-box flex-justify-center flex-align-center">
            <h1>Bienvenue Dans GetJob</h1>
            <p>pour rester connecter avec nous cree maintenant votre compte
            </p>
            <button id="cree-btn" onclick="show_sign()">CREE</button>
        </div>
        <div class="right">
            <form action="Process/checking.php" method="post">
                <div class="v-box flex-align-center">
                    <h1>Se Connecter</h1>
                    <div class="h-box">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                    </div>
                    <div class="h box flex-align-center"><p>enter vos information</p></div>
                    <div class="login-rejected"><?php echo echo_inpt_wrong();?></div>
                    <div class="inpt-box h-box flex-align-center" >
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Utilisateur" onclick="input_reset()" name="username">
                    </div>
                    <div class="h-box inpt-box flex-align-center">
                        <i class="fa-solid fa-lock"></i>
                        <input  type="password" placeholder="Mot de passe" name="password">
                    </div>
                    <input type="submit" value="CONNECTER">
                </div>
            </form>
        </div>
    </div>
    <div class="sign-form h-box">
        <div class="right">
            <form action="">
                <div class="v-box flex-align-center">
                    <h1>Cree Compte</h1>
                    <div class="h-box">
                        <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                    </div>
                    <div class="h box flex-align-center"><p>enter vos information</p></div>
                    <div class="inpt-box h-box " >
                        <input type="text" placeholder="Utilisateur" >
                    </div>
                    <div class="inpt-box h-box " >
                        <input type="text" placeholder="Nom">
                    </div>
                    <div class="inpt-box h-box " >
                        <input type="text" placeholder="Prenom">
                    </div>
                    <div class="inpt-box h-box " >
                        <input type="email" placeholder="Email">
                    </div>
                    <div class="inpt-box h-box " >
                        <input type="text" placeholder="Telephone">
                    </div>
                    <div class=" h-box" >
                        <input type="radio" name="gender">
                        <span>homme</span>
                        <input type="radio" name="gender">
                        <span>femme</span>
                    </div>
                    <div class="h-box inpt-box flex-align-center">
                        <input type="password" name="" id="" placeholder="Mot de passe" class="pass">
                    </div>
                    <div class="h-box">
                        <div class="h-box flex-align-center">
                        </div>
                    </div>
                    <input type="submit" value="CREE">
                </div>
            </form>
        </div>
        <div class="left v-box flex-justify-center flex-align-center">
            <h1>Bienvenue Dans GetJob</h1>
            <p>Vous avez deja compte? qu'est-ce que vous attendez connecter?</p>
            <button id="cree-btn" onclick="show_login()">CONNECTER</button>
        </div>
    </div>
    <script src="js.js"></script>
</body>
</html>