<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
<?
include "header.php";
?>
<div class="container" style="margin-top: 20px">
<form method="post" action="validar.php">  
    <legend>Login</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="email" name ="email" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name= "clave" class="form-control" id="clave" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<!--
<div class="container" style="margin-top: 20px">
  <form>
    <div class="row">
      <label class="col-md-1" for="usr">Equipo</label>
      <div class="col-md-11">
        <input type="text" name="usr" class="form-control">
      </div>
    </div>
    <div class="row" style="margin-top: 10px">
      <label class="col-md-1" for="clave">Clave</label>
      <div class="col-md-11">
        <input type="password" name="pwd" class="form-control">
      </div>
    </div>
    <div class="row" style="margin-top: 10px">
      <div class="col-md-12">
        <button class="btn-primary">Enviar</button>
      </div>
    </div>
  </form>-->
</div>
<?

session_start();
session_destroy();

  if(isset($_GET['E'])){
    $E=$_GET['E'];
    switch ($E) {

    case 1:
      echo"<h3>Datos incorrectos</h3>";
      break;
    case 7:
      echo"<h3>Registro exitoso</h3>";
      break;
    case 10:
      echo"<h3>La cuenta que se desea registrar ya existe</h3>";
      break;
    case 15:
      echo"<h3>Revisa tu correo hemos enviado una nueva clave</h3>";
      break;
    case 25:
      echo"<h3>No podemos Recuperar la contraseña porque el correo no existe</h3>";
      break;
    case 35:
      echo "La clave del administrador";
      break;
    case 45:
      echo "Acceso no autorizado";
      break;

  }
  }
  
?>

</body>
</html>