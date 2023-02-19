<?php

    // Connect to the database
    $cnx = mysqli_connect('localhost', 'root','', 'get_job'); 

    if(!$cnx){
        die("Connection Failed: ".mysqli_connect_error());
    }
    $id = $_GET['id'];
    // Retrieve the PDF content from the database
    $sql = "SELECT cv FROM condidate WHERE id = $id";
    echo $sql;
    $result = mysqli_query($cnx, $sql);
    $row = mysqli_fetch_assoc($result);
    $pdf_content = $row['cv'];

    // Set the appropriate headers for PDF output
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="document.pdf"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    // Output the PDF content
    echo $pdf_content;

    // Close the database connection


