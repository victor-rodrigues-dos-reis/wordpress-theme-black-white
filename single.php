<?php

// Template que apresenta as Single Pages (os posts comuns)

?>

<?php get_header(); ?>

<div class="container">
	<div class="row">
		<section class="col-md-8">

			<?php if (have_posts()): while (have_posts()): the_post(); ?>
				<article id="div-post">
					<header>
						<h1 id="post-title"><?php the_title(); ?></h1>
						<div id="post-informations">
							Postado por <span id="post-author"><?php the_author_posts_link(); ?></span> em
							<time id="post-time"><?php the_time('d/M/Y') ?></time>
						</div>
					</header>

					<div id="post-content"><?php the_content(); ?></div>	

					<b id="post-category-tag"><?php the_category('&#8203;'); the_tags('', '', ''); ?></b>
				</article>

				<?php comments_template(); ?>

			<?php endwhile; else: ?>

				<?php get_template_part('templates/404'); ?>
				
			<?php endif; ?>

		</section>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>