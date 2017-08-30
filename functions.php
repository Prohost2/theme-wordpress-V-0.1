<?php 

// Registro del Menu de Wordpress 

	add_theme_support('nav_menu');

	if (function_exists('register_nav_menus')) { // Si la funcion de register_nav_menus Existe entonces agregar una pagina en el Array
		register_nav_menus(
		 	array(
		 			'main' => 'Main'
		 		)
		 	);
	}

	// Habilitamos las imagenes de los post con un tamaño de 150 de ancho por 150 de alto
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 150, 150, true );

	// Permitir comentarios encadenados

	function enable_threaded_comments()
	{
		if (is_singular() AND comments_open() AND (get_option('thread_comments' ) == 1)) {
			wp_enqueue_script('comment-reply');
		}
		
	}
	add_action('get_header','enable_threaded_comments');

 ?>