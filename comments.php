<?php
/**
 * Template for displaying comments
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 * @since Your_Theme_Version
 */

if (post_password_required()) {
    return;
}

require_once get_template_directory() . '/inc/class-bootstrap-comment-walker.php';
?>

<div id="comments" class="comments-area mt-5">

    <?php if (have_comments()): ?>
        <div class="mb-4">
            <strong>
                <?php
                $comments_number = get_comments_number();
                if (1 === $comments_number) {
                    printf(_x('One Comment', 'comments title', 'wpde'));
                } else {
                    printf(_nx('%1$s Comment', '%1$s Comments', $comments_number, 'comments title', 'wpde'), number_format_i18n($comments_number));
                }
                ?>
            </strong>
        </div>
        <ul class="list-unstyled mb-4">
            <?php wp_list_comments([
                'style' => 'ul',
                'short_ping' => true,
                'avatar_size' => 50,
                'walker' => new Bootstrap_Comment_Walker(),
            ]); ?>
        </ul><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

        <?php if (!comments_open()): ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'wpde'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form([
        'class_form' => 'comment-form mb-4',
        'class_submit' => 'btn btn-primary',
        'title_reply' => '<h4>',
        'title_reply_after' => '</h4>',
        'comment_field' => '<div class="form-group mb-3"><textarea id="comment" class="form-control" name="comment" rows="4" aria-required="true" required></textarea></div>',
        'fields' => [
            'author' => '<div class="form-group mb-3"><input id="author" class="form-control" name="author" type="text" value="" size="30" maxlength="245" aria-required="true" required placeholder="Name"></div>',
            'email' => '<div class="form-group mb-3"><input id="email" class="form-control" name="email" type="email" value="" size="30" maxlength="100" aria-required="true" required placeholder="Email"></div>',
            'url' => '<div class="form-group mb-3"><input id="url" class="form-control" name="url" type="url" value="" size="30" maxlength="200" placeholder="Website"></div>',
        ],
    ]); ?>

</div><!-- #comments -->
