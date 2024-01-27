<?php
    function contador(){ 
    $archivo = "contador_mejorado.txt"; 
    $info = array(); 
    //comprobar si existe el archivo 
    if (file_exists($archivo)){ 
    // abrir archivo de texto y introducir los datos en el array $info 
    $fp = fopen($archivo,"r"); 
    $contador = fgets($fp, 26); 
    $info = explode(" ",$contador); 
    fclose($fp); 
    // poner nombre a cada dato 
    $mes_actual = date("m"); 
    $mes_ultimo = $info[0]; 
    $visitas_mes = $info[1]; 
    $visitas_totales = $info[2]; 
    }else{ 
    // inicializar valores 
    $mes_actual = date("m"); 
    $mes_ultimo = 0; 
    $visitas_mes = 0; 
    $visitas_totales = 0; 
    } 
    // incrementar las visitas del mes según si estamos en el mismo 
    // mes o no que el de la ultima visita, o ponerlas a cero 
    if ($mes_actual==$mes_ultimo){ 
        $visitas_mes++; 
    }else{ 
        $visitas_mes=1; 
    } 
    $visitas_totales++; 
    // reconstruir el array con los nuevos valores 
    $info[0] = $mes_actual; 
    $info[1] = $visitas_mes; 
    $info[2] = $visitas_totales; 
    // grabar los valores en el archivo de nuevo 
    $info_nueva = implode(" ",$info); 
    $fp = fopen($archivo,"w+"); 
    fwrite($fp, $info_nueva, 26); 
    fclose($fp); 
    //muestro los datos del contador    
    echo "<font color='#ffffff'>Mes: $info[0]</font><br>";
    echo "<font color='#ffffff'>Visitas: $info[1] </font><br>";
    echo "<font color='#ffffff'>Total visitas: $info[2] </font><br>";
}

 function conectar() 
 {
    //$servidor='localhost';
    //$usuario="sa";
    //$contrasena="1234";
    //$bd="gomezpintura";
    //$cadcon="host=$servidor dbname=$bd user=$usuario password=$contrasena";
    //$conexion1= sqlsrv_connect($cadcon);
    //$conexion1= sqlsrv_connect('IDEA-PC\MSSQLSERVER2', "gomezpintura", "sa", "1234");
    //$cadcon= array("Database"=>"gomezpintura","UID"=>"root","PWD"=>"22922965j");
    //$conexion1=mysql_connect($servidor,$cadcon); esta conexion is deprecated
    $conexion1 = new mysqli("fdb4.awardspace.net","2534444_gomezpintura","22922965j","2534444_gomezpintura");
    return $conexion1;
 }

 function consultar($conexion1,$ssql)
 {
    //acentos y ñ
    //sqlsrv_query("SET NAMES 'utf8'");
    $conexion1->query("SET NAMES 'utf8'");
    //consulta
    //return mysql_query($conexion1,$ssql,array(), array( "Scrollable" => 'static' ));
    return $conexion1->query($ssql);
 }

 function mostrar_resultados($resultado)
 {
    while($fil=mysql_fetch_object($resultado))    
    echo "<tr><td>".$fil->pin_cod."</td><td>".$fil->pin_mar."</td><td><a href='mostrar-detalle.php? cod=$fil->pin_cod'>$fil->pin_des</a></td></tr>";
 }

function contar_palabras($palabra){
    if($palabra<>""){
    //cuenta el numero de palabras
    $trozos = explode(" ",$palabra);
    $numero = count($trozos);                
    return $numero;
    }
}

 function mostrar_pinturas($result)
 {
    //MOSTRAR SUBTITULOS y articulos
    $aux=0;
    $tipart = array("Temple", "Plástico", "Esmalte", "A la cal","Decorativa","Barnices");
    while($row = mysql_fetch_object($result))
    {
    //mostramos los articulos de los articulos o lo que deseamos...
    $refer = $row->pin_cod;
    $descripcion = $row->pin_des;
    $tipo = $row->pin_tip;
    if($aux != $tipo)
        {                    
        echo "<h2>" . $tipart[$tipo-1] . "</h2>";
        $aux = $tipo;
        }
    $uso = $row->pin_uso;
    $array_palabras = explode(".",$uso);             
    echo $refer . "-";
    echo "<a href='mostrar-detalle.php?cod=$refer'> $descripcion</a><br><font class='descripcion'>$array_palabras[0]...</font><p>";
    }
}
?>

