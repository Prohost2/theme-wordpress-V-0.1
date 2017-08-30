<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
  <input type="text" placeholder="Buscar…" value="<?php the_search_query(); ?>" name="s" id="s" />
  <button type="submit" class="icon-only"  id="searchsubmit"></button>
</form>


<section id="sidebar"> <!-- Inicio de section, para llamar functons de Sidebar -->
	<?php 
	if(!function_exists('dynamic_sidebar') || // Si la funcion no existe !! o es diferente 
		!dynamic_sidebar( 'main Sidebar')) : // O es diferente va a imprimir los valores llamados entre ''
	 ?>
	<?php endif ?> <!-- Cierre del If -->
</section>