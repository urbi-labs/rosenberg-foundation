 <div class="container header-container">
     <a href="<?php echo get_site_url() ?>">
         <img src="<?php echo get_template_directory_uri()  ?>/images/rosenberg-logo.svg"
             alt="<?php echo get_bloginfo('name') ?>" class="header__logo" />
         <img src="<?php echo get_template_directory_uri() ?>/images/rosenberg-logo-mobile.svg"
             alt="<?php echo get_bloginfo('name') ?>" class="header__logo--mobile" />
     </a>
     <nav class="header__navigation">
         <?php echo get_template_part('template-parts/navigation/menu', 'header') ?>
         <ul class="header__social-icons">

             <li>
                 <a href="<?php echo esc_url($facebook_url); ?>">
                     <img
                         src="<?php echo get_template_directory_uri()  ?>/images/social-icons/facebook-container.svg" />
                 </a>
             </li>


             <li>
                 <a href="<?php echo esc_url($twitter_url); ?>">
                     <img src="<?php echo get_template_directory_uri()  ?>/images/social-icons/twitter-container.svg" />
                 </a>
             </li>

             <li>
                 <a href="<?php echo esc_url($youtube_url) ?>">
                     <img src="<?php echo get_template_directory_uri()  ?>/images/social-icons/youtube-container.svg" />
                 </a>
             </li>

         </ul>
     </nav>
     <div class="header-navigation__mobile">
         <a href="" class="burguer-button">
             <img src="<?php echo get_template_directory_uri()  ?>/images/icons/icon-hamburguer-fill.svg" />
         </a>
     </div>
 </div>