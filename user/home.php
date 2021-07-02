<!DOCTYPE html>
<html>
<head>

  <?php
  include "head.php";
  include "../herramientas.php";
  include ("class/classPerfil.php");
  
?>
	<title>Amoroso</title>
  <script src="jquery-3.5.1.min.js">
  </script>
  <script src="jquery-confirm.js">
  </script>
  <script src="select2.js"></script>

  <link type="text/css" href="select2.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="jquery-confirm.css">
    <style>
        p{
        font-family: Century Gothic;
        font-size: 1em;
        color: black;
        }
        label{
        font-family: Century Gothic;
        font-size: 1em;
        color: black;
        }
        ul{
        font-family: Century Gothic;
        font-size: 1em;
        color: black;
        text-align: justify;
        }
        .resena{
          color: white;
          text-align: justify;
          font-family: Century Gothic;
          font-size: 0.7em;
        }
    </style>
    <script>
        $(document).ready(function(){   
           $('.js-example-basic-multiple').select2();    
           $("#btnBuscar").click(function(){
            carac="";
            hobbie="";
            arrayCarac=$('#caracteristicas').val();
            for (var i = 0; i < arrayCarac.length; i++) {
              if ((i+1)==arrayCarac.length) {
                  carac+="tc.idCaracteristica="+arrayCarac[i]+" ";  
              }
              else{
                 carac+="tc.idCaracteristica="+arrayCarac[i]+' or ';  
              }
              
            }
            arrayHobbie=$('#hobbies').val();
            for (var j = 0; j < arrayHobbie.length; j++) {
              if ((j+1)==arrayHobbie.length) {
                  hobbie+="th.idHobies="+arrayHobbie[j]+" ";  
              }
              else{
                 hobbie+="th.idHobies="+arrayHobbie[j]+' or ';  
              }
            }
              var datos=$("#formDescubrir").serialize();
              console.log(datos);
                $.ajax({
                    type:"GET",
                    method:"GET",
                    url: "buscar.php?E=2", 
                    data: datos,
                    success: function(imprime){
                      $(location).attr('href','buscar.php?E=2&'+datos+'&carac='+carac+'&hob='+hobbie);
                      //$("capaDatos").html(imprime).show();
                      console.log(datos);
                    }
              });
          });
        });//método para una búsqueda específica
        
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
                url: "buscar.php?E=1", 
                data: parametros,
                success: function(imprime){
                  $("#capaDatosUser").html(imprime).show();

                }
              });
      }//muestra la información del usuario seleccionado
      
      function ajaxBuscador(){
          var filtro=$("#buscador").val();
          var parametros='filter='+filtro;
          console.log(filtro);
          $.ajax({
                type:"POST",
                method:"POST",
                url: "busca-ajax.php", 
                data: parametros,
                success: function(imprime){
                  $("#capaBuscador").html(imprime).show();
                }
         });
       
      }//filtra por nombre 

      var bus=setInterval(function(){ ajaxBuscador(); }, 1000);
      function cargarPerfiles(){
        var per=setInterval(function(){ ajaxPOST(); }, 30000);
        
      }
      function ajaxPOST(){
        var objAjax= new XMLHttpRequest();
        objAjax.onreadystatechange = function(){
          if(this.readyState==4 && this.status==200){
            document.getElementById("divPerfiles").innerHTML= this.responseText;
          }
        };
        objAjax.open("POST", "proceso-ajax.php",true);
        objAjax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        objAjax.send();

      }
    </script>
</head>
<body onload="ajaxPOST(); cargarPerfiles();">
<div id="capaBuscador" style="background-color:#FEDCEE; width:300px; margin-top: 70px; position:absolute; margin-left: 10px; z-index: 1;"></div>
<div style="position: relative;">
  <div style="margin-top: 20px; margin-left: 20px;">
    <input style="font-size: 1rem; width: 200px;" value="" type="text" class="form-control" id="buscador" name="buscador" placeholder="Búsqueda por nombre" />
  </div>
</div>
<div id="capaDatosUser" style="background-color:#FEDCEE; width:300px; margin-top: 100px; position:absolute; margin-left: 500px; z-index: 1; box-shadow: 6px -9px 15px #000;
       border-radius: 4px;"></div>
<div style="position: absolute;">
  <div style="margin-top: 120px; margin-left: 20px;">
  <h5 style="color: #C80831; font-family: Century Gothic;"><b>Encuentra el amor con la persona adecuada para ti en nuestra página de citas</b></h5>
  </div>
<div style="margin-top: 100px; display: inline-flex;  ">
    <img src="../imagenes/paso1.png" alt="Imagen no disponible" width="8%" height="8%"style="margin-left: 40px;"><br/>
    <p style="text-align: center; width: 12%">Usa nuestra búsqueda por criterios</p>
</div>
<div style="margin-top: 100px; display: inline-flex; position: absolute; margin-left: -500px">
    <img src="../imagenes/paso2.png" alt="Imagen no disponible" width="13%" height="13%" style="margin-left: 10px;"><br/>
    <p style="text-align: center; width: 20%">Identifica a tu persona ideal rápidamente</p>
</div>
<div style="margin-top: 100px; display: inline-flex; position: absolute; margin-left: -200px">
    <img src="../imagenes/paso3.png" alt="Imagen no disponible" width="33%" height="33%" style="margin-left: 10px;"><br/>
    <p style="text-align: center; width: 40%">Comienza tu propia historia</p>
</div>
</div>

<div style=" border-style:solid; border-color: #C80831; position: absolute; margin-left: 930px; margin-top: 0px; margin-right: 30px">
  <p style="margin-top: 10px; margin-left: 15px; font-size: 1.1em;"><b>Descubre nuevas personas</b></p>
  <form style="padding: 20px; margin-top: 0px;" id="formDescubrir">
    <div class="form-group" style="display: inline-flex;">
      <label>¿Qué estás buscando?</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <select class="form-control" id="sexo" name="sexo" style="vertical-align: middle; font-size: 1rem">
           <option value="1">Mujer</option>
           <option value="2" selected>Hombre</option>
           <option value="3" >Ambos</option>
      </select>
    </div>
    <div class="form-group" style="display: inline-flex; ">
      <label>¿Qué tipo de relación buscas?</label>
      <select class="form-control" id="relacion" name="relacion" style="vertical-align: middle; font-size: 1rem">
           <option value="A">Amistad</option>
           <option value="P" selected>Pareja</option>
      </select>
    </div>
  <div class="form-group" style="display: inline-flex;">
      <label>Características</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <select data-placeholder="Filtra características" class="js-example-basic-multiple"  name="caracteristicas" style=" width: 200px;" id="caracteristicas" multiple="multiple">
        <?php
         $cad="select id,tipo from caracteristica;";
         $objetoBD->consulta($cad);
         for ($i=0; $i < $objetoBD->numTuplas; $i++) { 
                 $tupla=mysqli_fetch_array($objetoBD->bloque);  
                 echo "<option value=".$tupla[0].">".$tupla[1]."</option>";
         }
        ?>
    </select>
    </div>
     <div class="form-group" style="display: inline-flex;">
      <label>Hobbies</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <select data-placeholder="Filtra Hobbies" class="js-example-basic-multiple" style=" width: 200px;" name="hobbies" id="hobbies" multiple="multiple">
        <?php
         $cad="select id,gusto from hobies;";
         $objetoBD->consulta($cad);
         for ($i=0; $i < $objetoBD->numTuplas; $i++) { 
                 $tupla=mysqli_fetch_array($objetoBD->bloque);  
                 echo "<option value=".$tupla[0].">".$tupla[1]."</option>";
         }
        ?>
    </select>
    </div>
  <div class="form-group" style="display: inline-flex;">
      <label>Rango de edad</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <input style="width: 80px; height: 30px;" type="text" name="edad1" placeholder="edad" size="20px" id="edad1">
      &nbsp&nbsp
      <input id="edad2" style="width: 80px; height: 30px;" type="text" name="edad2" placeholder="edad" size="20px">
  </div>
  
  <button type="button" class="btn btn-secondary" id="btnBuscar">Buscar</button>

  </form>
</div>

<p style="margin-top: 450px; position: absolute; margin-left: 20px; font-size: 1.1em; color: #E51CA2"><b>Perfiles recientes</b></p><br/>
<div id="divPerfiles" >
  
</div>

<div style="position: absolute; margin-top: 500px; margin-left: 930px; width: 370px;">
  <p style="margin-top: 10px; margin-left: 15px; font-size: 1.1em; color: #E51CA2"><b>Tendencias y consejos</b></p>
  <ul>
    <li>Habla sobre ti, se natural, sincero y espontáneo.
    <li>Encuentra a la persona realmente adecuada para ti gracias a la búsqueda detallada.</li>
    <li>Una buena forma de romper el hielo es hablar sobre los detalles que te atrajeron de su perfil o de cosas que tengan en común.</li>
  </ul>
</div>
<label style="position: absolute; margin-top: 870px; margin-left: 580px; color: #E51CA2; font-size: 1.2em; text-align: center;"><b>Nuestras historias de éxito</b></label><br/><br/>
<div style="position: absolute; margin-top: 880px; margin-left: 200px; text-align: center; width: 450px">
  <img src="../imagenes/testimonio1.png"  width="103%" alt="Imagen no disponible">
  <p><b>Tomas y Olga</b></p>
  <p style="text-align: justify;">"Conocí mi pareja el 30 de agosto de 2017 a través de éste sitio. Después de 2 años de vivir juntos decidimos casarnos, me interé en el ya que se llama Tomas igual que mi exmarido y también tiene una hija que se llama Valeria igual que mía !!! Muchas cosas en común. Estoy muy agradecida de haber encontrado al amor de mi vida."</p>

</div>
<div style="position: absolute; margin-top: 880px; margin-left: 700px; text-align: center; width: 450px">
  <img src="../imagenes/testimonio2.jpg"  width="95%" alt="Imagen no disponible">
  <p><b>Encarna y José</b></p>
  <p style="text-align: justify;">"Bueno pues es una historia un poco inusual, yo trabajo mucho fuera de España, esta vez me pillo en Hamburgo y una chica contacto conmigo una vez y casi instantáneamente surgió algo, de ahí pasamos al WhatsApp, luego empezamos a hablar y en mi regreso a Valencia pues la conocí personalmente y bueno vamos ya para 4 meses. Tal vez de no haber sido por el este sitio y su gesto, se hubiera perdido esta historia de amor."</p>

</div>



</body>
</html>


