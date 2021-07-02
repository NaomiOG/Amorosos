<?php
include "header.php";
session_start();
if(isset($_SESSION['isAdmin'])&&$_SESSION['isAdmin']){
		//echo "Bienvenido Administrador".'<a class="btn btn-info btn-sm" href="../formAcceso.php">Cerrar sesión</a>';
		if (isset($_REQUEST['accion'])) {

			if(isset($_POST['accion'])){
				switch ($_POST['accion']) {
					//usuario
					case 'usuarios.insert':
						include "class/classUsuario.php";
						echo $objetoUsuario->accion("insert");	
					break;
					case 'usuarios.update':
	      				include "class/classUsuario.php";
	      				echo $objetoUsuario->accion("update");
      				break;
					//características
					case 'caracteristicas.insert':
						include "class/classCaracteristicas.php";
						echo $objetoCaracteristicas->accion("insert");	
					break;
					case 'caracteristicas.update':
						include "class/classCaracteristicas.php";
						echo $objetoCaracteristicas->accion("update");	
					break;
					//genero
					case 'genero.insert':
						include "class/classGenero.php";
						echo $objetoGenero->accion("insert");	
					break;
					case 'genero.update':
						include "class/classGenero.php";
						echo $objetoGenero->accion("update");	
					break;
					//peliculas
					case 'peliculas.insert':
						include "class/classPeliculas.php";
						echo $objetoPeliculas->accion("insert");	
					break;
					case 'peliculas.update':
	      				include "class/classPeliculas.php";
	      				echo $objetoPeliculas->accion("update");
      				break;
					//autor
					case 'autor.insert':
						include "class/classAutor.php";
						echo $objetoAutor->accion("insert");	
					break;
					case 'autor.update':
	      				include "class/classAutor.php";
	      				echo $objetoAutor->accion("update");
      				break;
      				//libros
      				case 'libros.insert':
						include "class/classLibros.php";
						echo $objetoLibros->accion("insert");	
					break;
					case 'libros.update':
	      				include "class/classLibros.php";
	      				echo $objetoLibros->accion("update");
      				break;
      				//juegosE
      				case 'juegos.insert':
						include "class/classJuegos.php";
						echo $objetoJuegos->accion("insert");	
					break;
					case 'juegos.update':
	      				include "class/classJuegos.php";
	      				echo $objetoJuegos->accion("update");
      				break;
      				//hobbies
      				case 'hobbies.insert':
						include "class/classHobbies.php";
						echo $objetoHobbies->accion("insert");	
					break;
					case 'hobbies.update':
	      				include "class/classHobbies.php";
	      				echo $objetoHobbies->accion("update");
      				break;

				}


			}
			
				switch ($_REQUEST['accion']) {
					//usuarios
					case 'usuarios.list':
						include "class/classUsuario.php";
						echo $objetoUsuario->accion("list");	
					break;

					case 'usuarios.new':
						include "class/classUsuario.php";
						echo $objetoUsuario->accion("formNew");
						break;
					case 'usuarios.delete':
						include "class/classUsuario.php";
						echo $objetoUsuario->accion("delete",$_REQUEST['id']);	
					break;
					case 'usuarios.formEdit':
				        include "class/classUsuario.php";
				        echo $objetoUsuario->accion("formEdit");
		   			break;
					//características
					case 'caracteristicas.list':
						include "class/classCaracteristicas.php";
						echo $objetoCaracteristicas->accion("list");	
					break;
					case 'caracteristicas.new':
						include "class/classCaracteristicas.php";
						echo $objetoCaracteristicas->accion("formNew");
						break;
					case 'caracteristicas.formEdit':
						include "class/classCaracteristicas.php";
						echo $objetoCaracteristicas->accion("formEdit");
					break;
					case 'caracteristicas.delete':
						include "class/classCaracteristicas.php";
						echo $objetoCaracteristicas->accion("delete",$_REQUEST['id']);	
					break;
					//genero
					case 'genero.list':
						include "class/classGenero.php";
						echo $objetoGenero->accion("list");	
					break;

					case 'genero.new':
						include "class/classGenero.php";
						echo $objetoGenero->accion("formNew");
						break;
					case 'genero.delete':
						include "class/classGenero.php";
						echo $objetoGenero->accion("delete",$_REQUEST['id']);	
					break;
					case 'genero.formEdit':
						include "class/classGenero.php";
						echo $objetoGenero->accion("formEdit");	
					break;
					//peliculas
					case 'peliculas.list':
						include "class/classPeliculas.php";
						echo $objetoPeliculas->accion("list");	
					break;

					case 'peliculas.new':
						include "class/classPeliculas.php";
						echo $objetoPeliculas->accion("formNew");
					break;
					case 'peliculas.formEdit':
	      				include "class/classPeliculas.php";
	      				echo $objetoPeliculas->accion("formEdit");
      				break;
						
					case 'peliculas.delete':
						include "class/classPeliculas.php";
						echo $objetoPeliculas->accion("delete",$_REQUEST['id']);
					break;	
					//autor
						case 'autor.list':
						include "class/classAutor.php";
						echo $objetoAutor->accion("list");	
					break;

					case 'autor.new':
						include "class/classAutor.php";
						echo $objetoAutor->accion("formNew");
					break;
						
					case 'autor.delete':
						include "class/classAutor.php";
						echo $objetoAutor->accion("delete",$_REQUEST['id']);
					break;
					case 'autor.formEdit':
				        include "class/classAutor.php";
				        echo $objetoAutor->accion("formEdit");
		   			break;
		   			//libros
		   			case 'libros.list':
						include "class/classLibros.php";
						echo $objetoLibros->accion("list");	
					break;

					case 'libros.new':
						include "class/classLibros.php";
						echo $objetoLibros->accion("formNew");
					break;
						
					case 'libros.delete':
						include "class/classLibros.php";
						echo $objetoLibros->accion("delete",$_REQUEST['id']);
					break;
					case 'libros.formEdit':
				        include "class/classLibros.php";
				        echo $objetoLibros->accion("formEdit");
		   			break;
		   			//juegos
		   			case 'juegos.list':
						include "class/classJuegos.php";
						echo $objetoJuegos->accion("list");	
					break;

					case 'juegos.new':
						include "class/classJuegos.php";
						echo $objetoJuegos->accion("formNew");
					break;
						
					case 'juegos.delete':
						include "class/classJuegos.php";
						echo $objetoJuegos->accion("delete",$_REQUEST['id']);
					break;
					case 'juegos.formEdit':
				        include "class/classJuegos.php";
				        echo $objetoJuegos->accion("formEdit");
		   			break;
		   			//hobbies
		   			case 'hobbies.list':
						include "class/classHobbies.php";
						echo $objetoHobbies->accion("list");	
					break;

					case 'hobbies.new':
						include "class/classHobbies.php";
						echo $objetoHobbies->accion("formNew");
					break;
						
					case 'hobbies.delete':
						include "class/classHobbies.php";
						echo $objetoHobbies->accion("delete",$_REQUEST['id']);
					break;
					case 'hobbies.formEdit':
				        include "class/classHobbies.php";
				        echo $objetoHobbies->accion("formEdit");
		   			break;
				}
	}
		
}
else{
	header("location: ../formAcceso.php?E=45");
}

?>