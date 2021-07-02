
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
<form method="post" action="recuperar.php">  
    <legend>Recuperar Contraseña</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="email" name ="email" aria-describedby="emailHelp" placeholder="Enter email">
     
    </div>
    <button type="submit" class="btn btn-primary">Recuperar</button>
</form>
</div>

</body>
</html>


