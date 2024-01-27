<!DOCTYPE HTML>
<HEAD>
<META CHARSET="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<LINK REL="STYLESHEET" TYPE="TEXT/CSS" HREF="estilos/estilo.css">
<link rel="stylesheet" type="text/css" href="fonts.css">		
<SCRIPT SRC="libreria.js">
</SCRIPT>
<SCRIPT TYPE = "text/javascript" src = "js/jquery.js"> </SCRIPT>
<SCRIPT TYPE = "text/javascript" src = "js/easySlider1.7.js"> </SCRIPT>
<SCRIPT TYPE = "text/javascript" src = "js/menu.js"> </SCRIPT>
<SCRIPT>
$(document).ready(function(){	
	$("#SLIDER").easySlider({
		auto: true,
		continuous: true, 
		controlsShow:false
	});
});
</SCRIPT>
<TITLE>INICIO</TITLE>
<STYLE>
H2{text-align:center;}
</STYLE>
</HEAD>
<BODY>
<HEADER>
<DIV ID="LOGO">	
<IMG SRC="imagenes/logo.png"/>
</DIV>
<DIV ID="SLIDER">
<UL>
<LI><IMG SRC="imagenes/proa.png" WIDTH=173 HEIGHT=187 ALT=TEMPLE></LI>
<LI><IMG SRC="imagenes/majestad.png" WIDTH= 173 HEIGH=187 ALT=TEMPLE></LI>
<LI><IMG SRC="imagenes/zenko.png" WIDTH=173 HEIGHT=187 ALT=PLASTICO></LI>
<LI><IMG SRC="imagenes/titanluk.png" WIDTH=173 HEIGHT=187 ALT=ESMALTE></LI>
<LI><IMG SRC="imagenes/isaval.png" WIDTH=173 HEIGHT=187 ALT=A LA CAL></LI>
<LI><IMG SRC="imagenes/pebeo.png" WIDTH=173 HEIGHT=187 ALT=DECORATIVA></LI>
</UL>
</DIV>
<DIV ID ="CONTACTO">
<br>Dirección: Alvar Nuñez 400
<br>Posadas Misiones
<br>Teléfono: 0366-4456789
<br>Seguinos en <a href="#">facebook</a>
</DIV>
<DIV ID ="BUSCADORCAB">
<FORM NAME="fbuscador" METHOD="POST" ACTION= "buscar.php" ONSUBMIT="return verificar_blanco()">
<DIV ID="CAJADETEXTOCAB"><INPUT TYPE="TEXT" NAME="criterio"></INPUT></DIV>
<DIV ID="BOTONBUSCARCAB"><INPUT TYPE ="SUBMIT" CLASS="BOTONB" VALUE="ir"></INPUT></DIV>
</FORM>
</DIV>
</HEADER>
<div id="limpiar"></div>
<div id="menubar"> 
    <div id="menutext">Menu </div>         
    <div id ="bt-menu"><a href="#"><span class="icon-menu"</span></a></div>
</div>
<NAV id="menu">
<a HREF="index.php" CLASS="ENLACENAV">INICIO|</a>
<a HREF="temple.php?tip=T" CLASS="ENLACENAV">TEMPLE|</a>
<a HREF="temple.php?tip=P" CLASS="ENLACENAV">PLASTICA|</a>
<a HREF="temple.php?tip=E" CLASS="ENLACENAV">ESMALTE|</a>
<a HREF="temple.php?tip=L" CLASS="ENLACENAV">LA CAL|</a>
<a HREF="temple.php?tip=D" CLASS="ENLACENAV">DECORATIVA|</a>
<a HREF="temple.php?tip=B" CLASS="ENLACENAV">BARNICES</a>
</NAV>
<SECTION>
<ARTICLE>
<!--<h2>Temple</h2>-->
<?php
switch($_GET["tip"])
{
case "T":
    echo "<h2>Temple</h2>";
    break;
case "P":
    echo "<h2>Plastica</h2>";
    break;
case "E":
    echo "<h2>Esmalte</h2>";
    break;
case "L":
    echo "<h2>La cal</h2>";
    break;
case "D":
    echo "<h2>Decorativa</h2>"; 
    break;
case "B":
    echo "<h2>Barnices</h2>";  
    break;
}
REQUIRE_ONCE("librerias/libreria.php");
//echo paso1;
$conexion1=conectar();
/*$servidor = "IDEA-PC\MSSQLSERVER2";
$cadcon= array("Database"=>"gomezpintura","UID"=>"sa","PWD"=>"1234");
$conexion1 = sqlsrv_connect($servidor,$cadcon);
echo $conexion1;
print_r( sqlsrv_errors(), true)

if($conexion1){
        echo('Conectado');
    }else{
        echo('No se pudo conectar<br/>');
        die( print_r( sqlsrv_errors(), true));
    }   
echo paso2;
*/
//$ssql="select * from pinturas where pin_cod like 'T%'";
//$ssql=select * from tabla where campo regexp "^a|A."
$ssql = "select * from pinturas where substr(pin_cod,1,1)='".$_GET["tip"]."'";
$resultado=consultar($conexion1,$ssql);
//$resultado= sqlsrv_query($conexion1,$ssql);
//echo $resultado;_
//if(mysql_num_rows($resultado)==0)
if($resultado->num_rows == 0)
	die("No se encontraron ninguna pintura temple.");
?>
<TABLE>
<THEAD><TR><TH>CODIGO</TH><TH>MARCA</TH><TH>DESCRIPCION</TH><TR></THEAD>
<?php
//while($fil=mysql_fetch_object($resultado))
while($fil = $resultado->fetch_object())
{  
    //echo $fil['pin_cod'];
    //$cod= $fil->pin_cod;
    //$tip= $cod[0];
    //echo $tip;
    //if($tip =="T")    
   	echo "<tr><td>".$fil->pin_cod."</td><td>".$fil->pin_mar."</td><td><a href='mostrar-detalle.php? cod=$fil->pin_cod'>$fil->pin_des</a></td></tr>";
}    
?>
</TABLE>
</ARTICLE>
</SECTION>
<SCRIPT TYPE = "text/javascript" src = "menu.js"> </SCRIPT>
<ASIDE>
<DIV ID="BUSCADOR">
<H3 CLASS="TITLAT">BUSCAR</H3>
<FORM NAME="fbuscador" METHOD="POST" ACTION= "buscar.php" ONSUBMIT="return verificar_blanco()">
<DIV ID="CAJADETEXTO"><INPUT TYPE="TEXT" NAME="criterio"></DIV>
<DIV ID="BOTONBUSCAR"><INPUT TYPE ="SUBMIT" CLASS="BOTONB" VALUE="ir"></DIV>
</FORM>
</DIV>
<DIV ID="IMPRIMIR">
<H3 CLASS="TITLAT">IMPRIMIR</H3>
<A HREF="#"> Versión imprimible</A>
</DIV>
<DIV ID="BLOG">
<H3 CLASS="TITLAT">BLOG</H3>
<A HREF="#">gompintura.blogspot.com</A>
</DIV>
<DIV ID="EMAIL"	>
<H3 CLASS="TITLAT">EMAIL</H3>
<A HREF="#">gompintura@gmail.com</A>
</DIV>
<DIV ID="VISITAS">
	<H3 CLASS="TITLAT">VISITAS</H3>
	<?PHP
	CONTADOR();
	?>
</DIV>
</ASIDE>
<FOOTER ID="PIEPAGINA">	
	<ul class="menupie">            
        <li><a href="blog.php">BLOG|</a></li>
        <li><a href="email.php">EMAIL|</a></li>
        <li><a href="imprimir.php">IMPRIMIR</a></li>                
    </ul>    		
	<div>
		Temple &copy. Todos los derechos reservados.
	</div>
</FOOTER>
</BODY>
</HTML>	