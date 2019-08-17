<?php

// Template que exibe os comentários dos posts

?>

<?php

if ( post_password_required() ) {
    return;
}

?>

<div id="div-comment">
    
    <?php if ( comments_open() ) : ?>

        <div id="div-form">
            <h3>Deixe o seu comentário!</h3>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
                <fieldset>
                    <?php // Verifica se o usuário está logado no wordpress ?>
                    <?php if ( $user_ID ) : ?>

                        <p>Autentificado como 
                            <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
                                <?php echo $user_identity; // Nome do usuário logado ?>
                            </a>.
                            <a href="<?php echo wp_logout_url(); ?>" title="Sair desta conta">Sair desta conta &raquo;</a>
                        </p>

                        <?php else : ?>

                        <div class="form-group">
                            <input type="text" name="author" id="input-author" class="form-control" placeholder="Nome *" value="<?php echo $comment_author; ?>" />
                            <small id="author-help" class="form-text text-muted helper"></small>
                        </div>

                        <div class="form-group">
                            <input type="text" name="email" id="input-email" class="form-control" placeholder="E-mail *" value="<?php echo $comment_author_email; ?>" />
                            <small id="email-help" class="form-text text-muted helper"></small>
                        </div>

                        <div class="form-group">
                            <input type="text" name="url" id="input-url" class="form-control" placeholder="Website" value="<?php echo $comment_author_url; ?>" />
                            <small id="url-help" class="form-text text-muted helper"></small>
                        </div>

                    <?php endif; ?>

                    <div class="form-group">
                        <textarea name="comment" id="input-comment" class="form-control" placeholder="Mensagem *"></textarea>
                        <small id="comment-help" class="form-text text-muted helper"></small>
                    </div>

                    <button type="submit">Enviar</button>

                    <?php // Criam hidden inputs necessários para o formulário de comentário ?>
                    <?php comment_id_fields(); ?>
                    <?php do_action('comment_form', $post->ID); ?>
                </fieldset>
            </form>
            <p id="cancel-answer"><?php cancel_comment_reply_link('Cancelar Resposta'); ?></p>
        </div>
        <?php else : ?>
            <h3>Os comentários estão fechados.</h3>
        <?php endif; ?>

        <?php if (have_comments()) : ?>

            <ol id="comment-list">
                <h3><?php comments_number('0 Comentários', '1 Comentário', '% Comentários' );?></h3>

                <?php wp_list_comments('avatar_size=64&type=comment'); ?>
            </ol>

            <?php // Links para navegar entre comentários recentes e antigos ?>
            <div id="comment-navigator">
                <div id="previous"><?php previous_comments_link('&laquo; Comentários Antigos'); ?></div>
                <div id="next"><?php next_comments_link('Comentários Novos &raquo;'); ?></div>
            </div>
  

        <?php endif; ?>
    </div>
