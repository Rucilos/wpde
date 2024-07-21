<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/reference/functions/get_footer/
 *
 * @package WordPress Development Environment (WPDE)
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php
if (!is_404()) {
    $footer = get_field('footer', 'option');
    switch ($footer) {
        case 'Simple':
            get_template_part('template-parts/footer', 'main');
            break;
        case 'Advanced':
            get_template_part('template-parts/footer', 'top');
            get_template_part('template-parts/footer', 'main');
            break;
        default:
            get_template_part('template-parts/footer', 'main');
            break;
    }
}

$search_form = get_field('search_form', 'option');
if (empty($search_form)) {
    get_template_part('template-parts/modal', 'search');
}
?>

<?php
$user_id = get_the_author_meta('ID');
$user_details = WPDE()->get_user($user_id);
?>

<div class="toast-container position-fixed bottom-0 end-0 m-3">
  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <?php if (isset($user_details['avatar'])) { ?>
			<img class="rounded-circle me-2" src="<?php echo $user_details['avatar']['url']; ?>" alt="<?php echo $user_details['avatar']['alt']; ?>" width="26" height="auto" />
		<?php } ?>
      <?php if (isset($user_details['name'])) { ?>
        <strong class="me-auto"><?php echo $user_details['name']; ?></strong>
						<?php } ?>
      <small class="text-muted">just now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      See? Just like this.
    </div>
  </div>

  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
    <?php if (isset($user_details['avatar'])) { ?>
			<img class="rounded-circle me-2" src="<?php echo $user_details['avatar']['url']; ?>" alt="<?php echo $user_details['avatar']['alt']; ?>" width="26" height="auto" />
		<?php } ?>
    <?php if (isset($user_details['name'])) { ?>
        <strong class="me-auto"><?php echo $user_details['name']; ?></strong>
						<?php } ?>
      <small class="text-muted">2 seconds ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Heads up, toasts will stack automatically
    </div>
  </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
