<?php
wp_nav_menu(array(
    'theme_location' => 'main_nav',
    'container_class' => 'nav-header__div-container',
    'container' => 'div',
    'menu_class' => 'menu__header',
    'walker' => new Menu_Walker()
));