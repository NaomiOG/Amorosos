<?php
//1. Registrar en la BD
include "herramientas.php";

          
          $objetoBD->consulta("select * from usuario where email='".$_POST['email']."';");
          //$cad="select * from usuario where email='".$_POST['email']."';";
          //$bloque=mysqli_query($cone,$cad);
          //$num_tuplas=mysqli_num_rows($bloque);
          if($objetoBD->numTuplas){
            header("location: index.php?E=10");             
          }
          else{
            $objetoBD->envioEmail();
            
            $objetoBD->consulta("insert into usuario set email='".$_POST['email']."', nombre='".$_POST['nombre']."', apellidos='".$_POST['apellidos']."', fechIngreso='".date("Y-m-d")."', clave=Password('".$objetoBD->clave."');");
            header("location: index.php?E=7");
           

          }

    

//3. Indicar situación o enviar a logueo


?>