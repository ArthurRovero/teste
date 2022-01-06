<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Produto 1</title>
</head>
<style>
</style>
<body background="img/wall.jpg" id="fundo" > 
    
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
                <a class="nav-item nav-link" href="#">PROMOÇÃO</a>
                <a class="nav-item nav-link" href="#">CARRINHO</a>
                <div >
                    <input type="text" placeholder="Search.." id="search">
                </div>
            </nav>
        </div>
    </div>

<!--Carrossel-->
    <div class="row align-items-center">
        <div class="col-8 m-auto bg-dark  justify-content: center;">
        <h1 id="h1p-2">Screen Shoot</h1>
            <div id="carouselExampleControls" class="carousel slide " data-bs-ride="carousel">
                <div class="carousel-inner" >
                    <div class="carousel-item active " >
                        <img src="img/screenshoot/God/001.jpg" class="d-block w-100" > 
                    </div>
                    <div class="carousel-item">
                        <img src="img/screenshoot/God/02.jpg" class="d-block w-100" >
                    </div>
                    <div class="carousel-item">
                        <img src="img/screenshoot/God/03.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="img/screenshoot/God/04.jpg" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="img/screenshoot/God/05.jpg" class="d-block w-100">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button"     data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"     data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Informaçao do Produto-->

<div class="container">
<div class="row align-items-center">
    <div class="col-8 m-auto bg-dark">
    <h4 style="color: antiquewhite; text-align:center;"><br>God of War PC, Digital Edition</h4></a>
        <hr id="hr-produtos">
            <p id="pp">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda natus quas sit atque numquam accusantium facere, aliquid omnis quidem placeat Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint vero maiores eligendi ipsam est architecto placeat quis iste pariatur, saepe reprehenderit incidunt ut voluptatibus suscipit, amet cum et sapiente. Cumque!
            </p>
            <div class=" media col-12 bg-dark" id="btn-buy" aria-pressed="true">

<!--Incorporar-->
        <h1 id="h1p-2">Trailer</h1>
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FyIwEFXOcaE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            <hr id="hr-produtos">
            <h1 class="price" id="h1p-2">199,00</h1>
            <a href="#"><button type="button" class="btn btn-primary" >Comprar</button></a>
        </div>
    </div>
</div>
<br>
<br>
        <?php include('rodape.php');?>

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>