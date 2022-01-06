<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" >
    <title>Editar</title>
</head>
<body>


<!--php--->
    <?php
        require_once("conn.php");

      //insere valores
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM produtos INNER JOIN categorias ON 
            (produtos.id_categoria = categorias.id_categoria) WHERE id_produto=$id ";
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
<!--formulario-->
<div class="row">
    <div class="col-4"></div>
        <div class="col-4">
        <h2>Alterar Produto</h2>
<form method="POST" action="alterar_produto_02.php" enctype="multipart/form-data" >
    
    <p>Nome:<br><input type="text" name="txtnome" 
    value="<?php  if(isset($linha)){echo $linha[1];}?>"></p>

    <p>Preço<br><input type="number_format" name="txtpreco" 
    value="<?php if(isset($linha)){echo $linha[2];}?>"></p>

    <p>Descrição<br><input type="text" name="desc" style="width: 800px;" cols="30" rows="10"
    value="<?php if(isset($linha)){echo $linha[3];}?>"></p>
        
    <?php
    
        //conecta ao banco de dados//
        require_once('conn.php');
        //exibe as categorias//

        $sql2 = "SELECT * FROM categorias ORDER BY id_categoria DESC";
        $res2 = mysqli_query($conn, $sql2);

        echo "<p>Categoria:<br><select name='categoria'>";
        echo "<option value='$linha[6]'>$linha[7]</option>";

        while($lin = mysqli_fetch_array($res2, 2)){
            echo "
            <option value='$lin[0]'>$lin[1]</option>
            ";
        }echo "</select>";
    ?>

    </p>
    <p>Imagem<br><input type="file" name="img" accept="image/*" 
    value="<?php if(isset($linha)){echo $linha[5];}?>"><br>

    <p><input type="hidden" name="ocultoid" 
    value="<?php if(isset($linha)){echo $linha[0];} ?>"></p>

    <button type="submit" value="ENVIAR" name="btne">ALTERAR</button></p>
    </form>
        </div>
    <div class="col-4"></div>
</div>
</body>
</html>