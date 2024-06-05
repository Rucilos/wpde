<?php if( have_rows('social_media', 'option') ) { ?>
	<div class="d-flex align-items-center gap-4">
		<ul class="list-unstyled d-flex align-items-center flex-wrap flex-md-nowrap column-gap-3 mb-0">
        <?php 
        while( have_rows('social_media', 'option') ) { the_row();

            $link = get_sub_field('link');
            $link_url = $link['url'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            $icon = get_sub_field('icon');

            switch ($icon) {
                case "Facebook":
                    $icon_type = 'facebook';
                    break;
                case "Instagram":
                    $icon_type = 'instagram';
                    break;
                case "YouTube":
                    $icon_type = 'youtube';
                    break;
                case "Tiktok":
                    $icon_type = 'tiktok';
                    break;
                case "X":
                    $icon_type = 'twitter';
                    break;  
                case "LinkedIN":
                    $icon_type = 'linkedin';
                    break;  
                case "GitHub":
                    $icon_type = 'github';
                    break;    
                default:
                  $icon_type = '';
              }
        ?>
            <li>
            <?php if($link) { ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <i class="fa-brands fa-<?php echo $icon_type; ?> fa-lg"></i>
                </a>
            <?php } ?>
            </li>
	    <?php } ?>
        </ul>
	</div>
<?php } ?>
