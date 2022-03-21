<?php
wp_nav_menu(array(
    'theme_location' => 'footer_nav',
    'container_class' => 'nav-footer__div-container',
    'container' => 'div',
    'menu_class' => 'footer__menu',
    'walker' => new Footer_Walker()
));