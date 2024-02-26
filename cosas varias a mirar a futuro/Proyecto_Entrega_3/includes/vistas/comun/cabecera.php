<?php
	require_once __DIR__.'/../helpers/usuarios.php';
	require_once __DIR__.'/../helpers/barrabusqueda.php';
	$logo=RUTA_IMGS."/logo-changeit.svg";

?>      

<header>

	
	<div class="main-header">
		<a href="<?= RUTA_APP?>/post.php"><img src="<?php echo $logo ?>" alt="logo de la empresa change-it "></a>
		
	</div>
	
	<div class="menu-header">
	<nav>
    <ul>
	<li><a href="<?= RUTA_APP?>/post.php">Swap</a></li>
	<li><a href="<?= RUTA_APP?>/admin.php">Admin</a></li>
	<li><?= buildFormularioBusqueda()?></li>
      <li class="dropdown">
        <a href="#">Personal &#9662;</a>
        <ul class="dropdown-menu">
		<li><a href="<?= RUTA_APP?>/additem.php">add items</a></li>
		<li><a href="<?= RUTA_APP?>/addpost.php">add post</a></li>
		<li><a href="<?= RUTA_APP?>/exchanges.php">exchanges</a></li>
		<li><a href="<?= RUTA_APP?>/includes/src/process/adminobjetos.php">Tus Cosas</a></li>
        </ul>
      </li>
	  
    </ul>
  </nav>

  
	</div>
	
	<div class="saludo">
		<?= 
		saludo()
		?>
	</div>
	
</header>
