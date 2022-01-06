<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">    
    <link href="css/estilos.css" rel="stylesheet" >
    <title>Nossa Empresa</title>
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

<!--logo-->
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
                    <form method="POST" action="busca.php">
                        <input type="text" name="srch" placeholder="Search.." style="color:blanchedalmond" id="search">
                        <button type="submit" class="bg-dark">🔍</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>

<!--Conteudo da empresa-->
<div class="row">
    <div class="col-8 m-auto bg-dark ">
        <h1 id="h1p-2">Nossa Empresa</h1>
        <hr id="hr-produtos">
    </div>
</div>
<div class="row">
<div class="col-2"></div>
    <div class="col-2 bg-dark fluid"><br><br><br>
        <img src="img/eu.jpg" style="height: 200px; width: 180px; text-align:center;" class="img-fluid rounded">
    </div>
    <div class="col-6 bg-dark">
        <h4 style="text-align: left; color:antiquewhite"><br>Arthur Henrique Róvero:</h4>
        <p id="pp" style="text-align: left;">Nascido em 05/03/1991, eu Arthur Róvero com um sonho de criança, e muita bagagem nerd tentei por muito tempo criar uma loja que fosse o sonho de outras crianças assim como o meu, começei vendendo posters, e jogos em uma locadora.<br><br>

        Naquela época o auge dos filmes e jogos eletronicos dominavam juventude e até os mais velhos, com isso hoje meu sonho e o de muitos tornou tudo isso em realidade.<br><br>
    
        Nossa loja "Knight Games" na verdade é a antiga "bazzar Toys for Fun" Hoje somos uma das maiores lojas de vendas de games em midias digitais e fisicas, competindo com a famosa e insuperavel STEAM, e Epic Games.</p>
    </div>
    <div class="col-2"></div>
    
</div>

<!--mapa e Localizaçao-->
<div class="row">
    <div class="col-8 m-auto bg-dark ">
    <hr id="hr-produtos">
        <h1 id="h1p-2">Localização</h1>
        <hr id="hr-produtos"><br>
    </div>
</div>
<div class="row">
<div class="col-2"></div>
    <div class="col-4 bg-dark">
        <img src="img/mapa.jpg" style="height: 400px; width: 400px; text-align:center;" class="img-fluid rounded">
    </div>
    <div class="col-4 bg-dark">
        <h4 style="text-align: left; color:antiquewhite">Praça dos Emancipadores> Centro> Jauzin:</h4>
        <p id="pp" style="text-align: left;">Apesar de nossa loja tenha crescido exponencialmente, continuamos no mesmo endereço, pois 85% de nossas vendas são online.</p><br><hr id="hr-produtos"><br>
        <img src="img/pro.png" alt="promoçao" style="height: 90px; width: 250px;"><br><br>
        <p id="pp" style="text-align: left;">Entre em contato com a gente, e faça seu cadastro para receber as melhores ofertas e promoções no meio da semana.  <a href="cadastrar.php" class="text-blue-50 fw-bold">  Cadastrar</a><br><br>
    </p>
    </div>
    <div class="col-2"></div>
</div>
</div>
<br>

<!--rodapé-->
<?php
    include('rodape.php');
?>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>