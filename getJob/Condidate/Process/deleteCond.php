<?php
    include "../../BackEnd/Function/backend.php";
        session_start();
        if( $_SERVER['REQUEST_METHOD'] != 'GET')
            header("location:http://localhost/test/login/index.php"); 
        else{
            print_r($_GET);
            deleteCondidateById($_GET['id_cond']);
            header("location:../condidat.php");
        }