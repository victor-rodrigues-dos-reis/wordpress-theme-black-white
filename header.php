<?php

// Template que exibe o cabeçalho do site

?>

<?php

// Array de configuração do menu de navegação
$defaults = array(
        'menu'            => 'header-menu',
        'container'       => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'navbar-links',
        'menu_class'      => 'navbar-nav mr-auto',
        'menu_id'         => '',
        'echo'            => true, // O que será retornado caso ocorra tudo corretamente
        'fallback_cb'     => 'wp_page_menu', // Se o menu não for encontrado executa essa função
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'item_spacing'    => 'preserve',
        'depth'           => 0, // Quantos níveis de hierarquia terá
        'walker'          => '', // Objeto para personalização do menu
        'theme_location'  => 'website-header',
    );

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); // URL de pingback ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" /> <!-- Permite que seu site use as inserções semânticas de FOAF -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body>

    <nav class="navbar navbar-expand-md">
        <div class="container">
  
            <?php
                // Caso tenha imagem do logo apresente,
                // outro caso apresente o nome do site
                if (has_custom_logo()) {
                    the_custom_logo();

                } else {
                    echo get_bloginfo('name');

                }

            ?>

    		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Botão que abre e fecha menu">
    			<span class="navbar-toggler-icon"></span>
    		</button>

    		<?php wp_nav_menu($defaults); ?>
    		
        </div>
    </nav>