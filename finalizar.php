<?php

require_once('conn.php');

session_start();

$items_cart = $_SESSION['dados'];

if(isset($_SESSION['logado'])){

    $id = $_SESSION['id_usuario'];
    $sql3 = "SELECT * FROM usuario WHERE id = '$id'";
    $res3 = mysqli_query($conn, $sql3);
    $user = mysqli_fetch_array($res3, 2);
    
}

echo "<table id='tb1'>";
        echo "<tr>
                    <th>CLIIENTE</th>
                    <th>PRODUTO: NOME</th>
                    <th>QUANTIDADE</th>
                    <th>PREÇO</th>
                    <th>TOTAL</th>

            </tr>";
foreach($items_cart as $item){

    $nome = $item['id_produto'];
    $qtd = $item['quant'];
    $preco = $item['preco'];
    $total = $item['total'];

    echo "<tr>
                <td>|</td>
                <td>$nome</td>
                <td>$qtd</td>
                <td>$preco</td>  
                <td>|</td>  
         </tr>";

} echo "<td>$user[1]</td>
        <td></td>
        <td></td>
        <td></td>
        <td>$total</td>
</table>";
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Finalizaçao</title>
</head>
<body>
    <form method="POST" action="finalizar_02.php">
        <input type="submit" name="btn" value="Confirmar Finalização de Pedido">
    </form>
</body>
</html>





