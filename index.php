<?php

// Template que a página inicial do site (home)

?>

<?php get_header(); ?>

<header id="index-header" style="background-image: url(<?php header_image(); ?>);">
	<div class="container">
		<h1><?php bloginfo('name') ?></h1>
		<?php get_search_form(); ?>
	</div>
</header>

<div class="container">

	<div class="row">
		<section class="col-lg-8">

			<?php if (have_posts()): ?>

				<?php get_template_part('templates/article'); ?>

			<?php else: ?>

				<?php get_template_part('templates/no-results'); ?>

			<?php endif; ?>

		</section>

		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>