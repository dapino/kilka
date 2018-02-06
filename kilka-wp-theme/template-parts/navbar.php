    <nav>
        <header>
            <span class="logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/logo_kilkadg.svg" alt="Kilka Diseño Gráfico">
                </a>
            </span>
        </header>
        <div class="burguerBtn" id="burguerBtn">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="mainMenu" id="mainMenu">
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'header_menu',
                        'container' => 'ul',
                        'sort_column' => 'menu_order'
                    )
                );
            ?>

        </div>
    </nav>