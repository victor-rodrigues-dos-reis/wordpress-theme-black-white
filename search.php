<?php

// Página que exibe os resultados de pesquisa no site

?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
		<section class="col-md-8">

			<?php if (have_posts()): ?>
				
				<h1 id="search-title">Resultados de "<?php the_search_query(); // Exibe o que foi pesquisado ?>"</h1>

				<?php get_template_part('templates/article'); ?>
				
			<?php else: ?>

				<?php get_template_part('templates/no-results'); ?>

			<?php endif; ?>

		</section>

		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>