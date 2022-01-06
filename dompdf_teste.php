<?php
namespace Dompdf;
use Dompdf\Dompdf;
require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf(); 
    $html = '

        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Gerando PDF</title>
        </head>
        <body>';

    require_once("conn.php");
    session_start();

    $items_cart = $_SESSION['dados'];

    if(isset($_SESSION['logado'])){

    $id = $_SESSION['id_usuario'];
    $sql3 = "SELECT * FROM usuario WHERE id = '$id'";
    $res3 = mysqli_query($conn, $sql3);
    $user = mysqli_fetch_array($res3, 2);
    
}
    $html = "";//cria variavel com string vazia
    $html = $html . "<p>Usuário: $user[1] <br>";
    foreach($items_cart as $item){

        $nome = $item['id_produto'];
        $qtd = $item['quant'];
        $preco = $item['preco'];
        $total = $item['total'];

        $html = $html . "
                        <p>Produto: $nome <br> Quantidade: $qtd <br>R$ $preco <br>";
                       
    }$html = $html. "<br>Total a Pagar: R$$total";

    $nomedoarquivo = time();//gera um nome baseado no EPOCH

    $dompdf->setPaper('A4', 'portrait');//define o formato da página e do papel
    $dompdf->loadHtml($html);//carrega a string com o código html
    $dompdf->render();//renderiza o HTML
    $dompdf->stream($nomedoarquivo,array("Attachment" => false));//gera o arquivo PDF. attach=true baixa direto
    exit(0);
    ?>
</table>
</body>
</html>