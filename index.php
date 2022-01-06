<?php
require_once('conn.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Site de Vendas</title>
</head>
<body background="img/wall.jpg" id="fundo" > 

<!--Cabeçalho-->
        <div>
            <div class="row top justify-content-center bg-dark" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;">
                <div class="col-4 text-center">
                    <a href="categoria_produtos.php" style="text-decoration: none;"
                    class="badge badge-light" >✏️ Categorias/ Gênero</a>
                </div>
                <div class="col-4 text-center">
                    <a href="insere_produtos.php" style="text-decoration: none;"
                    class="badge badge-light" >✏️ Produtos da Loja</a>
                </div>
                <div class="col-4 text-center">
                    <a href="cadastrar.php" style="text-decoration: none;"
                    class="badge badge-light" >✏️ Cadastre-se</a>
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

<!--Carrosel-->
<div class="row " >
    <div class="col-8 m-auto bg-dark  justify-content: center" >
<div id="carouselExampleControls" class="carousel slide  bg-dark" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="#"><img src="img/pes.jpg" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
      <a href="#"><img src="img/eldenring.jpg" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
      <a href="#"><img src="img/farcry6.jpg" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
      <a href="#"><img src="img/forza5.jpg" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
        <a href="produto_1.php"><img src="img/cleiton.jpg" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
      <a href="#"><img src="img/gta.jpg" class="d-block w-100" alt="..."></a>
      </div>
      <div class="carousel-item">
      <a href="#"><img src="img/assassins.jpg" class="d-block w-100" alt="..."></a>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
</div>

<!--conteudo do produtos-->
<?php

$sql = "SELECT * FROM produtos INNER JOIN categorias ON 
(produtos.id_categoria = categorias.id_categoria)  ORDER BY id_produto DESC ";
    $res = mysqli_query($conn, $sql);

    while($lin = mysqli_fetch_array($res, 2)){
      
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
</div>

<!--paginação-->
<br>
<nav aria-label="Page navigation example ">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link bg-dark" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item"><a class="page-link bg-dark" href="#">1</a></li>
      <li class="page-item"><a class="page-link bg-dark" href="#">2</a></li>
      <li class="page-item"><a class="page-link bg-dark" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link bg-dark" href="#">Next</a>
      </li>
    </ul>
  </nav>

<!--rodapé-->
  <?php
    include('rodape.php');
  ?>
  
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>