<?php
/****
	********************************
	* Funções e definições do tema *
	********************************
*****/

// Formulário para os posts protegidos por senha
function custom_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $form = '<form class="protected-post-form" action="'. get_option('siteurl') .'/wp-login.php?action=postpass" method="post"><p>'. __("Esse conteúdo está protegido por senha. Para visualizar por favor entre com a senha no campo abaixo") .'</p><input name="post_password" id="'. $label .'" type="password" placeholder="Senha"/><button type="submit" name="Submit">'. esc_attr__( "Enviar" ) .'</button>
    </form>
    ';

    return $form;
}

// Registra o menu do site
function register_header_menu() {
	register_nav_menu('website-header', __('Header Menu'));	
}

// Registra o sidebar/aside do site
function register_site_sidebar() {
	register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

// Especifica os parâmetros da imagem do header da página inicial (home)
function custom_header_setup() {
	return array(
		'width'         => 1400,
		'height'        => 500,
		'default-image' => get_template_directory_uri() . '/images/header.png',
		'uploads'       => true,
	);

}

// Especifica os parâmetros da imagem do logo
function custom_logo_setup() {
	add_theme_support('custom-logo', array(
		'height'      => 45,
		'width'       => 250,
		'flex-width' => true,
	));

}

// Registra os scripts JavaScript usados no site
function register_javascript_scripts() {
	wp_register_script('jquery-min', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), false, true);
	wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), false, true);
	wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery-min'), false, true);
	wp_register_script('comment_verification', get_template_directory_uri().'/javascript/comment_verification.js', array('jquery-min'), false, true);

}

// Adiciona os scripts registrado anteriormente para iniciar junto com as páginas
function add_javascript_scripts() {
	wp_enqueue_script('jquery-min');
	wp_enqueue_script('popper');
	wp_enqueue_script('bootstrap');

	// Verifica se é page ou single (pois so elas tem comentários)
	// se sim verifica se o comentário está habilitado para assim carregar o script
	if (is_page() || is_single()) {
		if (comments_open())
			wp_enqueue_script('comment_verification');

	}
}

// Registra os CSS styles usados no site
function register_css_style() {
	wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
	wp_register_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array('bootstrap'));
	wp_register_style('my-style', get_template_directory_uri().'/style.css', array('bootstrap', 'font-awesome'));

}

// Adiciona os styles registrado anteriormente para iniciar junto com as páginas
function add_css_style() {
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('my-style');

}

// Adicionando funções nos Hooks
add_action('after_setup_theme', 'register_header_menu');
add_action('widgets_init', 'register_site_sidebar');
add_action('after_setup_theme', 'custom_logo_setup');
add_action('wp_enqueue_scripts', 'register_javascript_scripts');
add_action('wp_enqueue_scripts', 'add_javascript_scripts');
add_action('wp_enqueue_scripts', 'register_css_style');
add_action('wp_enqueue_scripts', 'add_css_style');

// Adicionando suporte a funções do tema
add_theme_support('custom-header', custom_header_setup());
add_theme_support('title-tag'); // Adiciona a tag title no head de acordo com assunto da página

// Filtros para modificar funções do wordpress
add_filter( 'the_password_form', 'custom_password_form' );

?>