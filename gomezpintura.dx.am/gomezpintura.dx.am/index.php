<!DOCTYPE HTML>
<HEAD>
<META CHARSET="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" type="text/css" href="estilos/estilo.css">
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
</SCRIPT>
<TITLE>INICIO</TITLE>
</HEAD>
<BODY>
<HEADER>
<DIV ID="LOGO">	
<!--<IMG SRC="imagenes/logo.png" width=499px height=172>-->
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
<NAV id = "menu">
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
<h2>¿Quienes somos?</h2>
Pinturas M.Gómez somos una empresa fundada en el año 1971 dedicada a la realización de trabajos de decoración en obras civilies, públicas y viviendas particulares.
Nuestra actividad abarca desde pintado de interiores y exteriores, restauración de fachadas, pulidos y barnizados hasta la colocaciónn de escayolas así como de tarimas, moquetas y corchos.

<h2>Nuestras Obras y Clientes </h2>
En Pinturas M.Gomez sabemos lo importante que es para las personas sentirse a gusto en su hogar. Por ello, ponemos a disposición de nuestros clientes nuestra experiencia y profesionalidad en la decoración y cuidado de su vivienda.
Somos especialistas en alta decoraciónn, pintura de interior y exterior, escayolas y pladur, aislamientos, revestimientos...
Además realizamos trabajos de restauración como la limpieza de tejados, fachadas, canalones y la colocación de suelos y tarimas. Prestando nuestros servicios a particulares, empresas, comunidades y locales comerciales.
</ARTICLE>
</SECTION>
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
	REQUIRE_ONCE("librerias/libreria.php");
	CONTADOR();	
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