<?php

require_once 'includes/config.php';

$tituloPagina = 'Contacto';

$contenidoPrincipal=<<<EOS
<form class="formContact" action="mailto:paferr04@ucm.es?subject=Formulario%20Contacto']" method="POST">
	<fieldset>
		<legend>Contact Us</legend>
		<div><label>Name:</label> <input type="text" name="nombre" required/></div>
		<div><label>Email:</label> <input type="email" name="email" required/></div>

	</fieldset>

	<fieldset>
  		<legend>Motivo de la consulta:</legend>
		<div> <input type="radio"  id="Evaluacion" name="drone" value="Evaluación" checked> <label for="Evaluacion">Evaluación</label> </div>
		<div> <input type="radio"  id="Sugerencias" name="drone" value="Sugerencias"> <label for="Sugerencias">Sugerencias</label> </div>
		<div> <input type="radio"  id="Criticas" name="drone" value="Criticas"> <label for="Criticas">Críticas</label></div>
	</fieldset>

	<br>

	<div class="form-element">
	<label><input type="checkbox" id="cbox1" value="checkbox">
	¿Acepta nuestros términos y condiciones del servicio?</label><br>
	</div>
	
	<div>
	<label for="msg">Mensaje:</label>
	<textarea id="msg" name="mensaje"></textarea>
	</div>
  
	<br>

	<div><button type="submit">Enviar</button></div>

	</form>
EOS;

require 'includes/vistas/comun/layout.php';