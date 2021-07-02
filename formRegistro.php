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
  <form method="post" action="registro.php">
    <fieldset>
      <legend >Regístrate</legend>
      <div class="form-group">
        <label class="col-form-label" for="inputDefault" >Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu nombre" id="inputDefault">
      </div>
      <div class="form-group">
        <label class="col-form-label" for="inputDefault">Apellidos</label>
        <input type="text" class="form-control" name="apellidos" placeholder="Ingresa tus apellidos" id="inputDefault">
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu email">
        
      </div>
      
      </fieldset>
      <button type="submit" class="btn btn-primary">Registrar</button>
    </fieldset>
  </form>
</div>



</body>
</html>