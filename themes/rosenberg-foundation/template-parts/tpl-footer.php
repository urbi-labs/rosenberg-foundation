<?php
$footer_image = get_field('footer_image', 'option');
$email = get_field('email', 'option');
$phone = get_field('phone_number', 'option');
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
    <hr />
    <div class="footer-bottom">
        <div>
            <p>
                © 2021 Rosenberg Foundation<br />
                All Rights Reserved. <a href="https://rosenbergfound.org/photo-credits/"> Credits</a>
            </p>
        </div>
        <div>
            <p>
                131 Steuart Street, Suite 650, San Francisco, CA 94105<br />

                <?php if ($phone) { ?>
                <a href="tel:<?php echo $phone ?>" class="footer-phone"><?php echo $phone ?></a>
                <?php } ?>

                <?php if ($phone) { ?>
                <a href="mailto:<?php echo $email ?>" id="email-button-copy"
                    class="email-phone"><?php echo $email ?></a>
                <?php } ?>
            </p>
        </div>
    </div>


</div>