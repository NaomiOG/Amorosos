<?php

include "herramientas.php";
session_start();

$superAdmin=array("admin@gmail.com","control");

if(in_array($_POST['email'], $superAdmin))
{
	if($_POST['clave']=="1234"){
		$_SESSION['isAdmin']=true;
		header("location: admin/home.php");
	}
	else
	{
		header("location: formAcceso.php?E=35");
	}
}

else
{
	$row=$objetoBD->saca_tupla("SELECT * FROM usuario WHERE email='".$_POST['email']."' and clave=password('".$_POST['clave']."') limit 1");

			if($objetoBD->numTuplas==1){
				$_SESSION['nombre']=$row->nombre." ".$row->apellidos;
				$_SESSION['email']=$row->email;
				$_SESSION['id']=$row->id;
				$_SESSION['foto']=$row->foto;
				$objetoBD->consulta("update usuario set fechUltiAcceso='".
					date("Y-m-d")."', accesos=accesos+1 where id=".$row->id);
				header("location: user/home.php");
			}
			
			else{
				header("location: formAcceso.php?E=1");//Llama otro recurso, para que funcione no debe haberse impreso o escrito html antes de el. Colocamos una bandera de error 1 
			}
}
?>