<?php get_header(); ?> <!-- Forma para llamar el archivo del header.php -->

	<section id="main">
			<!-- Vamos a crear los loop con los que mostraremos el contenido de los post -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?> <!-- Validamos que exista información para ser mostrada en el index del tema -->
			
			<h2>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<!-- La función the_permalink se encarga de encontrar el enlace permanente de la pagina y la fución the_title() mostrara el titulo de la entrada-->
			</h2>
				<small>Publicado el <?php the_time('j/m/Y' ); ?> por <?php the_author_posts_link(); ?></small>
					<!-- La función the_time() muestra la fecha de publicación y en el parentesis definimos el formato en comillas -->
						<!-- La función de the_author_posts_link estamos mostrando el nombre del autor con un enlace --> <!-- Si queremos mostrar las etiquetas lo haremos con la función the_tags y en su caso deseamos mostrar categoría de la entrada utilizariamos la función the_category() -->
					<div class="thumbnail">
					<?php 

						if (has_post_thumbnail()) { // Si existe imagen principal , imprimir la imagen
							the_post_thumbnail();
						}

					 ?>
					</div> <!-- Cierre de las imagenes -->

					<?php the_excerpt(); ?>

			<?php endwhile; else: ?>
				<p><?php _e('No hay entradas .' ); ?></p>

			<?php endif; ?>	

	</section> <!-- Section final del main -->

	<?php get_sidebar();  ?> <!-- Forma para llamar el archivo del sidebar.php -->


<?php get_footer();  ?><!-- Forma para llamar el archivo de footer.php
