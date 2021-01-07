<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @link  https://yqqy.top
 */
?>
<?php get_template_part('tpl/footer/footer', 'wave'); ?>
<?php get_template_part('tpl/footer/footer', 'info'); ?>

<footer class="main-footer">
    <div class="container d-flex justify-content-md-between justify-content-center">
        <div class="text-center main-footer-copyright">
            <p>Powered by <a href="https://wordpress.org/" rel="noopener nofollow" target="_blank">WordPress</a>.
                Copyright
                &copy; <?php echo date( 'Y', time() ) ?>. Crafted with
                <a href="https://github.com/yqchilde/rebirth" target="_blank" rel="noopener nofollow">Rebirth</a>.
            </p>
        </div>
        <div class="d-none d-md-block main-footer-meta"><?php echo rebirth_option( 'site_bottom_right_msg' ) ?></div>
    </div>
    <div class="container d-flex flex-wrap-reverse justify-content-md-between justify-content-center text-center main-footer-audit">
        <p>
			<?php if ( rebirth_option( 'site_icp' ) ) : ?>
                <a href="http://www.beian.miit.gov.cn" target="_blank"
                   rel="nofollow noopener"><?php echo rebirth_option( 'site_icp' ) ?>&nbsp;</a>
			<?php endif; ?>

			<?php if ( rebirth_option( 'site_gongan' ) ) : ?>
                <a href="<?php echo rebirth_option( 'site_gongan_link' ) ?>" target="_blank"
                   rel="nofollow noopener"><?php echo rebirth_option( 'site_gongan' ) ?>&nbsp;</a>
			<?php endif; ?>

			<?php if ( rebirth_option( 'site_baidutj_link' ) ) : ?>
                <a href="<?php echo rebirth_option( 'site_baidutj_link' ) ?>" target="_blank" rel="nofollow noopener">百度统计</a>
			<?php endif; ?>

        </p>
    </div>
</footer>

<?php get_template_part( 'tpl/home/home', 'search' ); ?>

<?php get_template_part( 'tpl/home/home', 'totop' ); ?>

</div>

<?php get_template_part( 'tpl/home/home', 'toast' ); ?>

</div>

<?php if ( rebirth_option( 'site_baidutj_script' ) ) : ?>
    <div class="site-statistics">
        <script type="text/javascript">
	    <?php echo htmlentities(rebirth_option( 'site_baidutj_script' ), ENT_QUOTES, "UTF-8") ?>
	</script>
    </div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
