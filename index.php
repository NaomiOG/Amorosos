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

<div class="jumbotron">
  <h1 class="display-3">Bienvenido</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>


</div>

<?
 include "herramientas.php";
 //echo $objetoBD->despliegaTabla("select * from usuario",array("delete","edit"));
  
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

  }
  }

  
  
?>


</body>
</html>