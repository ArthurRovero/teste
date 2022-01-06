<?php  require_once('conn.php');?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" >
    <title>BUSCA</title>
</head>
<body  background="img/wall.jpg" id="fundo" >

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

<!--LOGO-->
    <div class="row top justify-content-center">
        <div class="col-12 text-center">
            <img src="img/logo.png" width="200px">
        </div>
    </div>
   
<!--Menu-->
<div class="container">
    <div class="row">
        <div class="col-8 m-auto  border bg-dark">
            <nav class="nav nav-pills nav-justified">
                <a class="nav-item nav-link" href="index.php">HOME</a>
                <a class="nav-item nav-link" href="#">LANÇAMENTOS</a>
                <a class="nav-item nav-link" href="carrinho.php">CARRINHO</a>
                <a class="nav-item nav-link" href="fazer_login.php">LOGIN</a>
                <div >
                    <form method="POST" action="#">
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
            <H1 id="h1p-3">RESULTADO:</H1>
            <hr id="hr-produtos">
        </div>
    </div>

<!--busca de itens com inner join pelo nome-->
<?php
    $srch = $_POST['srch'];
    $sql = "SELECT * FROM produtos INNER JOIN categorias ON 
    (produtos.id_categoria = categorias.id_categoria) WHERE produtos.nome LIKE '%$srch%' LIMIT 5";
    $res = mysqli_query($conn,$sql);

    while($linha = mysqli_fetch_array($res, 2)){
        echo "<div class='col-8 m-auto' id='hr-separacao'></div>
        <div class='row min-width: 1200px'>
        <div class='media col-xl-2 ' ></div>
            <div class='media col-xl-3 bg-dark'>
                <img src='$linha[5]' width='300' id='imgproduto'> <br>
                <h1 id='pp' style = 'font-size: 75%;'>🔑 $linha[7]</h1> 
            </div>
        <div class=' media col-xl-3 bg-dark' >
            <a href='carrinho.php?acao=add&id=$linha[0]' style='text-decoration: none;'>
            <h4 style='color: antiquewhite; font-size: 120%;'>".$linha[1]."</h4>
        </a>
            <hr id='hr-produtos'>
                <p id='pp' style='overflow: hidden; font-size: 75%;'>".$linha[3]."</p>
        </div>
        <div class=' media col-xl-2 bg-dark' id='btn-buy' aria-pressed='true'>
           
            <h1 id='h1p' >$". number_format($linha[2], 2,',','.')."</h1>
        <a href='carrinho.php?acao=add&id=$linha[0]'> <button type='button' class='btn btn-primary'>+🛒</button></a>
        </div>
        <div class='media col-xl-2'></div>
    </div>
    <div class='col-8 m-auto' id='hr-separacao'></div>";
    }

    //busca por produtos pela descrição com inner join

    $sql2 = "SELECT * FROM produtos INNER JOIN categorias ON 
    (produtos.id_categoria = categorias.id_categoria) WHERE produtos.descricao LIKE '%$srch%' LIMIT 5";
    $res2 = mysqli_query($conn, $sql2);

    while($lin = mysqli_fetch_array($res2, 2)){

        echo "<div class='col-8 m-auto' id='hr-separacao'></div>
        <div class='row min-width: 1200px'>
        <div class='media col-xl-2 ' ></div>
            <div class='media col-xl-3 bg-dark'>
                <img src='$lin[5]' width='300' id='imgproduto'> <br>
                <h1 id='pp' style = 'font-size: 75%;'>🔑 $lin[7]</h1> 
            </div>
        <div class=' media col-xl-3 bg-dark' >
            <a href='carrinho.php?acao=add&id=$lin[0]' style='text-decoration: none;'>
            <h4 style='color: antiquewhite; font-size: 120%;'>".$lin[1]."</h4>
        </a>
            <hr id='hr-produtos'>
                <p id='pp' style='overflow: hidden; font-size: 75%;'>".$lin[3]."</p>
        </div>
        <div class=' media col-xl-2 bg-dark' id='btn-buy' aria-pressed='true'>
           
            <h1 id='h1p' >$". number_format($lin[2], 2,',','.')."</h1>
        <a href='carrinho.php?acao=add&id=$lin[0]'> <button type='button' class='btn btn-primary'>+🛒</button></a>
        </div>
        <div class='media col-xl-2'></div>
    </div>
    <div class='col-8 m-auto' id='hr-separacao'></div>";
    }
?>


<!--insere rodapé-->
<?php
    include('rodape.php');
?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>

