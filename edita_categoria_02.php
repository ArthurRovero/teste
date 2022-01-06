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
        require_once('conn.php');
        //atualiza valores//
        
        if(isset($_POST['btne'])){

            $id = $_POST['ocultoid'];
            $nome = $_POST['txtnome'];
            $sql = "UPDATE `categorias` SET `nome`='$nome' WHERE id_categoria='$id'";       
            $res = mysqli_query($conn, $sql);

            
            if(!$res){

                echo mysqli_error($conn);
            }else{

               sleep(2);
               header("location: categoria_produtos.php");
            }
        }
    ?>
</body>
</html>