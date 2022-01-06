<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<h2>Editar Comentário</h2>

<!--css--->
<style>
        #textarea{
            width: 500px;
            height: 100px;
            padding: 0px 0px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            font-size: 16px;
            resize: none;
        }
        #tb1 td{
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-collapse: collapse;
        }
        #tb1 tr:hover {background-color: #fce8e8;}
        
        #tb1 th {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            background-color: #3399ff;
            color: white;
        }
        img{
            max-width: 22px;
        }
    </style>

<!--php-->
    <?php
        require_once("conn.php");
        //--INSERE VALORES--//
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM tabela_comentarios WHERE id_tabela_comentario=$id";
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

<!--formulário-->
    <form action="alterar_comentario.php" method="POST" id="form">

        <p>Nome<input type="text" name="txtnome" 
        value="<?php  if(isset($linha)){echo $linha[1];}?>"></p>

        <input type="text" name="txtcoment" id="textarea" cols="30" rows="10" 
        value="<?php if(isset($linha)){echo $linha[2];}?>"></textarea>

        <p><input type="hidden" name="ocultoid" 
        value="<?php if(isset($linha)){echo $linha[0];} ?>"></p>

        <p><input type="submit" name="btne" value="Editar" id="btn"></p>
        
    </form>
</body>
</html>