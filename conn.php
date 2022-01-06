<?php
    $con = "localhost";
    $user = "root";
    $pass = "";
    $db = "prejetofinal";
    $conn = mysqli_connect($con,$user,$pass,$db);
    
    if(!$conn){
        echo "<p id='pp'>Erro na Conexao</p>";
    }
?>