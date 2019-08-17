<?php

// Template que exibe os posts de acordo com uma classificação
// Ex: posts do dia XX/ posts do mês XX/ posts da categoria XXXXXX ...

?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
		<section class="col-md-8">

			<?php if (have_posts()): ?>
				<?php // Título de acordo com a classificação que está sendo pesquisada ?>
				<h1 id="archive-title">
					<?php // Verifica qual é classificação que o usuário está procurando ... ?>
		            <?php /* Se categoria */ if (is_category()) { ?>
		               Categoria: "<?php echo single_cat_title(); ?>"
		            <?php /* Se tag */ } elseif (is_tag()) { ?>
		                Tag: "<?php echo single_tag_title(); ?>"
		            <?php /* Se dia */ } elseif (is_day()) { ?>
		                Dia: <?php the_time('d \d\e F \d\e Y'); ?>
		            <?php /* Se mês */ } elseif (is_month()) { ?>
		                Mês: <?php the_time('F \d\e Y'); ?>
		            <?php /* Se ano */ } elseif (is_year()) { ?>
		                Ano: <?php the_time('Y'); ?>
		            <?php /* Se autor */ } elseif (is_author()) { ?>
		                Autor: <?php the_author(); ?>
		            <?php } ?>
	        	</h1>

				<?php get_template_part('templates/article'); ?>

			<?php else: ?>

				<?php get_template_part('templates/no-results'); ?>

			<?php endif; ?>

		</section>

	<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>