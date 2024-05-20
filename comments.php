<?php
if (have_comments()) {
    echo '<div id="comments" class="comments-area">';
    echo '<ul class="comment-list">';
    wp_list_comments([
        'style' => 'ul',
        'short_ping' => true,
        'avatar_size' => 50, // Velikost avataru
    ]);
    echo '</ul><!-- .comment-list -->';

    // Pokud jsou povoleny nové komentáře a není žádný komentář, zobrazte zprávu
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) {
        echo '<p class="no-comments">' . __('Komentáře jsou uzavřeny.', 'textdomain') . '</p>';
    }

    echo '</div><!-- .comments-area -->';
}
?>
