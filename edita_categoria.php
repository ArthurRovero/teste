<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categorias</title>
</head>
<body>
<h1>Alteraçao de Registro</h1> 

<?php
        require_once("conn.php");

        //--insere valores--//
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM categorias WHERE id_categoria=$id";
            $res = mysqli_query($conn, $sql);

            if(!$res){
                echo mysqli_error($conn);
            }else{
                $linha = mysqli_fetch_array($res, 2);
            }   
        }else{
            echo "Acesso Invalido!";
        }
?>

<form action="edita_categoria_02.php" method="POST" id="form">

    <p>Categoria/Gênero<input type="text" name="txtnome" value="<?php if(isset($linha)){ echo $linha[1];}?>"></p>
    <p><input type="hidden" name="ocultoid" value="<?php if(isset($linha)){echo $linha[0];}?>"></p>
    <p><input type="submit" name="btne" value="Salvar" id="btn"></p>

 </form>

</body>
</html>