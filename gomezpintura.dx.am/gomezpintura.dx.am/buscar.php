<!DOCTYPE HTML>
<HEAD>
<META CHARSET="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<LINK REL="STYLESHEET" TYPE="TEXT/CSS" HREF="estilos/estilo.css">
<link rel="stylesheet" type="text/css" href="fonts.css">	
<SCRIPT SRC="..\librerias/libreria.js">
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
<?php
$cad = $_POST["criterio"];
if($cad == "")
	echo("<h1>Debe ingresar un texto</h1>");
else
{
//Modelo
//$servidor = "localhost";
//$usuario = "root";
//$clave = "22922965j";
//$basedatos = "gomezpintura";
//$con = new mysqli($servidor, $usuario, $clave, $basedatos);
REQUIRE_ONCE("librerias/libreria.php");
$con = conectar();
if($con->errno>0)
	die("No se puedo establecer la conexión");
$trozos = explode(" ",$cad);
$numero = count($trozos);

if($numero == 1)
{
$ssql = "Select * from pinturas where pin_des like '%$cad%' or pin_mar like '%$cad%' limit 50";
}
else
{
	$ssql = "select pin_cod, pin_des, pin_mar, pin_uso, pin_car, pin_ima ,MATCH (pin_des, pin_mar) AGAINST ( '$cad' ) AS Score FROM pinturas WHERE MATCH (pin_des, pin_mar) AGAINST ( '$cad' ) ORDER BY Score DESC LIMIT 50";  
}
$resultado = $con->query($ssql);
if ($resultado->num_rows == 0)
{
    die("No se encontraron resultados");
}
echo"<h2 class = 'titresbus'>Resultados de la búsqueda</h2>";
echo "<div id= 'resbus'>";
while($row = $resultado->fetch_object())
{
	$cod = $row->pin_cod;
        $vin = $row->pin_mar;
	$pvin = substr($vin,0,100);
	echo "<a href = 'mostrar-detalle.php?cod=$cod'>" . $pvin . "</a><p>";
}
echo "</div>";
//cerrar conecion
$con->close();
}
?>	
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
	contador();	
	?>
</DIV>
</ASIDE>
<div class="limpiar"></div>
<FOOTER ID="PIEPAGINA">	
	<ul class="menupie">            
        <li><a href="blog.php">BLOG|</a></li>
        <li><a href="email.php">EMAIL|</a></li>
        <li><a href="imprimir.php">IMPRIMIR</a></li>                
    </ul>    		
	<div>
		Inicio &copy. Todos los derechos reservados.
	</div>
</FOOTER>
</BODY>
</HTML>	