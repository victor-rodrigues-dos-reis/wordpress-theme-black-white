<?php

// Template que apresenta a prévia do conteúdo dos posts nas páginas que apresentão vários juntos
// Ex: index.php, search.php, archive.php ...

?>

<?php while (have_posts()): the_post(); ?>

	<article class="div-post">
		<header>
			<b class="post-author"><?php the_author_posts_link(); ?></b>
			<time><?php the_time('d/M/Y') ?></time>
		</header>

		<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<div class="post-content">
			<div><?php the_content("&#8203;"); //&#8203; representa um espaço em branco que tem como largura 0 ?></div> 
		</div>

		<b class="post-category-tag"><?php the_category('&#8203;'); the_tags('', '', ''); ?></b>

		<footer>
			<span><?php comments_number( '<b class="number-comments">0</b> comentários', '<b class="number-comments">1</b> comentário', '<b class="number-comments">%</b> comentários' ); ?></span>
		</footer>
	</article>

<?php endwhile?>

<?php // Links para navegar entre posts recentes e antigos ?>
<div id="post-navigator">
	<div id="previous"><?php next_posts_link('&laquo; Posts Antigos') ?></div>
	<div id="next"><?php previous_posts_link('Posts Recentes &raquo;') ?></div>
</div>