<?php
$footer_image = get_field('footer_image', 'option');

?>

<?php
if ($footer_image) {

?>
<div class="footer-top" style="background-image: url('<?php echo $footer_image['url'] ?>')"></div>
<?php } ?>
<div class="footer-content container">
    <?php echo get_template_part('template-parts/navigation/menu', 'footer'); ?>
    <div class="footer__social-updates">
        <div class="footer__social_media">
            <h4>Stay Connected on Social Media</h4>
            <?php echo get_template_part('template-parts/navigation/menu', 'social-icons', ['color' => 'white']) ?>
        </div>
        <div class="footer__updates">
            <h4>Sign Up for Updates</h4>
            <form class="form-signup footer-signup">
                <input type="text" value="" placeholder="First name" class="footer-signup__name" />
                <input type="email" value="" placeholder="Email address" />
                <button role="submit" class="button-white">Sign up <img
                        src="<?php echo get_template_directory_uri() ?>/images/icons/icon-arrow-right-small-fill.svg">
                </button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        <div>
            © 2021 Rosenberg Foundation<br />
            All Rights Reserved. Credits
        </div>
        <div>
            131 Steuart Street, Suite 650, San Francisco, CA 94105<br />

            (415) 644-9777 | info@rosenbergfound.org
        </div>
    </div>


</div>