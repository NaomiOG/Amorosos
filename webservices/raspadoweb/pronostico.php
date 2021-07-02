<?php
			$datos="";
			$result=file_get_contents("https://es.meteocast.net/forecast/mx/".$_POST['ciudad']."/");
			$datos=explode("section", $result);
			$datos=explode('<div class="fde_middadd_block">', $datos[1]);
			$datos=explode('</a></li></ul>', $datos[0]);
			$datos=explode('<div class="foreca">', $datos[1]);
			$datos=str_replace('src="', 'src="https://es.meteocast.net', $datos[0]);
			echo $datos;
?>