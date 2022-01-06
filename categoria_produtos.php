<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>

<body>
    <form action="#" method="POST" id="form">
    <p>Categoria/Gênero<input type="text" name="txtnome"></p>
    <p><input type="submit" name="btn" value="Salvar" id="btn"></p>
    </form>
<style>
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
            max-width: 30px;
        }
        .lapis{
            max-width:30px;
        }
    </style>

</style>
    <?php
        require_once('conn.php');
        
        //insere valores//
        if(isset( $_POST['btn'] ) ){
            
            $nome = $_POST[  'txtnome'  ];
            $sql = "INSERT INTO categorias (nome) VALUES ('$nome')";
            $res = mysqli_query( $conn, $sql );
            $qtd = mysqli_affected_rows($conn);
            if($qtd>0){
                echo "<p>Sucesso, Foram inseridos $qtd registros";
            }     else{
                echo "Erro" . mysqli_error($conn);
            }
         }

         //deleta valores//
         if(isset($_GET['id'])){

            $id  = $_GET['id'];
            $sql = "DELETE FROM categorias WHERE id_categoria=$id";
            $res = mysqli_query($conn, $sql);
            if($res){
                echo "Comentário #$id excluído com sucesso!";
            }
        }

        //exibe em ordem decrescente//
        $sql = "SELECT * FROM categorias ORDER BY id_categoria DESC";
        $res = mysqli_query($conn, $sql);

        echo "<table id='tb1'>";
        echo "<tr>
                <th>ID</th>
                <th>CATEGORIA</th>
                <th>DEL</th>
                <th>EDIT</th>
            </tr>";

         while($linha = mysqli_fetch_array($res, 2)){

        echo "<tr>
                <td>$linha[0]</td>
                <td>$linha[1]</td>
                <td><a href='?id=$linha[0]'><img src='img/lixo2.png'  ></a></td>
                <td><a href='edita_categoria.php?id=$linha[0]'><img src='img/lapis.png' class='lapis'></a></td>
            </tr>";
        }
    ?>
</body>
</html>