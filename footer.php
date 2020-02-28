<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @Version: 1.0.1
 * @link  https://yqqy.top
 */
?>

<footer class="main-footer">
    <div class="container d-flex justify-content-md-between justify-content-center">
        <div class="text-center main-footer-copyright">
            <p>Powered by <a href="https://wordpress.org/" rel="noopener nofollow" target="_blank">WordPress</a>.
                Copyright
                &copy; <?php echo date( 'Y', time() ) ?>. Crafted with
                <a href="https://github.com/JaxsonWang/rebirth" target="_blank" rel="noopener nofollow">Rebirth</a>.
            </p>
        </div>
        <div class="d-none d-md-block main-footer-meta"><?php echo rebirth_option( 'site_bottom_right_msg' ) ?></div>
    </div>
    <div class="container d-flex flex-wrap-reverse justify-content-md-between justify-content-center text-center main-footer-audit">
        <p>
			<?php if ( rebirth_option( 'site_icp' ) ) : ?>
                <a href="http://www.miitbeian.gov.cn" target="_blank"
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

<?php get_template_part( 'tpl/home/home', 'toast' ); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/scrollreveal@4.0.5/dist/scrollreveal.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/valine@1.3.10/dist/Valine.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/inc/js/trick.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/inc/js/rebirth.js?v=<?php echo time()?>"></script>

<?php if ( rebirth_option( 'site_baidutj_script' ) ) : ?>
    <div class="site-statistics">

        <script type="text/javascript"><?php echo rebirth_option( 'site_baidutj_script' ) ?></script>
    </div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
