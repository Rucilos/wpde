<?php if(!WPDE()->is_acf()) { ?>
<div class="container">
    <div class="alert alert-danger bottom-25 m-3 py-2 z-3" role="alert">
        <?php WPDE()->acf_notice(); ?>
    </div>
</div>
<?php } ?>
