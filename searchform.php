<?php

// Template que exibe o formulário de pesquisa (Campo de pesquisa)

?>

<form action="<?php bloginfo('url'); ?>" method="get" accept-charset="utf-8" id="searchform" role="search">

	<?php // O input do formulário de pesquisa precisa ter o parâmetro name="s" ?>
  	<input type="search" name="s" id="s" value="<?php the_search_query(); ?>">
    <button type="submit"><i class="fa fa-search"></i></button>

</form>