<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <style>
      #home{
          background: url("../imagenes/iconos.png");
          background-position: -165px -41px;
          cursor:pointer;
          width: 30px;
          height: 20px;
      }
      
      #about{
          background: url("../imagenes/iconos.png");
          background-position: 0px -275px;
          cursor:pointer;
          width: 25px;
          height: 20px;
      }
       #salir{
          background: url("../imagenes/iconos.png");
          background-position: -45px -140px;
          cursor:pointer;
          width: 25px;
          height: 20px;
      }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  
  <div class="collapse navbar-collapse" id="navbarColor01">
     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php"><img id="home" src="../imagenes/img_trans.png"/>Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?accion=usuarios.list">Usuarios<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?accion=caracteristicas.list">Características</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?accion=genero.list">Género</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?accion=peliculas.list">Películas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?accion=autor.list">Autores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?accion=libros.list">Libros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?accion=juegos.list">JuegosE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?accion=hobbies.list">Hobbies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="acercaDe.php"><img id="about" src="../imagenes/img_trans.png"/>About</a></li>
         <li class="nav-item">
        <a class="nav-link" href="../formAcceso.php"><img id="salir" src="../imagenes/img_trans.png"/>Cerrar sesión</a>
      </li>
    </ul>
  
  </div>
</nav>

</body>
</html>