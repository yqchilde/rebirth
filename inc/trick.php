<?php
function trick_js_control() { ?>
    <script>
        let rebirth_option = new Object();
        rebirth_option.home_url = "<?php echo home_url(); ?>";
        rebirth_option.valine_appid = "<?php echo rebirth_option('valine_appid') ?>";
        rebirth_option.valine_appkey = "<?php echo rebirth_option('valine_appkey') ?>";
        rebirth_option.valine_serverurls = "<?php echo rebirth_option('valine_serverurls') ?>";

    </script>
<?php }

add_action( 'wp_head', 'trick_js_control' );
