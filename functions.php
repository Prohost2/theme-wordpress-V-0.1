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


	// Main sidebar 
	if(function_exists('register_sidebar)')) // Funcion para iniciar el Sidebar
		register_sidebar( array(
			'name' => 'main Sidebar', // Nombre del Sidebar
			'before_widget' => '<hr>', // Salto de linea
			'after_widget' => '',
			'before_title' => '<h3>', // Apertura de la etiqueta h3
			'after_title' => '</h3>' // Cierre de la etiqueta h3
			));

//Para Habilitar thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, true);


 // Function para comentarios encadenados
function enable_threaded_comments(){
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
       wp_enqueue_script('comment-reply');
    }
} add_action('get_header', 'enable_threaded_comments'); 

// Crear un Custom Post type //

	add_action('init','crear_un_cpt');
	function crear_un_cpt(){
		$args = array(
			'public' => true,
			'label'  => 'Producto'

			);

		register_post_type( 'Producto', $args );
	}
// Mostrar la sección de menu de dashboard solo para el administrador 

	if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}

// Pruebas de Creacion de Custom Post Type de Libros

// La función no será utilizada antes del 'init'.
add_action( 'init', 'my_custom_init' );


function my_custom_init() {
        $labels = array(
        'name' => _x( 'Servicios', 'post type general name' ),
        'singular_name' => _x( 'Servicio', 'post type singular name' ),
        'add_new' => _x( 'Añadir nuevo', 'service' ),
        'add_new_item' => __( 'Añadir nuevo Servicio' ),
        'edit_item' => __( 'Editar Servicio' ),
        'new_item' => __( 'Nuevo Servicio' ),
        'view_item' => __( 'Ver Servicio' ),
        'search_items' => __( 'Buscar Servicio' ),
        'not_found' =>  __( 'No se han encontrado Servicio' ),
        'not_found_in_trash' => __( 'No se han encontrado Servicio en la papelera' ),
        'parent_item_colon' => ''
    );
 
    // Creamos un array para $args
    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','page-attributes','custom-fields' )
    );
 
    register_post_type( 'libro', $args ); 
}
// Lo enganchamos en la acción init y llamamos a la función create_book_taxonomies() cuando arranque
add_action( 'init', 'create_book_taxonomies', 0 );
 
// Creamos dos taxonomías, género y autor para el custom post type "libro"
function create_book_taxonomies() {
        // Añadimos nueva taxonomía y la hacemos jerárquica (como las categorías por defecto)
        $labels = array(
        'name' => _x( 'Géneros', 'taxonomy general name' ),
        'singular_name' => _x( 'Género', 'taxonomy singular name' ),
        'search_items' =>  __( 'Buscar por Género' ),
        'all_items' => __( 'Todos los Géneros' ),
        'parent_item' => __( 'Género padre' ),
        'parent_item_colon' => __( 'Género padre:' ),
        'edit_item' => __( 'Editar Género' ),
        'update_item' => __( 'Actualizar Género' ),
        'add_new_item' => __( 'Añadir nuevo Género' ),
        'new_item_name' => __( 'Nombre del nuevo Género' ),
);
register_taxonomy( 'genero', array( 'libro' ), array(
        'hierarchical' => true,
        'labels' => $labels, /* Aquí es donde se utiliza la variable $labels que hemos creado arriba*/
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'genero' ),
));
// Añado otra taxonomía, esta vez no es jerárquica, como las etiquetas.
$labels = array(
        'name' => _x( 'Escritores', 'taxonomy general name' ),
        'singular_name' => _x( 'Escritor', 'taxonomy singular name' ),
        'search_items' =>  __( 'Buscar Escritores' ),
        'popular_items' => __( 'Escritores populares' ),
        'all_items' => __( 'Todos los escritores' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Editar Escritor' ),
        'update_item' => __( 'Actualizar Escritor' ),
        'add_new_item' => __( 'Añadir nuevo Escritor' ),
        'new_item_name' => __( 'Nombre del nuevo Escritor' ),
        'separate_items_with_commas' => __( 'Separar Escritores por comas' ),
        'add_or_remove_items' => __( 'Añadir o eliminar Escritores' ),
        'choose_from_most_used' => __( 'Escoger entre los Escritores más utilizados' )
);
 
register_taxonomy( 'escritor', 'libro', array(
        'hierarchical' => false,
        'labels' => $labels, 
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'escritor' ),
));
}
 ?>