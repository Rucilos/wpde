<?php
/**
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress Development Environment (WPDE)
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<form action="<?php echo home_url('/'); ?>" role="search" autocomplete="off" class="w-100 me-3"> 
    <input class="form-control border-0 shadow-none px-0" style="--bs-focus-ring-color: rgba(var(--wpde-primary-rgb), .0)" id="search" name="s" type="text" placeholder="<?php _e('Find anything...', 'wpde'); ?>" aria-label="<?php _e('Find anything...', 'wpde'); ?>" value="<?php echo get_search_query(); ?>">
</form>
