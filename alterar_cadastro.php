<?php

  require_once('conn.php');

//inicia sessao
session_start();

//dados
if(isset($_SESSION['logado'])){

  $id = $_SESSION['id_usuario'];
  $sql = "SELECT * FROM usuario WHERE id = '$id'";
  $res = mysqli_query($conn, $sql);
  $dados = mysqli_fetch_array($res, 2);
}else{
  sleep(1);
  header('location: index.php');
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
        <title>Alterar dados da Conta</title>
    </head>
    <body  background="img/wall3.jpg" id="fundo">

<form  action="alterar_cadastro_02.php" method="POST" id="formulario">
<section class="vh-100 gradient-custom">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-12 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase" id="h1p">SUA CONTA</h2>
              <p class="mb-5" id="pp">Preencha os campos para alterar seus dados</p>

              <div class="form-outline form-white mb-2">
                <p id="pp2" style="text-align: left;">📝Nome<input type="text" name="txtnome" id="pp" class="form-control form-control-lg bg-dark" 
                value="<?php  if(isset($dados)){echo $dados[1];}?>" />
                <label class="form-label" for="typeNameX"></label></p>
              </div>

              <div class="form-outline form-white mb-2">
              <p id="pp2"  style="text-align: left;">📝Senha<input type="password" name="senha" id="pp" class="form-control form-control-lg bg-dark" 
                value="<?php  if(isset($dados)){echo $dados[2];}?>" />
                <label class="form-label" for="typePasswordX"></label>
              </div>

              <div class="form-outline form-white mb-2">
              <p id="pp2"  style="text-align: left;">📝Email<input type="email" name="email" id="pp" class="form-control form-control-lg bg-dark" 
                value="<?php  if(isset($dados)){echo $dados[3];}?>" />
                <label class="form-label" for="typeEmailX"></label>
              </div>

              <div class="form-outline form-white mb-2">
              <p id="pp2"  style="text-align: left;">📝Whatsapp<input type="tel" name="whatsapp" id="pp" class="form-control form-control-lg bg-dark"
                 value="<?php  if(isset($dados)){echo $dados[4];}?>" />
                <label class="form-label" for="typeNumberX"></label>
              </div>

              <p><input type="hidden" name="ocultoid" value="<?php if(isset($dados)){echo $dados[0];} ?>"></p>

              <button class="btn btn-primary btn-lg px-5" type="submit" name="btne">Alterar</button>
            </div>
            <div>
              <p class="mb-0">Ja possui conta? <a href="fazer_login.php" class="text-blue-50 fw-bold">Entrar</a></p>
            </div>
            <div>
              <p class="mb-0">Voltar à Loja <a href="restrita.php" class="text-blue-50 fw-bold">Aqui</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
    </body>
    </html>