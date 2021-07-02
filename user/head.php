
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
      #user{
          background: url("../imagenes/iconos.png");
          background-position: -95px -635px;
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
       #perfil{
          background: url("../imagenes/iconos.png");
          background-position: -290px 0px;
          cursor:pointer;
          width: 25px;
          height: 20px;
      }
       #buscar{
          background: url("../imagenes/iconos.png");
          background-position: -47px -0px;
          cursor:pointer;
          width: 25px;
          height: 20px;
      }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php"><img id="home" src="../imagenes/img_trans.png"/>Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="perfil.php"><img id="perfil" src="../imagenes/img_trans.png"/>Mi perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="buscar.php?E=4"><img id="buscar" src="../imagenes/img_trans.png"/>Buscar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="acercaDe.php"><img id="about" src="../imagenes/img_trans.png"/>About</a></li>
         <li class="nav-item">
        <a class="nav-link" href="../formAcceso.php"><img id="salir" src="../imagenes/img_trans.png"/>Cerrar sesión</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <span style="font-family: Century Gothic; color: white;"><b>
          <?
            session_start();
            echo $_SESSION['nombre'];  
            if($_SESSION['foto']!=""){
              echo '&nbsp&nbsp<img src="../imagenes/perfiles/'.$_SESSION['id'].'.'.$_SESSION['foto'].'" width="40px" heigh="40px">';
            }
            else{
              echo '&nbsp&nbsp<img id="user" src="../imagenes/img_trans.png"s />';
            }
            ob_start();
   
          ?>
      </b></span>
      
    </form>
  
  </div>
</nav>


</body>
</html>
