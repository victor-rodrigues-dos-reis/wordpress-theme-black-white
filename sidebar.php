<?php

// Template que exibe a parte lateral(lado direito) do site

?>

<aside class="col-lg-4" id="page-sidebar">
	<?php // Sidebar dinâmico ?>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')): ?><?php endif; ?>
</aside>