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

        //atualiza valores
        if(isset($_POST['btne'])){

            $id = $_POST['ocultoid'];
            $nome = $_POST['txtnome'];
            $preco = $_POST['txtpreco'];
            $desc = $_POST['desc'];
            $categoria = $_POST['categoria'];

            //mover imagem//
            $img_tmp = $_FILES['img']['tmp_name'];
            $nome_arquivo = time();
            $novo = "img/$nome_arquivo.jpg";
            $mover = move_uploaded_file($img_tmp, $novo);

            $sql = "UPDATE produtos SET nome='$nome',  preco='$preco', descricao='$desc', id_categoria='$categoria', imagem='$novo' WHERE id_produto=$id";       

            $res = mysqli_query($conn, $sql);
            //testa se funciona//
            if(!$res){

                echo mysqli_error($conn);
            }else{
               //volta para pagina principal em 1 sec//
               sleep(1);
               header("location: insere_produtos.php");
            }
        }

    ?>
</body>
</html>