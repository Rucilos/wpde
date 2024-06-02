<?php
class Bootstrap_Comment_Walker extends Walker_Comment {
    protected function html5_comment($comment, $depth, $args) {
        $tag = 'div' === $args['style'] ? 'div' : 'li'; ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('list-group-item'); ?>>
        <div class="d-flex algin-items-center justify-content-between row-gap-3 border-bottom">
            <?php if (0 != $args['avatar_size']) {
                echo get_avatar($comment, $args['avatar_size'], '', '', ['class' => 'rounded-circle']);
            } ?>
                <div class="d-flex algin-items-center justify-content-between">
                    <div>
                        <strong><?php echo get_comment_author(); ?></strong>
                        <small class="text-body-secondary">
                            <time datetime="<?php comment_time('c'); ?>">
                                <?php printf(__('%1$s at %2$s', 'wpde'), get_comment_date(), get_comment_time()); ?>
                            </time>
                        </small>
                    </div>
                    <div>
                        <?php edit_comment_link(__('Edit', 'wpde'), '<span class="edit-link">', '</span>'); ?>
                        <?php comment_reply_link(array_merge($args, ['add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']])); ?>
                    </div>
                </div>
                <?php comment_text(); ?>
                <?php if ('0' == $comment->comment_approved): ?>
                    <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'wpde'); ?></p>
                <?php endif; ?>
        </div>
        <?php
    }
}
