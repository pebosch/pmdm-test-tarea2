<?php 
	/* TEST DE FUNCIONAMIENTO DE LA TAREA 2, PMDM
	   I.E.S. Aguadulce
	   Fecha de modificación: 25 de diciembre de 2019
	   Profesor: Pedro Fernández Bosch
	   E-Mail: pedro@andared.es
	
	   Ejemplo de ejecución: http://andared.com/iesaguadulce/pmdm/tarea2.php?edad=23&genero=mujer&provincia=almeria&test1=4&test2=1&test3=1&test4=2&test5=3&test6=3&test7=1&test8=4
	*/
	
	// Inicialización de variables (Utilizamos el método GET para leer las variables recibidas por la URL)
	$archivo = 'tarea2.txt';
 	$ip = $_SERVER['REMOTE_ADDR'];
	$fecha = date("d-m-Y H:i:s");
	$edad = $_GET['edad'];
	$genero = $_GET['genero'];
	$provincia = $_GET['provincia'];
	$test1 = $_GET['test1'];
	$test2 = $_GET['test2'];
	$test3 = $_GET['test3'];
	$test4 = $_GET['test4'];
	$test5 = $_GET['test5'];
	$test6 = $_GET['test6'];
	$test7 = $_GET['test7'];
	$test8 = $_GET['test8'];
	
 	// Almacenamiento de todas las lineas actuales del fichero
	if(file_exists($archivo)) {
		$file = fopen($archivo,'r');
		while(!feof($file)) { 
			$name = fgets($file);
			$lineas[] = $name;
		}
		fclose($file);
	}
	
	// Borrado de las x filas mas antiguas
	$filas = 200;
	$lineas = array_slice($lineas, 4, $filas);
	$lineas = array_values($lineas);
	
	// Escritura del fichero
	print_r($ip . ";" . $fecha . ";" . $edad . ";" . $genero . ";" . $provincia . ";" . $test1 . ";" . $test2 . ";" . $test3 . ";" . $test4 . ";" . $test5 . ";" . $test6 . ";" . $test7 . ";" . $test8);
	$file = fopen($archivo, "w");
	fwrite($file, "TEST DE FUNCIONAMIENTO DE LA TAREA 2, PMDM" . PHP_EOL . "FORMATO: IP;FECHA;EDAD;GENERO;PROVINCIA;VAR_TEST1;VAR_TEST2;VAR_TEST3;VAR_TEST4;VAR_TEST5;VAR_TEST6;VAR_TEST7;VAR_TEST8" . PHP_EOL);
	fwrite($file, "******************************************************************************************************************************************************" . PHP_EOL . PHP_EOL);
	fwrite($file, $ip . ";" . $fecha . ";" . $edad . ";" . $genero . ";" . $provincia . ";" . $test1 . ";" . $test2 . ";" . $test3 . ";" . $test4 . ";" . $test5 . ";" . $test6 . ";" . $test7 . ";" . $test8 . PHP_EOL);
	foreach( $lineas as $linea ) {
		fwrite( $file, $linea);
	} 
	fclose( $file );  
?>