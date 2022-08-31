<div class="mobile-menu--overlay">
    <div class="mobile-menu" id="mobile__menu">
        <a href="" class="mobile__menu__close">
            <img src="<?php echo get_template_directory_uri()  ?>/images/icons/icon-close-fill-white.svg" />
        </a>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main_nav',
            'container_class' => 'mobile__menu--container',
            'container' => 'div',
            'menu_class' => 'menu__mobile__list',

            'walker' => new Menu_Mobile_Walker()
        )); ?>
        <div class="mobile-menu__social-icons">
            <?php echo get_template_part('template-parts/navigation/menu', 'social-icons', ['color' => 'white', 'social_profiles' => $args['social_profiles']]) ?>
        </div>
    </div>
</div>