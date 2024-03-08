<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Contenido';

if (! estaLogado()) {
	Utils::paginaError(403, $tituloPagina, '¡Usuario no registrado!', 'Debes iniciar sesión o registrarte para ver el contenido exclusivo. ¡Te esperamos!');
}

$contenidoPrincipal=<<<EOS
	<h1 class='titulo2'>Bienvenido al contenido exclusivo para usuarios registrados</h1>
	<p class='descripcion2'>¡Enhorabuena! Si estas leyendo esto es porque eres uno de nuestros queridos usuarios y no podemos estár mas felices de tenerte en nuestra magnífica comunidad. 
	Como bien sabes, somos una empresa obsesionada con la satisfacción de nuestros clientes, y por ello, ofrecemos atención personalizada
	para nuestros clientes registrados, incluyendo sugerencias y diseños únicos.</p>
	<h2 class='titulo2'> La primavera florece y Green Capital también </h2>
	<p class='descripcion2'> La entrada de la primavera es algo especial a la par que impresionante, y por supuesto, llena de alegría los jardines y zonas verdes de nuestros
	lugares favoritos. Por eso mismo, hemos decidido organizar un evento especial en varios jardínes botánicos de toda España durante esta singular estación
	del año. ¿Te lo vas a perder? Estamos seguros de que no. Accede regularmente a nuestra web estos meses para conocer más detalles.</p>
	<h2 class='titulo2'> Nueva oferta exclusiva </h2>
	<p class='descripcion2'> En agradecimiento por el enorme apoyo de todos nuestros usuarios, hemos decidido lanzar una nueva oferta exclusiva para vosotros.
	El próximo mes lanzaremos 3 nuevos artículos de primera calidad a nuestra tienda, y sí, los usuarios registrados contaréis con...</p>
	<p class= 'oferta-exclusiva'>UN 50 % DE DESCUENTO EN ELLOS</p>
EOS;

require 'includes/vistas/comun/layout.php';

?>