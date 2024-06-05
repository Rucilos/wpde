<?php if (function_exists('get_sub_field')) { ?>
<?php if (have_rows('carousel', 'option')) { ?>
<div id="carouselExampleCaptions" class="carousel slide m-3 m-md-5">
  <div class="carousel-indicators">
    <?php
    $slide_index = 0;
    while (have_rows('carousel', 'option')) {
        the_row(); ?>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide_index; ?>" class="<?php echo $slide_index == 0 ? 'active' : ''; ?>" aria-current="<?php echo $slide_index == 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $slide_index + 1; ?>"></button>
    <?php $slide_index++;
    }
    ?>
  </div>
  <div class="carousel-inner rounded-4 shadow-lg">
    <?php
    $slide_index = 0;
    while (have_rows('carousel', 'option')) {

        the_row();
        $image = get_sub_field('image');
		$image_size = wp_get_attachment_image_url($image['ID'], 'header'); 
        $label = get_sub_field('slide_label');
        $content = get_sub_field('slide_content');
        ?>
    <div class="carousel-item <?php echo $slide_index == 0 ? 'active' : ''; ?>">
    <img src="<?php echo esc_url($image_size); ?>" class="d-block w-100" alt="<?php echo esc_attr($label); ?>">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo esc_html($label); ?></h5>
        <p><?php echo esc_html($content); ?></p>
      </div>
    </div>
    <?php $slide_index++;
    }
    ?>
  </div>
  <?php if ($slide_index > 1) { ?>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  <?php } ?>
</div>
<?php } ?>
<?php } ?>
