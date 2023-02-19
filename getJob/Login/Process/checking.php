<?php
    include "../../BackEnd/Function/backend.php";
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        header('location:../login.php');
    }else{
        if(login_check($_POST['username'], $_POST['password']) == true)
            header('location:../../Home/home.php');
        else
            header('location:../login.php');
    }