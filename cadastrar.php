
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" >
    <title>Cadastrar</title>
</head>

<!--insere o papel de parede-->
<body background="img/wall3.jpg" id="fundo">

    
<!--formulario cadastro-->
    <form  method="POST" id="formulario">
<section class="vh-100 gradient-custom">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-12 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase" id="h1p">Cadastrar</h2>
              <p class="mb-5" id="pp">Preencha os campos para ser cadastrado</p>

              <div class="form-outline form-white mb-2">
                <input type="text" name="txtnome" id="pp" class="form-control form-control-lg bg-dark" placeholder="nome" />
                <label class="form-label" for="typeNameX"></label>
              </div>

              <div class="form-outline form-white mb-2">
                <input type="password" name="senha" id="pp" class="form-control form-control-lg bg-dark" placeholder="senha" />
                <label class="form-label" for="typePasswordX"></label>
              </div>

              <div class="form-outline form-white mb-2">
                <input type="email" name="email" id="pp" class="form-control form-control-lg bg-dark" placeholder="e-mail válido" />
                <label class="form-label" for="typeEmailX"></label>
              </div>

              <div class="form-outline form-white mb-2">
                <input type="tel" name="whatsapp" id="pp" class="form-control form-control-lg bg-dark" placeholder="whatsapp" />
                <label class="form-label" for="typeNumberX"></label>
              </div>

              <div class="form-check">
                <input class="form-check-input" style="background-color: blue;" type="checkbox" value="" id="defaultCheck2">
                <label class="form-check-label" for="defaultCheck1" id="pp">Quero receber ofertas da loja!
                </label>
              </div>

              <button class="btn btn-primary btn-lg px-5" type="submit" name="btn">Salvar</button>
            </div>
            <div>
              <p class="mb-0">Ja possui conta? <a href="fazer_login.php" class="text-blue-50 fw-bold">Entrar</a></p>
            </div>
            <div>
              <p class="mb-0">Voltar à Loja <a href="index.php" class="text-blue-50 fw-bold">Aqui</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>

    <?php
        require_once("conn.php");

//insere cadastro do usuario no banco
        if(isset($_POST['btn'])){

        $nome = $_POST['txtnome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $whatsapp = $_POST["whatsapp"];
        
        $sql = "INSERT INTO `usuario` (nome, senha, email, whatsapp) VALUES ('$nome', MD5('$senha'), '$email', '$whatsapp')";
        $res = mysqli_query($conn, $sql);
    }

    //testa se funciona e redireciona pra tela de login
    if(isset($_POST['btn'])){
      sleep(2);
      header('location: fazer_login.php');
    }
    ?>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>
