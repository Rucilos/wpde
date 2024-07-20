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

<form action="<?php echo home_url('/'); ?>" role="search" autocomplete="off" class="position-relative"> 
    <div class="input-group d-block">
        <div class="icon">
            <span><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
            <input class="form-control border-0 mx-lg-2 ps-5" id="search" name="s" type="text" placeholder="<?php _e('Find anything...', 'wpde'); ?>" aria-label="<?php _e('Find anything...', 'wpde'); ?>" value="<?php echo get_search_query(); ?>">
		</div>
	</div>
</form>
