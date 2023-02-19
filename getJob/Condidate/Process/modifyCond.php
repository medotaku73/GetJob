<?php
    include "../../BackEnd/Function/backend.php";
        session_start();
        if( $_SERVER['REQUEST_METHOD'] != 'POST')
            header("location:http://localhost/test/login/index.php"); 
        else{
            try{
                modifyCondidate($_POST,$_POST['id_cond']);
                header("location:../condidat.php");
            }catch(mysqli_sql_exception $e){
                if ($e->getCode() == 2006) { // Got a packet bigger than 'max_allowed_packet' bytes
                    echo '
                    
                    <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <script src="https://kit.fontawesome.com/bdc80979be.js" crossorigin="anonymous"></script>
                            <style>
                                @import url(\'https://fonts.googleapis.com/css2?family=Poppins&display=swap\');
                                body{
                                    margin: 0;
                                    background-color: #ededed;
                                    display: flex;
                                    height: 100vh;
                                    justify-content: center;
                                    align-items: center;
                                }
                                div{
                                    padding: 10px;
                                    display:flex;
                                    flex-direction: column;
                                    font-family: "Poppins";
                                    justify-content: center;
                                    align-items: center;
                                }
                            </style>
                        </head>
                        <body>
                            <div>
                                <i class="fa-solid fa-face-sad-tear"></i>
                                <p>An error occurred while uploading the PDF file. Please ensure that the file size is within the allowed limit.<p>
                            </div>
                        </body>
                        </html>
                                            
                    ';
                } else {
                    echo '
                    
                    <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <script src="https://kit.fontawesome.com/bdc80979be.js" crossorigin="anonymous"></script>
                            <style>
                                @import url(\'https://fonts.googleapis.com/css2?family=Poppins&display=swap\');
                                body{
                                    margin: 0;
                                    background-color: #ededed;
                                    display: flex;
                                    height: 100vh;
                                    justify-content: center;
                                    align-items: center;
                                }
                                div{
                                    padding: 10px;
                                    display:flex;
                                    font-family: "Poppins";
                                    flex-direction: column;
                                    justify-content: center;
                                    align-items: center;
                                }
                            </style>
                        </head>
                        <body>
                            <div>
                                <i class="fa-solid fa-face-sad-tear"></i>
                                <p>An error occurred while uploading the PDF file. Please try again later.<p>
                            </div>
                        </body>
                        </html>
                                            
                    ';

                }
            }
        }
?>
