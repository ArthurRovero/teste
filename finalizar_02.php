<?php

require_once('conn.php');

session_start();
//echo "<pre>";
//echo print_r($_SESSION['logado']);
//echo print_r($_SESSION['dados']);

$items_cart = $_SESSION['dados'];

if(isset($_SESSION['logado'])){

    $id = $_SESSION['id_usuario'];
    $sql3 = "SELECT * FROM usuario WHERE id = '$id'";
    $res3 = mysqli_query($conn, $sql3);
    $user = mysqli_fetch_array($res3, 2);
    
}

if(isset($_POST['btn'])){

        foreach($items_cart as $item){

                $nome = $item['id_produto'];
                $qtd = $item['quant'];
                $preco = $item['preco'];
                $total = $item['total'];
            
                $sql = "INSERT INTO pedidos (nome, id_produto, qtd, preco, total) VALUES ('$user[1]', '$nome', '$qtd', '$preco', '$total')";
                $res =  mysqli_query($conn, $sql);
                $qtd = mysqli_affected_rows($conn);
            }
            
}

$sql2 = "SELECT * FROM pedidos INNER JOIN usuario ON (pedidos.nome = usuario.nome)";
$res2 = mysqli_query($conn, $sql2);
  
        echo "<h1 >Pedido Confirmado com Sucesso!</h1>
                <p>Todos os prudutos adicionados ao banco de dados.</p>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirmaçao da Compra</title>
</head>
<body>
<form method="POST" action="dompdf_teste.php">
        <input type="submit" name="btn" value="Gerar .PDF">
    </form>
</body>
</html>