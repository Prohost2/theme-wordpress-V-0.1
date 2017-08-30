<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset' ); ?>"><!-- De esta manera llamamos la codificaion actual del theme-->
	<title><?php wp_title(); ?></title>

	<!-- Definir el  viewport para dispositivo web moviles -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="shortcuut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/> <!-- con la funcion get_stylesheet_directory_uri() accedemos a la dirección principal de nuestra web -->
	<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<?php wp_head(); ?>
</head>
<body>
	<div class="wrapper">
		<header>
			<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1> <!-- Section donde se va a imprimir el nombre del modulo actual -->
			<hr>
			<?php wp_nav_menu( array('menu' => 'Main', 'container' => 'nav')); ?> <!-- Section de Menu -->
		</header><!-- Cierre del header --> 
	