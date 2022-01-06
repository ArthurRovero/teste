<?php
    ini_sessao();
    $id = pega_id();
    $acao = pega_acao();

    //mascara avisos  
    error_reporting(E_ERROR | E_PARSE);
   

    switch ($acao) {

        case 'add':
            add_cart($id);
            break;

        case 'del':
            del_cart($id);
            break;

        case 'soma':
            qtd_cart($id, +1);
            break;

        case 'subt':
            qtd_cart($id, -1);
            break;   
        
        case 'zera':
            zerar();
            break;
    }
    
    //iniciando a sessao com uma função//
    function ini_sessao(){

        //status 2 = funcionando
        if(session_status()!=2){
            session_start();
        }
    }

    //funçoes q pegam a ID e a ACAO via $_GET da listagem de produtos
    // listagem de produtos = carrinho_01.php
    function pega_id(){
        if(isset($_GET['id'])){

            $idp = $_GET['id'];
            return $idp;
        }
    }
    function pega_acao(){
        if(isset($_GET['acao'])){

            $acao = $_GET['acao'];
            return $acao;
        }
    }
    
    //adiciona produto ao carrinho
    function add_cart($idp){

        array_push($_SESSION['inventario'][$idp] = (array('nome' =>$idp, 'qtd'=>1, 'val'=>4.50)));
    }
   

    //deleta produto do carrinho
    function del_cart($idp){

            unset($_SESSION['inventario'][$idp]);
            
    }

    //altera qtd de produtos no carrinho
    function qtd_cart($idp, $num){

        $qtd = $_SESSION['inventario'][$idp]['qtd'];//pega atual qtd
        $qtdnovo = $qtd + $num;//calcula
            if( $_SESSION['inventario'][$idp]['qtd']==0){
                unset( $_SESSION['inventario'][$idp]);
            }else{
            $_SESSION['inventario'][$idp]['qtd'] = $qtdnovo;//atualiza
    }}

    //zera o carrinho
    function zerar(){
        $_SESSION['inventario'] = array();
    }

    //inicia um teste na sessao
    function teste(){
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    }
   

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" >
    <title>Carrinho</title>
</head>
<body background="img/wall.jpg" id="fundo">

<!--Cabeçalho-->
<div>
    <div class="row top justify-content-center bg-dark" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;">
            <div class="row top justify-content-center bg-dark" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;">
                <div class="col-3 text-center">
                    <a href="categoria_produtos.php" style="text-decoration: none;"
                    class="badge badge-light" >✏️ Categorias/ Gênero</a>
                </div>
                <div class="col-3 text-center">
                    <a href="insere_produtos.php" style="text-decoration: none;"
                    class="badge badge-light" >✏️ Produtos da Loja</a>
                </div>
                <div class="col-3 text-center">
                    <a href="cadastrar.php" style="text-decoration: none;"
                    class="badge badge-light" >✏️ Cadastre-se</a>
                </div>               
                <div class="col-3 text-center">
                   <a href="alterar_cadastro.php" style="text-decoration: none;"
                   class='badge badge-light' >✏️ Sua conta</a>"
                </div>
            </div>
    </div>      
</div>
</div><br><br><br>

<!--MENU-->

<div class="container" >
    <div class="row" >
        <div class="col-8 m-auto border bg-dark">
            <nav class="nav nav-pills nav-justified">
            <?php
                require_once('conn.php');
                if(isset($_SESSION['logado'])){

                    $id = $_SESSION['id_usuario'];
                    $sql = "SELECT * FROM usuario WHERE id = '$id'";
                    $res = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($res);
                    echo "<a class='nav-item nav-link' href='restrita.php'>HOME</a>";
                  }else{
                    echo "<a class='nav-item nav-link' href='index.php'>HOME</a>";
                  }
            ?>
                <a class="nav-item nav-link" href="#">LANÇAMENTOS</a>
                <a class="nav-item nav-link" href="#">CARRINHO</a>

                <?php
                
                if(isset($_SESSION['logado'])){

                    $id = $_SESSION['id_usuario'];
                    $sql = "SELECT * FROM usuario WHERE id = '$id'";
                    $res = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($res);
                
                    echo "<a class='nav-item nav-link' href='sair.php'>SAIR</a>";
                  }else{
                    echo "<a class='nav-item nav-link' href='fazer_login.php'>LOGIN</a>";
                  }
            ?>
                <div >
                <form method="POST" action="busca.php">
                <input type="text" name="srch" placeholder="Search.." style="color:blanchedalmond" id="search">
                <button type="submit" class="bg-dark">🔍</button>
                </form>
                </div>
            </nav>
        </div>
    </div>

    <!--titulo-->
    <div class="row ">
        <div class="col-xl-8 m-auto bg-dark">
            <H1 id="h1p">SEU CARRINHO DE COMPRAS</H1>
            <hr id="hr-produtos">
        </div>
    </div>

    <!--carrinho-->
<?php

    $total = 0;
    if(count($_SESSION['inventario']) == 0){
        echo "
        <div class='row'>
            <div class='media col-xl-2'></div>
                <div class='col-8 m-auto bg-dark'>
                    <div class='alert alert-warning' role='alert' style='text-align: center;'>
                        Seu Carrinho Está Vazio!
                    </div>
                </div>
            <div class='media col-xl-2'></div>
        </div>";
    }else{

        $_SESSION['dados'] = array();

        foreach($_SESSION['inventario'] as $item=>$dados){

            require_once('conn.php');
            $sql = "SELECT * FROM produtos WHERE id_produto='$item'";
            $res = mysqli_query($conn, $sql);
            $lin = mysqli_fetch_array($res,2);

            $nome = $lin[1];
            $img = $lin[5];
            $preco = number_format($lin[2], 2,',','');
            $sub = number_format($lin[2] * $dados['qtd'], 2,',','');
            $total += $sub;
            $total = number_format($total, 2,',','');

            //exibe conteudo do foreach
    echo

    "<div class='row' >
        <div class='media col-xl-2'></div>
        <div class='media col-xl-2 bg-dark' ><img src='$img' width='170' id='imgproduto'></div>
        <div class='media col-xl-2 bg-dark' style='font-size: 85%;'><p id='pp'>$nome</p></div>   
        <div class='media col-xl-1 bg-dark' ><p id='pp' style='font-size: 85%;'>R$ $preco</p></div>
            <div class='media col-xl-2 bg-dark' > 
                <p id='pp'><a href='?acao=soma&id=$item' style='text-decoration: none;'>➕</a>
                <span class='badge badge-warning'>{$dados['qtd']}</span>
                <a href='?acao=subt&id=$item' style='text-decoration: none;'>➖</a></p>
            </div>
        <div class='media col-xl-1 bg-dark' > 
            <p id='pp'><a href='?acao=del&id=$item' style='text-decoration: none; font-size: 85%;'>❌remover</a>
            <p id='pp' style='font-size: 85%;'>R$ $sub</p>
        </div>
    </div> 
    <div class='media col-xl-2'></div>

   <div class='row'>         
        <div class='media col-xl-2'></div>
        <div class='col-xl-8  bg-dark'><hr id='hr-produtos'></div>
        <div class='media col-xl-2'></div>
    </div>";
     
    array_push(
        $_SESSION['dados'][$item] = 
           array(
                
                'id_produto' => $nome,
                'quant' => $dados['qtd'],
                'preco' => $preco,
                'total' => $total
            ) 
       );
    
        }
       
        //echo "<pre>";
        //var_dump($_SESSION['dados']) ;
        //echo "</pre>";
        //echo $user['nome'];

    echo 
    "<div class='col-8 m-auto'>
    </div>
    <div class='row '>
        <div class='media col-xl-2 ' ></div>      
            <div class='col-4  bg-dark' style='text-align: left;'><br>
                <strong id='pp'>Total estimado</strong>           
            </div>
            <div class='col-4  bg-dark' style='text-align: right;'><br>
                <strong id='pp' style='font-size: 110%;'>R$ ".$total."</strong>
            </div>
                <div class='media col-xl-2'></div>
            </div>";
          
    }
    
?>

<div class="row">
    <div class="col-xl-8 m-auto bg-dark" >
    <hr id="hr-produtos">
        <br><p id='pp' style='font-size: 85%;'>Produtos que voçe adicionou mais de uma vez serão destinados como presente para um ou mais usuarios de sua escolha </p>
    </div>
</div>
<div class="row">
        <div class="col-xl-8 m-auto bg-dark">
            <?php
                
                if(isset($_SESSION['logado'])){

                    $id = $_SESSION['id_usuario'];
                    $sql = "SELECT * FROM usuario WHERE id = '$id'";
                    $res = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($res);
                    echo "<a href='restrita.php'>
                            <button type='button' class='btn btn-primary' style='margin-bottom:10px;'>Continuar comprando</button>
                        </a>";
                  }else{
                    echo "<a href='index.php'>
                            <button type='button' class='btn btn-primary' style='margin-bottom:10px;'>Continuar comprando</button>
                        </a>";
                  }

                echo "<form method='POST' action='finalizar.php'>
                        <button class='btn btn-success' name='btnf' style='margin-bottom:10px;'>Finalizar Pedido</button>
                    </form>
                    <a href='?acao=zera&id=0' style='font-size: 68%; text-decoration: none; text-align: right;'>Remover todos os produtos</a>";?>
        </div>
    </div>
</div>
<br><br><br><br><br><br>

<?php
include('rodape.php')
?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>