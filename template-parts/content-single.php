<div class="col-md-12">     
    <?php 
    if (has_category()) {
        $categories = get_the_category();
        $term_names = []; // Vytvoříme prázdné pole pro uložení názvů kategorií
        foreach ($categories as $category) {
            $term_names[] = $category->name; // Přidáme každý název kategorie do pole
        }
        $term_name = implode(', ', $term_names); // Spojíme názvy kategorií do jednoho řetězce
    } else {
        $term_name = ''; // Pokud žádné kategorie nejsou, nastavíme prázdný řetězec
    }
    echo WPDE()->get_title(get_the_title(), $term_name, wp_trim_words(get_the_excerpt(), 15, '')); 
    ?>
    <?php 
    if (has_post_thumbnail()) {
        echo '<div class="text-center">';
        the_post_thumbnail('header', ['class' => 'img-fluid mb-5 shadow rounded-4']);
        echo '</div>';
    } 
    ?>
    <?php the_content(); ?>
</div>
    
<div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
    <div>
    <?php
    $u_time = get_the_time('U');
    $u_modified_time = get_the_modified_time('U');
    if ($u_modified_time >= $u_time + 86400) {
        $html = "<small class='d-block'><strong>Poslední aktualizace:</strong></small>";
        $html .= '<small>' . esc_html(get_the_modified_time('F jS, Y')) . '</small>'; 
        echo $html;
    } else {
        $html = "<small class='d-block'><strong>Publikováno:</strong></small>";
        $html .= '<small>' . esc_html(get_the_date('F jS, Y')) . '</small>';
        echo $html;
    }
    ?> 
    </div>
    <div>
        <small class="d-block"><strong><?php _e('Související příspěvky:', 'wpde'); ?></strong></small>
        <small><?php previous_post_link('%link'); ?> / <?php next_post_link('%link'); ?></small> 
    </div>
</div>
