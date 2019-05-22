<header id="header">
    <?php
    $topheader_switch = medical_opt( 'medical-topheader-toggle-settings', false );
    if( $topheader_switch ){ ?>    

        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-4 header-top-left">
                        <?php 
                        if( medical_opt( 'medical-header-top-phone' ) ) {
                            echo '<a href="tel:'. medical_opt( 'medical-header-top-phone' ) .'"><span class="lnr lnr-phone-handset"></span> <span class="text">'. medical_opt( 'medical-header-top-phone' ) .'</span></a>';
                        }
                        if( medical_opt( 'medical-header-top-email' ) ) {
                            echo '<a href="mailto:'. medical_opt( 'medical-header-top-email' ) .'"><span class="lnr lnr-envelope"></span> <span class="text">'. medical_opt( 'medical-header-top-email' ) .'</span></a>';
                        }
                        ?>  
                    </div>
                    <div class="col-lg-6 col-sm-6 col-8 header-top-right">
                        <?php
                            if( !empty( medical_opt( 'medical-header-top-action-btn' ) ) ){
                                echo '<a href="'. esc_url( medical_opt( 'medical-header-top-action-url' ) ) .'" class="primary-btn text-uppercase"> '. esc_html( medical_opt( 'medical-header-top-action-btn' ) ) .' </a>';
                            }
                        ?>
                    </div>
                </div>			  					
            </div>
        </div>
        <?php 
    } ?>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <?php
            // Header Logo
            echo medical_theme_logo();
            ?>
            <nav id="nav-menu-container">
                <?php
                //
                if( has_nav_menu( 'primary-menu' ) ) {
                    $args = array(
                        'theme_location' => 'primary-menu',
                        'container'      => '',
                        'depth'          => 2,
                        'menu_class'     => 'nav-menu',
                        'fallback_cb'    => 'medical_bootstrap_navwalker::fallback',
                        'walker'         => new medical_bootstrap_navwalker(),
                    );  
                    wp_nav_menu( $args );
                }
                ?>
            </nav><!-- #nav-menu-container -->		    		
        </div>
    </div>
</header>