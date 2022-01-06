<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" >
    <title>Insere Produtos</title>
</head>
<body>
    
    <style>
        #tb1 td{
            padding: 0;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-collapse: collapse;
            overflow: hidden;
            
           
        }
        #tb1 tr:hover {background-color: #fce8e8;}
        
        #tb1 th {
            padding: 15px;
            text-align: left;
            overflow: hidden;
            border-bottom: 1px solid #ddd;
            background-color: #3399ff;
            color: white;
            
        }
        .lixo{
            max-width: 32px;
        }
        .lapis{
            max-width:30px;
        }
    </style>
<div class="row">
    <div class="col-3 m-auto"  >
    <h3>Cadastrar produtos</h3>
    <form method="POST" action="#" enctype="multipart/form-data" >
        <p>Nome:<br><input type="text" name="txtnome"></p>
        <p>Preço<br><input type="number_format" name="txtpreco"></p>
        <p>Descrição:<br><input type="text" name="desc"></p>

    <?php

        //conecta ao banco de dados//
        require_once('conn.php');

        //exibe as categorias//
        $sql2 = "SELECT * FROM categorias ORDER BY id_categoria DESC";
        $res2 = mysqli_query($conn, $sql2);

        echo "<p>Categoria:<br>
        <select name='categoria'>";

        while($lin = mysqli_fetch_array($res2, 2)){
            echo "
            <option value='$lin[0]'>$lin[1]</option>
            ";
        }echo "</select>";

    ?>
        
    <!--continua o form-->
    
    </p><p>Imagem<br><input type="file" name="img" accept="image/*"><br><br>
    <button type="submit" value="CADASTRAR" name="btn" class="btn btn-primary">Cadastrar Produto</button></p>
    </form>

    <a href="index.php">home</a>
    </div>

    <div class="col-7 m-auto" style="overflow: scroll; max-height: 700px;">

<!---php-->
    <?php
        require_once('conn.php');
        if(isset($_POST['btn'])){

            $nome = $_POST['txtnome'];
            $preco = $_POST['txtpreco'];
            $desc = $_POST['desc'];
            $categoria = $_POST['categoria'];

            //mover imagem//
            $img_tmp = $_FILES['img']['tmp_name'];
            $nome_arquivo = time();
            $novo = "img/$nome_arquivo.jpg";
            $mover = move_uploaded_file($img_tmp, $novo);

            $sql = "INSERT INTO `produtos`(nome, preco, descricao, id_categoria, imagem) VALUES ('$nome','$preco','$desc','$categoria','$novo')";
            $res = mysqli_query($conn, $sql);
            $lin = mysqli_affected_rows($conn);

           if(isset($_POST['categoria'])){

               $id = $_POST['categoria'];
               $sql2 = "INSERT INTO `produtos`(id_categoria) VALUE('$categoria') WHERE `categorias=$id`";
               $res2 = mysqli_query($conn, $sql2);
           }
            if($lin>0){
                echo "Cadastrado com Sucesso!";
            }else{
                echo "Erro" . mysqli_error($conn);
            }
        }

//--deleta produtos---//
        if(isset($_GET['id'])){

            $id  = $_GET['id'];
            $sql = "DELETE FROM `produtos` WHERE id_produto=$id";
            $res = mysqli_query($conn, $sql);
}   

//--exibe produtos--//
        $sql = "SELECT * FROM produtos INNER JOIN categorias ON 
            (produtos.id_categoria = categorias.id_categoria) ORDER BY `id_produto` DESC";
        $res = mysqli_query($conn, $sql);

        echo "<table class='table table-hover table-dark'>";
        echo "
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>NOME</th>
                    <th scope='col'>R$</th>
                    <th scope='col'>Descriçao</th>
                    <th scope='col'>Gênero</th>
                    <th scope='col'>IMG</th>
                    <th scope='col'>DEL</th>
                    <th scope='col'>EDIT</th>
            </tr>
            ";
        while($linha = mysqli_fetch_array($res, 2)){
            
            echo "<tr id='pp'style='font-size: 75%;' >
                    <td>$linha[0]</td>
                    <td>$linha[1]</td>
                    <td>$linha[2]</td>
                    <td style='width: 500px;'>$linha[3]</td>    
                    <td>$linha[7]</td>
                    <td><img src='$linha[5]' width='150'></td>  
                    <td><a href='?id=$linha[0]'><img src='img/lixo2.png' class='lixo' ></a></td>
                    <td><a href='alterar_produto.php?id=$linha[0]'><img src='img/lapis.png' class='lapis'></a></td>
                 </tr>";
        }
            echo "</table>"; 
            mysqli_close($conn);
    ?>
    </div> 
</div>
</body>
</html>

