
<?php
//inicia sessao
session_start();

//dados
        require_once("conn.php");
        //atualiza valores

        if(isset($_POST['btne'])){
          if(isset($_SESSION['logado'])){

            $id = $_POST['ocultoid'];
            $nome = $_POST['txtnome'];
            $senha = $_POST['senha'];
            $email = $_POST['email'];
            $whatsapp = $_POST['whatsapp'];
            
            $sql = "UPDATE usuario SET nome='$nome', senha='$senha', email='$email', whatsapp='$whatsapp'  WHERE id='$id'";       
            $res = mysqli_query($conn, $sql);
           // testa de sunciona
            if(!$res){

                echo mysqli_error($conn);
            }else{
               // volta para principal em 2 segundos
              
               sleep(1);
               header("location: alterar_cadastro.php");
            }
        }}
  else{
  sleep(1);
  header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arteraçao de registro</title>
</head>
<body>
    <h1>Alteraçao de Registro</h1> 
    
</body>
</html>