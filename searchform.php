<?php
/**
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<form action="<?php echo home_url('/'); ?>" class="ml-auto"  role="search" autocomplete="off" style="max-width: 250px;"> 
    <div class="input-group mx-lg-2 shadow-sm">
        <input class="form-control border-end-0" id="search" name="s" type="text" placeholder="<?php __('Hledáte něco?', 'wpde'); ?>" aria-label="<?php __('Hledáte něco?', 'wpde'); ?>" value="<?php echo get_search_query(); ?>">
            <div class="input-group-append">
                <button class="input-group-text border-start-0 rounded-start-0" type="submit"><i class="bi bi-search"></i></button>
            </div>
    </div>
</form>
