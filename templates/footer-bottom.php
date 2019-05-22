<?php 
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'medical' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

?>

<div class="copyright-text">
    <div class="container">
        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-6 footer-text m-0"><?php echo wp_kses_post( medical_opt( 'medical-copyright-text-settings', $copyText ) ); ?></p>
            <?php
            if( has_nav_menu( 'social-menu' ) ) {
                echo '<div class="col-lg-4 col-sm-6">';
                    $args = array(
                        'theme_location' => 'social-menu',
                        'container'      => '',
                        'depth'          => 1,
                        'menu_class'     => 'footer-social',
                        'fallback_cb'    => 'medical_social_navwalker::fallback',
                        'walker'         => new medical_social_navwalker(),
                    );  
                    wp_nav_menu( $args );
                echo '</div>';
            }
            ?>
        </div>                      
    </div>
</div>