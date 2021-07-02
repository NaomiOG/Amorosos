<!DOCTYPE html>
<html>
<head>
	<title>Diario Lince ITC</title>
	<script src="jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://es.meteocast.net/tpl/css/styles.css?795" media="all" />
	<link rel="stylesheet" type="text/css" href="css/noticias.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript">
		 $(document).ready(function(){  
			$( "#ciudades" ).on('change',function(){
 				var filtro=$( "#ciudades" ).val();
 				filtro=filtro.split("C.I.N.").join("cuna de la independencia nacional");
 				filtro=filtro.split(" ").join("-");
        		var parametros='ciudad='+filtro;
 				console.log(filtro);
		              $.ajax({
		                type:"POST",
		                method:"POST",
		                url: "pronostico.php", 
		                data: parametros,
		                success: function(datos){
		                console.log(datos);
		                console.log(parametros);
		                  $("#divPronostico").html(datos);
		                }
		              });
 			});
		});
	</script>
</head>
<body>
	
	<div style="background-color: black;">
		<a class="nav-link active" href="#" width=100% style="color:white;">
      		Guanajuato, 
      		<?php 
      		setlocale (LC_TIME, "es_ES.UTF-8");
      		echo "".strftime(" %d/%m/%Y");
      		?>
      </a>
	</div>
	<div id="encabezado">
		El Diario <img src="imagenes/lynx.png" width="50px" height="50px" /> itc 
	</div>
	<div style="font-family:Century Gothic; text-align:center; margin-top: 20px;">
		<h5 style="text-align: center;">Pronóstico del tiempo</h5>
		<select style="font-size: 1em;" name="ciudades" id="ciudades">
			<option selected disabled>Selecciona un municipio</option>
			<option>Abasolo</option>
			<option>Acámbaro</option>
			<option>Apaseo el Alto</option>
			<option>Apaseo el Grande</option>
			<option>Atarjea de crucitas</option>
			<option>Celaya</option>
			<option>Comonfort</option>
			<option>Coroneo</option>
			<option>Cortazar</option>
			<option>Cuerámaro</option>
			<option>Doctor Mora</option>
			<option>Dolores Hidalgo C.I.N.</option>
			<option>Guanajuato</option>
			<option>Huanímaro</option>
			<option>Irapuato</option>
			<option>Jaral del Progreso</option>
			<option>Jerécuaro</option>
			<option>León</option>
			<option>Ciudad Manuel Doblado</option>
			<option>Moroleón</option>
			<option>Ocampo</option>
			<option>Pénjamo</option>
			<option>Pueblo Nuevo</option>
			<option>Purísima de Bustos</option>
			<option>Romita</option>
			<option>Salamanca</option>
			<option>Salvatierra</option>
			<option>San Diego de la Unión</option>
			<option>San Felipe</option>
			<option>San Francisco del Rincón</option>
			<option>San José Iturbide</option>
			<option>San Miguel de Allende</option>
			<option>Santa Catarina</option>
			<option>Juventino Rosas</option>
			<option>Santiago Maravatío</option>
			<option>Silao</option>
			<option>Tarandacuao</option>
			<option>Tarimoro</option>
			<option>Tierra Blanca</option>
			<option>Uriangato</option>
			<option>Valle de Santiago</option>
			<option>Victoria</option>
			<option>Villagrán</option>
			<option>Xichú</option>
			<option>Yuriria</option>
		</select><br/><br/>
		<div  id="divPronostico">
			
		</div>
		<div class="divInfo">
			<img src="imagenes/info1.png" width="250px" height="150px"/>
			<div style="display: inline-block; margin-left: 5px">
				<h6>SE INAUGURA VIALIDAD EN BENEFICIO DE LA COMUNIDAD DEL TECNM EN CELAYA</h6>
				<p>Con el objetivo de beneficiar y contribuir en la seguridad de los estudiantes del Tecnológico Nacional de México en Celaya, el día de hoy con un acto simbólico y atendiendo las medidas de sana distancia, la Alcaldesa de Celaya Elvira Paniagua Rodríguez, acompañada del Director del TecNM en Celaya, José López Muñoz y el Director General de Obras Publicas Juan Gaspar García Aboytes, realizaron la inauguración y entrega de la calle Presa Neutla.</p>
			</div>
			
		</div>
		<div class="divInfo">
			<img src="imagenes/info2.png" width="250px" height="150px"/>
			<div style="display: inline-block; margin-left: 5px">
				<h6>A LA VANGUARDIA EN TECNOLOGÍAS, EL TECNM EN CELAYA IMPLEMENTA MÓDULO DE CONSTANCIAS DIGITALES.</h6>
				<p>Atendiendo las necesidades y demandas actuales ante la situación de contingencia sanitaria por el COVID-19, y como acción de mejora continua de los servicios escolares en la institución, docentes adscritos al Centro de Cómputo en colaboración con el departamento de Servicios Escolares del TecNM en Celaya, implementaron Módulo de Constancias Digitales.
				Los docentes que participaron en el desarrollo del proyecto son: Jesús Sánchez Farías, Luis Alberto López González, Rubén Torres Frías e Ignacio Cerca Vázquez, quienes comentaron, que el modulo se encuentra insertado en el Sistema de Información Integral (SII).</p>
			</div>
		</div>
		<hr style="margin-left: 30px; margin-right: 30px;" size="8px" color="black" />
		<h3 style="color: #3D94A4; text-align: left; margin-left: 30px;">Coronavirus</h3>
		<div class="divInfo" style="text-align: center;">
			<?php 
				$result=file_get_contents("https://news.google.com/covid19/map?hl=es-419&mid=/m/0259ws&gl=MX&ceid=MX:es-419");
				$datos=explode('<div class="eWp4nd">', $result);
				$datos=explode('<div class="dzRe8d pym81b  "><h3 class="wH7mg" id="data-table-label">', $datos[1]);
				$datos=str_replace('<span id="i6">Fuente</span>: <a class="YjZvJe GQQ5oc" href="https://en.wikipedia.org/wiki/2020_coronavirus_pandemic_in_Mexico" target="_blank" aria-describedby="i6"><span class="bGEAFd">Wikipedia</span></a></span>','', $datos[0]);
				$datos=str_replace('div class="RbBDcc"','div style="font-family: Century Gothic;
				text-align: center; font-size: 1.2em;" class="badge badge-pill badge-danger"', $datos);		 
				echo $datos;
			?>
			
		</div>
		<div style="margin-left: 30px; margin-right: 30px; margin-top: 20px;">
			<?php 
				$result=file_get_contents("https://news.google.com/covid19/map?hl=es-419&mid=/m/0259ws&gl=MX&ceid=MX:es-419");
				$datos=explode('<div class="dzRe8d pym81b  ">', $result);
				$datos=explode('</div><div class="yNvlUb">', $datos[1]);
				$datos=str_replace('table', 'table class="table table-hover" style="text-align:center;"', $datos[0]);
				echo $datos;
			?>
			
		</div>
	</div>
</body>
</html>