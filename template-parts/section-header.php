<?php
$title = get_field('header_title', 'option');
$description = get_field('header_description', 'option');
$link_btn = get_field('header_link_btn', 'option');
$link = get_field('header_link', 'option');

$badge = get_field('header_badge', 'option');
$badge_link = get_field('header_badge_link', 'option');

?>

<header>
    <div class="container my-5 py-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-md-6">

                <?php if (!empty($badge) || !empty($badge_link)) { ?>
                <div class="col-md-7 mx-auto">
                    <div class="p-1 mb-2 rounded-4 border text-muted">
                        <small>
                            <?php echo $badge; ?> 
                            <?php
                            if( $badge_link ) {
                                $link_url = $badge_link['url'];
                                $link_title = $badge_link['title'];
                                $link_target = $badge_link['target'] ? $badge_link['target'] : '_self';
                                ?>
                                <a class="link-underline link-underline-opacity-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php } ?>
                        </small>
                    </div>
                </div>
                <?php } ?>

                <?php if (!empty($title)) { ?>
                    <h1 class="display-3 fw-bold"><?php echo $title; ?></h1>
                <?php } ?>
                <?php if (!empty($description)) { ?>
                    <p><?php echo $description; ?></p>
                <?php } ?>

                <?php if (!empty($link) || !empty($link_btn)) { ?>
                <div class="d-flex justify-content-center align-items-center">
                <?php
                if( $link_btn ) {
                    $link_url = $link_btn['url'];
                    $link_title = $link_btn['title'];
                    $link_target = $link_btn['target'] ? $link_btn['target'] : '_self';
                    ?>
                    <a class="btn btn-primary me-3" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php } ?>

                <?php
                if( $link ) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="text-muted link-underline link-underline-opacity-0 fw-bold" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php } ?>

                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</header>
