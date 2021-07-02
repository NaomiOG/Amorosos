<!DOCTYPE html>
<html>
<head>
	<title>Buscar</title>
	<?php
  
  //include "../herramientas.php";
  include ("class/classPerfil.php");
	?>
	<script src="jquery-3.5.1.min.js">
    </script>
    <script src="jquery-confirm.js">
    </script>
	<script>
		  
    function cerrar(){
          $("#capaDatosUser").hide();
     }//cierra la capa de datos del usuario

     function cerrarDetallado(){
          history.back();
     }//cierra el perfil y vuelve a la lista de usuarios

      function a_onClick() {
        document.getElementById("perfil").click();
      }

      function mostrarUsuario(cont){
        $("#buscador").val("");
        nombre=$("#nom"+cont).html();
        console.log(nombre);
        var parametros='filter='+nombre;
              $.ajax({
                type:"POST",
                method:"POST",
                url: "buscar.php?E=5", 
                data: parametros,
                success: function(imprime){
                  $(location).attr('href','buscar.php?E=5&'+parametros);
                }
              });
      }
	</script>
</head>
<body>
	<div id="capaDatos" style="background-color:#FEDCEE; width:500px; margin-top: 300px; position:absolute; margin-left: 700px; z-index: 1; box-shadow: 6px -9px 15px #000;
       border-radius: 4px;">
     <div id="capaDatosUser" style="background-color:#FEDCEE; width:300px; position:absolute;
     padding: 0; box-shadow: 6px -9px 15px #000;
       border-radius: 4px;"></div>
    </div>

</body>
</html>
<?php
 
	

if(isset($_GET['E'])){
    $E=$_GET['E'];
    switch ($E) {

    case 1:
    //muestra la información del usuario seleccionado
    echo $objetoPerfil->mostrarPerfil($_POST['filter']);
	break;
	case 2:
	include "head.php";
	//Genera la lista de los usuarios que coinciden con los criterios de búsqueda
    if(($_GET['edad1']==""&&$_GET['edad2']=="")||($_GET['edad1']>$_GET['edad2'])||$_GET['carac']==""||$_GET['hob']==""){
      echo '<div class="alert alert-dismissible alert-secondary" style="margin-top:15px;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>No llenaste correctamente los campos de búsqueda</strong>
            </div>';
    }   
    else{
      
      echo $objetoPerfil->buscadorEspecifico($_GET['sexo'],$_GET['hob'],$_GET['carac'],$_GET['edad1'],$_GET['edad2'],$_GET['relacion']);  
    }
    

    break;
    case 3:
    //muestra los usuarios que coinciden con el nombre ingresado
    echo $objetoPerfil->buscador($_POST['filter']);
	break;
	case 4:
	include "head.php";
    //muestra los usuarios que coinciden con el nombre ingresado
    echo $objetoPerfil->totalUsuarios();
	break;
	case 5:
    include "head.php";
     //muestra la información detallada del usuario seleccionado
    echo $objetoPerfil->mostrarPerfilDetallado($_GET['filter']);
	break;
	}
}

?>