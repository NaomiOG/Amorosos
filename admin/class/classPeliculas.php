
<script src="jquery-3.5.1.min.js">
  </script>
  <script src="jquery-confirm.js">
  </script>
  <script type="text/javascript">
  			function a_onClick() {
        		document.getElementById("btnDel").click();
      		}
  			function del(id){
  				$.confirm({
   						title: 'Eliminar elemento',
	    				content: '¿Está seguro de eliminar el registro?',
	    				type: 'blue',
	    				buttons: {
        						confirmar:{
        						 btnClass:'btn-blue',
        						 action: function () {
        								$.ajax({
            							type:"POST",
            							method:"POST",
            							url: "home.php?id="+id+"&accion=peliculas.delete", 
  										});
  										$(location).attr('href',"home.php?id="+id+"&accion=peliculas.delete");
  										$.alert('Se ha eliminado el elemento correctamente');
  										
             						}},
        						cancelar:{
        						btnClass:'btn-blue',
        						action: function () {
            					$.alert('Los cambios se han descartado');
        						}},        			     
   						 }
					});
  			}
  </script>
  <link rel="stylesheet" type="text/css" href="jquery-confirm.css">

<?php


if(!class_exists("baseDatos"))
	include("../herramientas.php");

	class Peliculas extends baseDatos{
		
		function accion($cual,$id=-1){
			$result="";
			switch ($cual) {
			
				case 'list':

				$result=$this->showTabla("select p.id,titulo as Título,tipo as Género from pelicula p join genero g on p.idGenero=g.id ",array("5%","60%","25%"),true,array("edit","delete"));
					break;

				case 'insert':
			 
				$this->consulta("insert into pelicula set titulo='".$_POST['nombre']."' , idGenero=".$_POST['idGenero']);
				
				$result=$this->accion("list");
				
				break;

				case 'update':
		        $this->consulta("UPDATE pelicula set titulo='".$_POST['nombre']."', idGenero=".$_POST['idGenero']." where id=".$_POST['id']);
		        $result=$this->accion("list"); 
		    	break;	

				case 'delete':
					$this->consulta("delete from pelicula where id=".$id);
					
				
					$result=$this->accion("list");
					
					break;
				case 'formEdit': 
				$row=$this->saca_tupla("SELECT * from pelicula where id=".$_REQUEST['id']);
				case 'formNew':
				
					$result.='
					<div class="container" style="margin-top: 20px">
					<form method="post">
						<div class="form-group">
					        <label>Título</label>
					        <input type="text" class="form-control" id="titulo" name="nombre" placeholder="Título del libro" value="'.((isset($row->nombre))?$row->nombre:'').'" />
					    </div>
	    				<div class="form-group">
					        <label>Género</label>'
					        .$this->creaLista("genero","id","tipo","idGenero",((isset($row->nombre))?$row->idGenero:'')).
					    '</div>';			
					    

					$result.=(isset($row->nombre)?'<button class="btn btn-sm- btn-primary">Actualizar</button><input type="hidden" name="id" value="'.$row->id.'"/><input type="hidden" name="accion" value="peliculas.update"     />':'<button class="btn btn-sm- btn-primary">Registrar</button><input type="hidden" name="accion" value="peliculas.insert" />');

					$result.='</form>
					</div>';
			}
			return $result;
		}

		function showTabla($query,$medidas=array(),$agregar=false,$p_iconos=array(),$p_colorRenglon="table-primary"){
		//3.Consumir datos
		$this->consulta($query);
		$result='<html>
		<head>
			<style>
			#edit{
					background: url("../imagenes/iconos.png");
					background-position: -95px -80px;
					cursor:pointer;
					width: 30px;
		  			height: 20px;
				}
				#delete{
					background: url("../imagenes/iconos.png");
					background-position: -120px -100px;
					cursor:pointer;
					width: 30px;
		  			height: 20px;
				}
				#add{
					background: url("../imagenes/iconos.png");
					background-position: -387px -20px;
					cursor:pointer;
					width: 30px;
		  			height: 20px;

				}
			</style>
		</head>
		<body>';
		$result.='<div class="container" style="margin-top: 20px;"><span class="badge badge-pill badge-primary">peliculas</span><table class="table">';
		#cabecera de las columnas

		$result.='<tr class=table-success>';
		$result.='<td colspan="'.count($p_iconos).'">'.(($agregar)?'<a href="?accion=peliculas.new"><img id="add" src="../imagenes/img_trans.png"/></a>':"&nbsp;").'</td>';
		for ($coluC=0; $coluC < mysqli_num_fields($this->bloque) ; $coluC++) { 
				$campo=mysqli_fetch_field_direct($this->bloque,$coluC);

				$result.='<th width="'.$medidas[$coluC].'">'.$campo->name.'</th>';
			}
		$result.='</tr>';

		#fin de las cabeceras

		for ($contR=0; $contR < $this->numTuplas; $contR++) { 
			$result.= '<tr '.(($contR%2)?'class="'.$p_colorRenglon.'"':'').'>';
			

			$tupla=mysqli_fetch_array($this->bloque);
			#íconos de acción
			if(in_array("delete", $p_iconos)){
				$result.='<td width="5%"><a id="btnDel" onmouseover="a_onClick" onclick="del('.$tupla[0].')"><img id="delete" src="../imagenes/img_trans.png" /></a></td>';
			}
			if(in_array("edit", $p_iconos)){
				$result.='<td width="5%"><a href="?id='.$tupla[0].'&accion=peliculas.formEdit"><img id="edit" src="../imagenes/img_trans.png"/></td>';
			}
			if(in_array("add", $p_iconos)){
				$result.='<td><img src="../imagenes/icono_add.png"/></td>';
			}

			for ($coluC=0; $coluC < mysqli_num_fields($this->bloque) ; $coluC++) { 
				$result.='<td>'.$tupla[$coluC].'</td>';
			}

			$result.= '</tr>';
		}
		$result.="</table></div></body></html>";
		return $result;
		}
		



	}
$objetoPeliculas=new Peliculas();
?>