<?
if(!class_exists("baseDatos"))
	include("../herramientas.php");

	class Perfil extends baseDatos{
		function tieneCaract($caracteristica,$id){
			$ban=" ";
			$cad="select tipo from caracteristica c join tienecaracteristica tc on c.id=tc.idCaracteristica join usuario u on tc.idUsuario=u.id where idUsuario=".$id." and tipo='".$caracteristica."'";
			$this->consulta($cad);
			if($this->numTuplas){
				$ban="selected";
			}

			return $ban;

		}
		function tieneHobbie($hobbie,$id){
			$ban=" ";
			$cad="select gusto from hobies h join tienehobies th on h.id=th.idHobies join usuario u on th.idUsuario=u.id where idUsuario=".$id." and gusto='".$hobbie."'";
			$this->consulta($cad);
			if($this->numTuplas){
				$ban="selected";
			}

			return $ban;

		}
		function gustaPeli($pelicula,$id){
			$ban=" ";
			$cad="select titulo from pelicula p join gustapelicula gp on p.id=gp.idPelicula join usuario u on gp.idUsuario=u.id where idUsuario=".$id." and titulo='".$pelicula."'";
			$this->consulta($cad);
			if($this->numTuplas){
				$ban="selected";
			}

			return $ban;
		}
		function gustaLibro($libro,$id){
			$ban=" ";
			$cad="select titulo from libro l join gustalibro gl on l.id=gl.idLibro join usuario u on gl.idUsuario=u.id where idUsuario=".$id." and titulo='".$libro."'";
			$this->consulta($cad);
			if($this->numTuplas){
				$ban="selected";
			}

			return $ban;

		}
		function gustaJuego($juego,$id){
			$ban=" ";
			$cad="select j.nombre from juegose j join practjuegoe pj on j.id=pj.idJuegoE join usuario u on pj.idUsuario=u.id where idUsuario=".$id." and j.nombre='".$juego."'";
			$this->consulta($cad);
			if($this->numTuplas){
				$ban="selected";
			}

			return $ban;

		}
		function mostrarPerfil($nombre){
		$imprime="";
		$cad="select id, concat(nombre,' ',apellidos) as nombrep,foto, year(curdate())-year(fechNacimiento) as edad, resena from usuario HAVING nombrep='".$nombre."'";
		$this->consulta($cad);
		for ($i=0; $i < $this->numTuplas; $i++) { 
			$tupla=mysqli_fetch_array($this->bloque);
			$imprime.='<div  id="hola" style="margin-left:20px; position:absolute; background-color:#932E51; display:inline-flex; width:400px; box-shadow: 6px 3px 7px #000;
				 border-radius: 5px;">
				<div>
					<img style="height: 150px; width: 120px; margin-top:1px; margin-left:1px; border-radius: 50%;" src="../imagenes/perfiles/'.$tupla[0].'.'.$tupla[2].'" alt="Card image"/>
				</div>
				<div>
				<p id="nom'.$i.'"><b>'.$tupla[1].'</b><br/>'.$tupla[3].' años</p></a>
				<p><b>Sobre mí</b></br>'.$tupla[4].'</p>
				<b style="color:black; font-family:Century Gothic">Caracteristicas</b><ul>
				'

				;	
			}
			$cad="select tipo from caracteristica c join tienecaracteristica tc on c.id=tc.idCaracteristica join usuario u on tc.idUsuario=u.id where idUsuario=".$tupla[0];
			$this->consulta($cad);
			for ($i=0; $i < $this->numTuplas; $i++) { 
					$tupla=mysqli_fetch_array($this->bloque);
					$imprime.='<li>'.$tupla[0].'</li>';
			}
			$imprime.='</ul>
			<div style="margin-left:50px">
				<button style=" background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" onclick="cerrar()"><img src="../imagenes/heart.png" width="32px" height="32px" /></button>&nbsp&nbsp
				<button style=" background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" onclick="cerrar()"><img src="../imagenes/close.png" width="32px" height="32px" /></button>
			</div>
			</div></div>';
		return $imprime;
	}
	function mostrarPerfilDetallado($nombre){
		$imprime="";
		$cad="select id, concat(nombre,' ',apellidos) as nombrep,foto, year(curdate())-year(fechNacimiento) as edad, resena,fechUltiAcceso, tipoRelacionBusca from usuario HAVING nombrep='".$nombre."'";
		$this->consulta($cad);
		for ($i=0; $i < $this->numTuplas; $i++) { 
			$tupla=mysqli_fetch_array($this->bloque);
			$imprime.='<div  id="hola" style="position:absolute; background-color:#C27894; margin-top:20px; margin-bottom:20px; margin-left:18%; display:block; width:900px; box-shadow: 6px 3px 7px #000;
				 border-radius: 5px;">
				<div>
					<img style="height: 150px; width: 120px; margin-top:1px; margin-left:45%; border-radius: 50%;" src="../imagenes/perfiles/'.$tupla[0].'.'.$tupla[2].'" alt="Card image"/>
				</div>
				<div style="margin-left:20px; font-family:Century Gothic; color:black">
				<p id="nom'.$i.'" style="text-align:center;"><b>'.$tupla[1].'</b><br/>'.$tupla[3].' años<br/>Último acceso: '.$tupla[5].'</p></a>
				<p><b>Busco:</b> '.(($tupla[6]=='P')?'Pareja':'Amistad').'<br/><br/><b>Sobre mí</b></br>'.$tupla[4].'</p>
				<div style="display:inline-flex;">
				<div><b style="color:black; font-family:Century Gothic">Caracteristicas</b><ul>
				'

				;	
			}
			$usuarioSelec=$tupla[0];
			$cad="select tipo from caracteristica c join tienecaracteristica tc on c.id=tc.idCaracteristica join usuario u on tc.idUsuario=u.id where idUsuario=".$usuarioSelec;
			$this->consulta($cad);
			for ($i=0; $i < $this->numTuplas; $i++) { 
					$tupla=mysqli_fetch_array($this->bloque);
					$imprime.='<li>'.$tupla[0].'</li>';
			}
			$imprime.='</ul></div><div><b style="color:black; font-family:Century Gothic; margin-left:20px;">Hobbies</b><ul>';
			$cad="select Gusto from hobies c join tienehobies th on c.id=th.idHobies join usuario u on th.idUsuario=u.id where idUsuario=".$usuarioSelec;
			$this->consulta($cad);
			for ($i=0; $i < $this->numTuplas; $i++) { 
					$tupla=mysqli_fetch_array($this->bloque);
					$imprime.='<li>'.$tupla[0].'</li>';
			}
			$imprime.='</ul></div><div><b style="color:black; font-family:Century Gothic; margin-left:20px;">Peliculas</b><ul>';
			$cad="select p.Titulo from pelicula p join gustapelicula gp on p.id=gp.idPelicula join usuario u on gp.idUsuario=u.id where idUsuario=".$usuarioSelec;
			$this->consulta($cad);
			for ($i=0; $i < $this->numTuplas; $i++) { 
					$tupla=mysqli_fetch_array($this->bloque);
					$imprime.='<li>'.$tupla[0].'</li>';
			}
			$imprime.='</ul></div><div><b style="color:black; font-family:Century Gothic; margin-left:20px;">Libros</b><ul>';
			$cad="select titulo from libro l join gustalibro gl on l.id=gl.idLibro join usuario u on gl.idUsuario=u.id where idUsuario=".$usuarioSelec;
			$this->consulta($cad);
			for ($i=0; $i < $this->numTuplas; $i++) { 
					$tupla=mysqli_fetch_array($this->bloque);
					$imprime.='<li>'.$tupla[0].'</li>';
			}
			$imprime.='</ul></div><div><b style="color:black; font-family:Century Gothic; margin-left:20px;">Juegos</b><ul>';
			$cad="select j.nombre from juegose j join practjuegoe p on j.id=p.idJuegoE join usuario u on p.idUsuario=u.id where idUsuario=".$usuarioSelec;
			$this->consulta($cad);
			for ($i=0; $i < $this->numTuplas; $i++) { 
					$tupla=mysqli_fetch_array($this->bloque);
					$imprime.='<li>'.$tupla[0].'</li>';
			}

			$imprime.='</ul></div></div><br/><div style="margin-left:400px">
				<button style=" background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" onclick="cerrarDetallado()"><img src="../imagenes/heart.png" width="32px" height="32px" /></button>&nbsp&nbsp
				<button style=" background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;" onclick="cerrarDetallado()"><img src="../imagenes/close.png" width="32px" height="32px" /></button>
			
			</div></div>';
		return $imprime;
	}
	function buscadorEspecifico($sexo,$hobbie,$caract,$edad1,$edad2,$relacion){
		$imprime="";
		
			$cad="select DISTINCT u.id, concat(nombre,' ',apellidos) as nombre,foto, year(curdate())-year(fechNacimiento) as edad from usuario u join tienecaracteristica tc on tc.idUsuario=u.id join tienehobies th on th.idUsuario=u.id where ".(($sexo==1)?"sexo='F' and":(($sexo==2)?"sexo='M' and":" "))." tipoRelacionBusca='".$relacion."' and (".$hobbie." or ".$caract.") HAVING edad BETWEEN ".$edad1." and ".$edad2;
			$this->consulta($cad);
			$usuarios=$this->numTuplas;
			$imprime="<b style='font-family:Century Gothic; color:black; margin-left:500px;'>Número de resultados:</b> ".$usuarios."<br/>";
			$top=50;
			for ($i=0; $i < $this->numTuplas; $i++) { 
			$tupla=mysqli_fetch_array($this->bloque);
			$imprime.='<div id="capaPerfiles" style="margin-top:'.$top.'px; margin-left:500px; position:absolute; background-color:#FCEFF4; display:inline-flex; width:400px; box-shadow: 1px 3px 5px #000;
				 border-radius: 1px;">
				<div>
					<img style="height: 50px; width: 50px;" src="../imagenes/perfiles/'.$tupla[0].'.'.$tupla[2].'" alt="Card image"/>
				</div>
				<div>
				<a id="perfil"  onmouseover="a_onClick" onclick="mostrarUsuario('.$i.')"><h6 id="nom'.$i.'" style="font-family:Century Gothic; font-weight:bold; color:#D20755">'.$tupla[1].'</h6><h6 style="font-family:Century Gothic; color:black">'.$tupla[3].' años</h6></a>
				</div>		
				</div>';
			$top+=60;
			}
		return $imprime;
		

	}
	function buscador($letra){
		$imprime="";
		if($letra!=""){
			$cad="select id, concat(nombre,' ',apellidos) as nombreu,foto, year(curdate())-year(fechNacimiento) as edad from usuario having nombreu like '".$letra."%' ";
			$this->consulta($cad);
			$top=0;
			for ($i=0; $i < $this->numTuplas; $i++) { 
			$tupla=mysqli_fetch_array($this->bloque);
			$imprime.='<div id="capaPerfiles" style="margin-top:'.$top.'px; margin-left:10px; position:absolute; background-color:#FEDCEE; display:inline-flex; width:300px; box-shadow: 1px 3px 5px #000;
				 border-radius: 1px;">
				<div>
					<img style="height: 50px; width: 50px;" src="../imagenes/perfiles/'.$tupla[0].'.'.$tupla[2].'" alt="Card image"/>
				</div>
				<div>
				<a id="perfil"  onmouseover="a_onClick" onclick="mostrarUsuario('.$i.')"><h6 id="nom'.$i.'" style="font-family:Century Gothic; font-weight:bold; color:#D20755" >'.$tupla[1].'</h6><h6 style="font-family:Century Gothic; color:black;">'.$tupla[3].' años</h6></a>
				</div>		
				</div>';
			$top+=60;
			}
		}
		return $imprime;
		

	}
	function totalUsuarios(){
		$imprime="";
		
			$cad="select id, concat(nombre,' ',apellidos) as nombre,foto, year(curdate())-year(fechNacimiento) as edad from usuario";
			$this->consulta($cad);
			$usuarios=$this->numTuplas;
			$imprime="<b style='font-family:Century Gothic; color:black; margin-left:500px;'>Número de usuarios:</b> ".$usuarios."<br/>";
			$top=50;
			for ($i=0; $i < $this->numTuplas; $i++) { 
			$tupla=mysqli_fetch_array($this->bloque);
			$imprime.='<div id="capaPerfiles" style="margin-top:'.$top.'px; margin-left:500px; position:absolute; background-color:#FCEFF4; display:inline-flex; width:400px; box-shadow: 1px 3px 5px #000;
				 border-radius: 1px;">
				<div>
					<img style="height: 50px; width: 50px;" src="../imagenes/perfiles/'.$tupla[0].'.'.$tupla[2].'" alt="Card image"/>
				</div>
				<div>
				<a id="perfil"  onmouseover="a_onClick" onclick="mostrarUsuario('.$i.')"><h6 id="nom'.$i.'" style="font-family:Century Gothic; font-weight:bold; color:#D20755">'.$tupla[1].'</h6><h6 style="font-family:Century Gothic; color:black">'.$tupla[3].' años</h6></a>
				</div>		
				</div>';
			$top+=60;
			}
		return $imprime;

	}
	function actualizaInicio(){
		$cad="select id,concat(nombre,' ',apellidos) as nombre,foto,resena, year(curdate())-year(fechNacimiento) as edad from usuario order by fechIngreso desc limit 3";
		$this->consulta($cad);

		$imprime="";
		$left=20;

		for ($i=0; $i < $this->numTuplas; $i++) { 
			$tupla=mysqli_fetch_array($this->bloque);
			$imprime.='<div class="card border-secondary mb-3" style="max-width: 17rem; margin-top:470px; margin-left: '.$left.'px; display: inline-block; position: absolute;">
	   			<div class="card-header">'.$tupla[1].'</div>
	    		<div class="card-body">
	      		<h6 class="card-title" style="text-align: center;">'.$tupla[4].' años</h6>
	      		<img style="height: 200px; width: 70%; display:block; margin:0 auto 0 auto;" src="../imagenes/perfiles/'.$tupla[0].'.'.$tupla[2].'" alt="Card image">
	     		</div>
	     		<div class="card-footer text-muted" style="text-align: center; height:50px;">
	     		<p class="resena">'.$tupla[3].'</p>
	    		</div>
	  			</div>';
	  		$left+=300;

		}
		$cad="select count(*) from usuario where sexo='M'";
		$this->consulta($cad);
		$tupla=mysqli_fetch_array($this->bloque);
		$hombres=$tupla[0];
		$cad="select count(*) from usuario where sexo='F'";
		$this->consulta($cad);
		$tupla=mysqli_fetch_array($this->bloque);
		$mujeres=$tupla[0];
		$cad="select count(*) from usuario where sexo='H'";
		$this->consulta($cad);
		$tupla=mysqli_fetch_array($this->bloque);
		$indefinido=$tupla[0];
		$imprime.='<div style="position: absolute; margin-top: 10px; margin-left: 20px; padding: 2px;">
 		 <label style="background-color: #F3C9D2; height: 30px;">Usuarios registrados</label>&nbsp<img src="../imagenes/hembra.png" width="28px">'.$mujeres.'
  		<img src="../imagenes/hombre.png" width="28px">'.$hombres.'
  		<img src="../imagenes/sexual.png" width="28px">'.$indefinido.'
		</div>';
		echo $imprime;
	}
	
	}
$objetoPerfil=new Perfil();
?>