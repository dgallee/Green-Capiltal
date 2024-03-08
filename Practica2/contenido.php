<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Contenido';

if (! estaLogado()) {
	Utils::paginaError(403, $tituloPagina, '¡Usuario no registrado!', 'Debes iniciar sesión o registrarte para ver el contenido exclusivo. ¡Te esperamos!');
}

$contenidoPrincipal=<<<EOS
	<h1>Bienvenido al contenido exclusivo para usuarios registrados</h1>
	<p>¡Enhorabuena! Si estas leyendo esto es porque eres uno de nuestros queridos usuarios y no podemos estár mas felices de tenerte en nuestra magnífica comunidad</p>

	<p>Como bien sabes, somos una empresa obsesionada con la satisfacción de nuestros clientes, y por ello, ofrecemos atención personalizada
	para nuestros clientes registrados, incluyendo sugerencias y diseños únicos. Para poder hacer uso de esta maravillosa herramienta, no dudes 
	en transmitirnos tus necesidades por medio de un correo electrónico a greencapital@gmail.com.</p>

	<h2> La primavera florece y Green Capital también </h2>
	<p> La entrada de la primavera es algo especial a la par que impresionante, y por supuesto, llena de alegría los jardines y zonas verdes de nuestros
	lugares favoritos. Por eso mismo, hemos decidido organizar un evento especial en varios jardínes botánicos de toda España durante esta singular estación
	del año. ¿Te lo vas a perder? Estamos seguros de que no. Accede regularmente a nuestra web ya que en muy poco tiempo daremos más detalles de este evento
	tan especial para los enamorados del mundo de las plantas y la jardinería.</p>
EOS;

require 'includes/vistas/comun/layout.php';
