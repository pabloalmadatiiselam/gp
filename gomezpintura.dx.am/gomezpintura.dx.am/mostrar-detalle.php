<!DOCTYPE HTML>
<HEAD>
<META CHARSET="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<LINK REL="STYLESHEET" TYPE="TEXT/CSS" HREF="estilos/estilo.css">
<link rel="stylesheet" type="text/css" href="fonts.css">			
<SCRIPT SRC="librerias/libreria.js">
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

function verificar_blanco(){        
   	if(document.fbuscador.criterio.value.length == 0) {
	alert("Ingrese una descripción de lo que desea buscar");
        document.fbuscador.focus();
        return false;
       }
       return true;
    }   
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
<DIV ID="CAJADETEXTOCAB"><INPUT TYPE="TEXT" NAME="criterio"/></DIV>
<DIV ID="BOTONBUSCARCAB"><INPUT TYPE ="SUBMIT" CLASS="BOTONB" VALUE="ir"/></DIV>
</FORM>
</DIV>
</HEADER>
<div id="limpiar"></div>
<div id="menubar"> 
    <div id="menutext">Menu </div>         
    <div id ="bt-menu"><a href="#"><span class="icon-menu"</span></a></div>
</div>
<NAV id ="menu">
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
<?PHP
REQUIRE_ONCE("librerias/libreria.php");
error_reporting(E_ALL ^ E_NOTICE);
$CONEXION1=conectar();
/*if (isset($_REQUEST['cod'])) {
$cod = $_REQUEST['cod'];
} else {
$cod = "";
}*/
echo $_GET[codigo]."<p>";
$SSQL="SELECT pin_cod,pin_mar,pin_ima,pin_uso,pin_des,pin_car FROM pinturas where pin_cod = '". $_GET['cod']."'";
//echo "el valor es:".$cod;
//$SSQL="select *from pinturas,pin_apl where pin_cod=pia_cod and pin_cod=$_GET[cod]";
$RESULT= consultar($CONEXION1,$SSQL);
IF($RESULT->num_rows == 0)
	die("No se puede mostrar la pintura");
$row=$RESULT->fetch_object();
echo "<DIV ID='TAD'><TABLE>";
echo "<TR><TH>CODIGO:</TH><TD> $row->pin_cod</TD></TR>";
echo "<TR><TH>MARCA: </TH><TD>$row->pin_mar</TD></TR>";
echo "<TR><TH>DESCRIPCION:</TH><TD> $row->pin_des</TD></TR>";
echo "<TR><TH>USO: </TH><TD>$row->pin_uso</TD></TR>";
echo "<TR><TH>ATRIBUTOS:</TH><TD>$row->pin_car</TD></TR>";	
$ssql2="Select pia_det from pin_apl where pia_cod='".$_GET[cod]."'";
$result2= consultar($CONEXION1,$ssql2);
$nro=0;
while($row2=$result2->fetch_object())
{
echo "<TR><TH>INSTRUCCION:". ++$nro ."</TH><TD>$row2->pia_det</TD></TR>";
}
echo "</TABLE></DIV>"; 
echo "<DIV ID='IMD'><IMG SRC='imagenes/$row->pin_ima' width=139 height=187></IMG></DIV>";
?>
</ARTICLE>
</SECTION>
<SCRIPT TYPE = "text/javascript" src = "menu.js"> </SCRIPT>
<ASIDE>
<DIV ID="BUSCADOR">
<H3 CLASS="TITLAT">BUSCAR</H3>
<FORM cod="fbuscador" METHOD="POST" ACTION= "buscar.php" ONSUBMIT="return verificar_blanco()">
<DIV ID="CAJADETEXTO"><INPUT TYPE="TEXT" cod="criterio"></DIV>
<DIV ID="BOTONBUSCAR"><INPUT TYPE ="SUBMIT" CLASS="BOTONB" VALUE="ir"></DIV>
</FORM>
</DIV>
<DIV ID="IMPRIMIR">
<H3 CLASS="TITLAT">IMPRIMIR</H3>
<A HREF="#"> versión imprimible</A>
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
<FOOTER ID="PIEPAGINA">	
	<ul class="menupie">            
        <li><a href="blog.php">BLOG|</a></li>
        <li><a href="email.php">EMAIL|</a></li>
        <li><a href="imprimir.php">IMPRIMIR</a></li>                
    </ul>    		
	<div>
		Mostrar detalle &copy. Todos los derechos reservados.
	</div>
</FOOTER>
</BODY>
</HTML>	