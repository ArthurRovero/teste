<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arteraçao de registro</title>
</head>
<body>
    <h1>Alteraçao de Registro</h1> 
    <?php
        require_once("conn.php");
        // atualiza valores //
        
        if(isset($_POST['btne'])){

            $id = $_POST['ocultoid'];
            $nome = $_POST['txtnome'];
            $coment = $_POST['txtcoment'];
            $sql = "UPDATE tabela_comentarios SET nome='$nome', 
                    comentario='$coment' WHERE id_tabela_comentario=$id";       
            $res = mysqli_query($conn, $sql);
          //teste
            if(!$res){

                echo mysqli_error($conn);
            }else{
               // volta pra restrita 
               sleep(1);
               header("location: restrita.php");
            }
        }

    ?>
</body>
</html>