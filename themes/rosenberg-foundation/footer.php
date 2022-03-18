        <?php
        $footer_image = get_field('footer_image', 'option');

        ?>

        <footer class="footer" <?php if ($footer_image) { ?>
            style="background-image: url('<?php echo $footer_image['url'] ?>')" <?php } ?>>
            <?php echo get_template_part('template-parts/tpl', 'footer') ?>
            <?php wp_footer(); ?>
        </footer>

        <script>
(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-XXXXXX-X', 'auto');
ga('send', 'pageview');
        </script>
        </body>

        </html>