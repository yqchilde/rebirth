<?php
function trick_js_control() { ?>
    <script>
        let rebirth_option = new Object();
        rebirth_option.home_url = "<?php echo home_url(); ?>";
        rebirth_option.valine_appid = "<?php echo rebirth_option('valine_appid') ?>";
        rebirth_option.valine_appkey = "<?php echo rebirth_option('valine_appkey') ?>";
        rebirth_option.valine_serverurls = "<?php echo rebirth_option('valine_serverurls') ?>";
        rebirth_option.toast_title = "<?php echo rebirth_option('site_name') ?>";
        rebirth_option.toast_content = "<?php echo rebirth_option('toast_content') ?>";
        rebirth_option.toast_time = "<?php echo rebirth_option('toast_time') ?>";
    </script>
<?php }

add_action( 'wp_head', 'trick_js_control' );
