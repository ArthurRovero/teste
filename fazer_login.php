<?php

//conectar ao bd
require_once('conn.php');  

//inicia a sessao
session_start();                 

if(isset($_POST['btn-entrar'])){

    //armazena os erros em uma matriz atualmente vazia
    $erros = array();    
    $login = mysqli_escape_string($conn, $_POST['login']);
    $senha = mysqli_escape_string($conn, $_POST['senha']); 

    //testa se os campos estao vazios e exibe um erro 
    if(empty($login) or empty($senha)){      

      $erros[] = "<div class='alert alert-warning col-4 m-auto' role='alert'>
                      O campo login/senha estao vazios
                  </div>";
    }else{

      $sql = "SELECT nome FROM usuario WHERE nome = '$login'";
      $res = mysqli_query($conn, $sql);


       //testa se ha algum registro dentro de $res  
      if(mysqli_num_rows($res)>0){   

        //criptografia de senha
        $senha  = md5($senha);
        $sql = "SELECT * FROM usuario WHERE nome = '$login' AND senha = '$senha'";//teste se os nomes e senhas estao batendo com o BD
        $res = mysqli_query($conn, $sql);

        //testa se existe uma correspondencia onde 1 nome e 1 senha batem ao mesmo tempo  
        if(mysqli_num_rows($res) == 1){   
                                
          $dados = mysqli_fetch_array($res);
          $_SESSION['logado'] = true;
          $_SESSION['id_usuario'] = $dados['id'];
          sleep(1);
          header('location: restrita.php');
        }else{

          $erros[] = "<div  class='alert alert-warning col-4 m-auto' role='alert'>
                          Usuário e Senha não batem!
                      </div>";
        }
        
      }else{
        $erros[] = "<div class='align-items-start alert alert-warning col-4 m-auto' style='overflow: hidden;' role='alert'> Usuario inexistente</div>";
      }
    }
}
?> 

<!--erros-->
<?php

    if(!empty($erros)){
        foreach($erros as $erro){
        echo $erro;
    }}
?>

<!--html-->
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet" >
    <title>Login</title>
</head>
<body  background="img/wall3.jpg" id="fundo">
  
<!--form-->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="formulario">
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase" id="h1p">Login</h2>
              <p class="mb-5" id="pp">Digite nome de usuário e senha</p>
              <div class="form-outline form-white mb-4">
                <input type="text" name="login" id="pp" class="form-control form-control-lg bg-dark" placeholder="usuário" />
                <label class="form-label" for="typeEmailX"></label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="senha" id="pp" class="form-control form-control-lg bg-dark" placeholder="senha" />
                <label class="form-label" for="typePasswordX"></label>
              </div>

              <button class="btn btn-primary btn-lg px-5" type="submit" name="btn-entrar">Entrar</button>
              
              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>
            </div>
            <div>
              <p class="mb-0">Ainda nao tem conta? <a href="cadastrar.php" class="text-blue-50 fw-bold">Cadastre-se</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>
</html>