<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="jquery-3.5.1.min.js">
	</script>
	<script src="jquery-confirm.js">
	</script>
	
	<script src="select2.js"></script>

	<link type="text/css" href="select2.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="jquery-confirm.css">
	
	
	<?
	include "head.php";
	include ("../herramientas.php");
	include ("class/classPerfil.php");
	$row=$objetoBD->saca_tupla("SELECT * from usuario where id=".$_SESSION['id']);
	 

	?>
	<style type="text/css">
		label{
        font-family: Century Gothic;
        font-size: 1em;
        color: black;
        }
	</style>
	<script>		
		var banCarac="false";
		var banPeli="false";
		var banLibro="false";
		var banJuego="false";
		var banHobbie="false";

		$(document).ready(function(){	
			$('.js-example-basic-multiple').select2();	
 			$( "#caracteristicas" ).on('change',function(){
 				banCarac="true";
 				console.log(banCarac);
 			});
 			$( "#peliculas" ).on('change',function(){
 				banPeli="true";
 				console.log(banPeli);
 			});
 			$( "#libros" ).on('change',function(){
 				banLibro="true";
 				console.log(banLibro);
 			});
 			$( "#juegos" ).on('change',function(){
 				banJuego="true";
 				console.log(banJuego);
 			});
 			$( "#hobbies" ).on('change',function(){
 				banHobbie="true";
 				console.log(banHobbie);
 			});

				
			$("#actualizar").click(function(){
					var fd = new FormData();
					fd.append('nombre',$("#nombre").val());
					fd.append('apellidos',$("#apellidos").val());
					fd.append('nacimiento',$("#nacimiento").val());
					fd.append('resena',$("#resena").val());
					fd.append('clave',$("#clave").val());
					fd.append('relacion',$('#relacion').val());
					fd.append('genero',$('input:radio[name=genero]:checked').val());
					var files = $('#archFoto')[0].files[0];
					fd.append('archFoto',files);
					fd.append('banCarac',banCarac);
					fd.append('banPeli',banPeli);
					fd.append('banLibro',banLibro);
					fd.append('banJuego',banJuego);
					fd.append('banHobbie',banHobbie);
					if(banCarac=="true"){
						arrayCarac=$('#caracteristicas').val();
						for (var i = 0; i < arrayCarac.length; i++) {
							fd.append('caracteristica'+(i+1),arrayCarac[i]);
							console.log(arrayCarac[i]);
						}
						fd.append('numCarac',arrayCarac.length);
					}
					if(banPeli=="true"){
						arrayPeli=$('#peliculas').val();
						for (var i = 0; i < arrayPeli.length; i++) {
							fd.append('pelicula'+(i+1),arrayPeli[i]);
						}
						fd.append('numPeli',arrayPeli.length);
					}
					if(banLibro=="true"){
						arrayLibro=$('#libros').val();
						for (var i = 0; i < arrayLibro.length; i++) {
							fd.append('libro'+(i+1),arrayPeli[i]);
						}
						fd.append('numLibro',arrayLibro.length);
					}
					if(banJuego=="true"){
						arrayJuego=$('#juegos').val();
						for (var i = 0; i < arrayJuego.length; i++) {
							fd.append('juego'+(i+1),arrayJuego[i]);
						}
						fd.append('numJuego',arrayJuego.length);
					}
					if(banPeli=="true"){
						arrayHobbie=$('#hobbies').val();
						for (var i = 0; i < arrayHobbie.length; i++) {
							fd.append('hobbie'+(i+1),arrayHobbie[i]);
						}
						fd.append('numHobbie',arrayHobbie.length);
					}

						$.confirm({
   						title: 'Guardar cambios',
	    				content: '¿Está seguro de almacenar los cambios?',
	    				type: 'red',
	    				buttons: {
        						confirmar:{
        						 btnClass:'btn-red',
        						 action: function () {
        							if(($("#clave").val()==$("#confirma").val())&&$("#clave").val()!=''){
        								$.ajax({
            							type:"POST",
            							method:"POST",
            							url: "perfil.php?E=edit", 
            							data: fd,
            							contentType: false,
            							processData: false
  										});
  										$.alert('Los cambios se han almacenado correctamente');
  										location.reload();
        							}
        							else{
        								$.alert('Error! Las contraseñas no coinciden o no son válidas');
        							}
        						}},
        						cancelar:{
        						btnClass:'btn-red',
        						action: function () {
            					$.alert('Los cambios se han descartado');
        						}},        			     
   						 }
					});
			});
		});
		
	</script>
	
</head>
<body>


<div style="margin-left: 120px; margin-top: 20px; width: 50%; display: inline-block;">

<form method="post" enctype="multipart/form-data" id="datosUser">  
    <div class="form-group">
      <label>Nombre</label>
      <input style="font-size: 1rem" type="text" class="form-control" id="nombre" name ="nombre" required value=
      <?php echo '"'.$row->nombre.'"' ?>>
    </div>
    <div class="form-group">
      <label>Apellidos</label>
      <input style="font-size: 1rem" type="text" class="form-control" id="apellidos" name ="apellidos" required value=
      <?php echo '"'.$row->apellidos.'"' ?>>
    </div>
    <div class="form-group">
      <label>Fecha Nacimiento</label>
      <input style="font-size: 1rem" type="date" class="form-control" id="nacimiento" name ="nacimiento" id="nacimiento" required value=
      <?php echo '"'.$row->fechNacimiento.'"' ?>>
    </div>
    <div class="form-group">
      <label>Descríbete</label><br/>
      <TEXTAREA cols="35" rows="5" id="resena" name="resena" required><?php echo $row->resena ?></TEXTAREA>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input style="font-size: 1rem" type="password" name= "clave" class="form-control" id="clave" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Confirma Password</label>
      <input style="font-size: 1rem" type="password" name= "confirma" class="form-control" id="confirma" placeholder="Password" required>
    </div>
    <div class="form-group" >
      <label>¿Qué tipo de relación buscas?</label>
      <select class="form-control" id="relacion" name="relacion" style="vertical-align: middle; font-size: 1rem">
           <option value="A" 
           <?
           echo (($row->tipoRelacionBusca=='A')?'selected':'');
           ?>
           >Amistad</option>
           <option value="P"
			<?
           echo (($row->tipoRelacionBusca=='P')?'selected':'');
           ?>
           >Pareja</option>
      </select>
    </div>

</div>

<div style="margin-left: -20px; margin-top: 20px; display: inline-block; width: 40%; position: absolute;">
	<label>Sexo</label>
	<div style="background-color: #F9D9F3; width: 65%; padding: 3px;">
		
		<label>Femenino<input type="radio" value="F" name="genero" <? 

		$aux='checked';
		echo ($row->sexo=='F')?$aux:''; ?>/></label><br/>
   		<label>Masculino<input type="radio" value="M" name="genero" <?
   		$aux='checked';
   		echo ($row->sexo=='M')?$aux:'';?>
			/></label>	
	</div><br/>
	
    <div class="form-group">
    	<label>Mis características</label><br>
    	<select data-placeholder="Selecciona tus características" class="js-example-basic-multiple" style=" width: 65%;" name="caracteristicas" id="caracteristicas" multiple="multiple">
  			<?php
         $cad="select id,tipo from caracteristica;";
         $objetoBD->consulta($cad);
         for ($i=0; $i < $objetoBD->numTuplas; $i++) { 
                 $tupla=mysqli_fetch_array($objetoBD->bloque);  
                 $aux=$objetoPerfil->tieneCaract($tupla[1],$_SESSION['id']);
                 echo "<option value=".$tupla[0]." ".$aux.">".$tupla[1]."</option>";
         }
      	?>
		</select>
    </div>
    <div class="form-group">
    	<label>Mis Hobbies</label><br>
    	<select data-placeholder="Selecciona tus Hobbies" class="js-example-basic-multiple" style=" width: 65%;" name="hobbies" id="hobbies" multiple="multiple">
  			<?php
         $cad="select id,gusto from hobies;";
         $objetoBD->consulta($cad);
         for ($i=0; $i < $objetoBD->numTuplas; $i++) { 
                 $tupla=mysqli_fetch_array($objetoBD->bloque);  
                 $aux=$objetoPerfil->tieneHobbie($tupla[1],$_SESSION['id']);
                 echo "<option value=".$tupla[0]." ".$aux.">".$tupla[1]."</option>";
         }
      	?>
		</select>
    </div>
    <div class="form-group">
    	<label>Cine</label><br>
    	<select data-placeholder="Selecciona tus películas favoritas" class="js-example-basic-multiple" style=" width: 65%;" name="peliculas" id="peliculas" multiple="multiple">
  			<?php
         $cad="select id,titulo from pelicula;";
         $objetoBD->consulta($cad);
         for ($i=0; $i < $objetoBD->numTuplas; $i++) { 
                 $tupla=mysqli_fetch_array($objetoBD->bloque);  
                 $aux=$objetoPerfil->gustaPeli($tupla[1],$_SESSION['id']);
                 echo "<option value=".$tupla[0]." ".$aux.">".$tupla[1]."</option>";
         }
      	?>
		</select>
    </div>
    <div class="form-group">
    	<label>Literatura</label><br>
    	<select data-placeholder="Selecciona tus libros favoritos" class="js-example-basic-multiple" style=" width: 65%;" name="libros" id="libros" multiple="multiple">
  			<?php
         $cad="select id,titulo from libro;";
         $objetoBD->consulta($cad);
         for ($i=0; $i < $objetoBD->numTuplas; $i++) { 
                 $tupla=mysqli_fetch_array($objetoBD->bloque);  
                 $aux=$objetoPerfil->gustaLibro($tupla[1],$_SESSION['id']);
                 echo "<option value=".$tupla[0]." ".$aux.">".$tupla[1]."</option>";
         }
      	?>
		</select>
    </div>
    <div class="form-group">
    	<label>Videojuegos</label><br>
    	<select data-placeholder="Selecciona Videojuegos favoritos" class="js-example-basic-multiple" style=" width: 65%;" name="juegos" id="juegos" multiple="multiple">
  			<?php
         $cad="select id,nombre from juegose;";
         $objetoBD->consulta($cad);
         for ($i=0; $i < $objetoBD->numTuplas; $i++) { 
                 $tupla=mysqli_fetch_array($objetoBD->bloque);  
                 $aux=$objetoPerfil->gustaJuego($tupla[1],$_SESSION['id']);
                 echo "<option value=".$tupla[0]." ".$aux.">".$tupla[1]."</option>";
         }
      	?>
		</select>
    </div>
	<label>Foto</label><br/>
	<input type="file" accept="image/*" name="archFoto" id="archFoto"/>
	
	<br/><br/>
	<button id="actualizar" type="button" class="btn btn-secondary">Actualizar</button>
</form>
</div>

<?
  
  if(isset($_GET['E'])){
    $E=$_GET['E'];
    switch ($E) {

    case "edit":
      $photo="";
		if(isset($_FILES['archFoto']['name'])&&$_FILES['archFoto']['name']>"")
		{
			$arreDatos=explode(".",$_FILES['archFoto']['name']);
			$photo=$_SESSION['id'].".".$arreDatos[count($arreDatos)-1];
			move_uploaded_file($_FILES['archFoto']['tmp_name'],"../imagenes/perfiles/".$photo);

			$_SESSION['foto']=$photo;
			
			$cad="update usuario set nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."',fechNacimiento='".$_POST['nacimiento']."', tipoRelacionBusca='".$_POST['relacion']."', clave=password('".$_POST['clave']."'), resena='".$_POST['resena']."', sexo='".$_POST['genero']."', foto='".$arreDatos[count($arreDatos)-1]."' where id=".$_SESSION['id'];
				$objetoBD->consulta($cad);
			$_SESSION['nombre']=$_POST['nombre'].' '.$_POST['apellidos'];
			
		}
		else{
			$cad="update usuario set nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."',fechNacimiento='".$_POST['nacimiento']."', tipoRelacionBusca='".$_POST['relacion']."', clave=password('".$_POST['clave']."'), resena='".$_POST['resena']."', sexo='".$_POST['genero']."' where id=".$_SESSION['id'];
			$objetoBD->consulta($cad);
			$_SESSION['nombre']=$_POST['nombre'].' '.$_POST['apellidos'];

			if($_POST['banCarac']=="true"){
				$cad="delete from tienecaracteristica where idUsuario=".$_SESSION['id'];
				$objetoBD->consulta($cad);
				for ($i = 0; $i < $_POST['numCarac']; $i++) {
					$cad="insert into tienecaracteristica(idUsuario,idCaracteristica) values (".$_SESSION['id'].", ".$_POST['caracteristica'.($i+1)].")";
					$objetoBD->consulta($cad);
				}	
			}
			if($_POST['banPeli']=="true"){
				$cad="delete from gustapelicula where idUsuario=".$_SESSION['id'];
				$objetoBD->consulta($cad);
				for ($i = 0; $i < $_POST['numPeli']; $i++) {
					$cad="insert into gustapelicula(idUsuario,idPelicula) values (".$_SESSION['id'].", ".$_POST['pelicula'.($i+1)].")";
					$objetoBD->consulta($cad);
				}	
			}
			if($_POST['banLibro']=="true"){
				$cad="delete from gustalibro where idUsuario=".$_SESSION['id'];
				$objetoBD->consulta($cad);
				for ($i = 0; $i < $_POST['numLibro']; $i++) {
					$cad="insert into gustalibro(idUsuario,idLibro) values (".$_SESSION['id'].", ".$_POST['libro'.($i+1)].")";
					$objetoBD->consulta($cad);
				}	
			}
			if($_POST['banJuego']=="true"){
				$cad="delete from practjuegoe where idUsuario=".$_SESSION['id'];
				$objetoBD->consulta($cad);
				for ($i = 0; $i < $_POST['numJuego']; $i++) {
					$cad="insert into practjuegoe(idUsuario,idJuegoE) values (".$_SESSION['id'].", ".$_POST['juego'.($i+1)].")";
					$objetoBD->consulta($cad);
				}	
			}
			if($_POST['banHobbie']=="true"){
				$cad="delete from hobies where idUsuario=".$_SESSION['id'];
				$objetoBD->consulta($cad);
				for ($i = 0; $i < $_POST['numHobbie']; $i++) {
					$cad="insert into tienehobies(idUsuario,idHobies) values (".$_SESSION['id'].", ".$_POST['hobbie'.($i+1)].")";
					$objetoBD->consulta($cad);
				}	
			}

		}
		echo $cad;
			
			
			
	break;
	
    
  	}
  	
  }
 
?>





</body>
</html>