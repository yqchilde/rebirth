<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @link  https://yqqy.top
 */
?>
<?php header( 'X-Frame-Options: SAMEORIGIN' ); ?>
<!DOCTYPE html>
<html lang="zh-CN" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
    <title><?php if ( is_home() ) {
			bloginfo( 'name' );
			echo " - ";
			bloginfo( 'description' );
		} elseif ( is_category() ) {
			single_cat_title();
			echo " - ";
			bloginfo( 'name' );
		} elseif ( is_single() || is_page() ) {
			single_post_title();
			echo " - ";
			bloginfo( 'description' );
		} elseif ( is_404() ) {
			echo '页面未找到!';
			echo " - ";
			bloginfo( 'description' );
		} else {
			wp_title( '', true );
			echo " - ";
			bloginfo( 'description' );
		} ?></title>
	<?php
    $keywords = wp_keywords();
    $description = wp_description();
	?>
	<meta name="keywords" content="<?php echo $keywords; ?>"/>
    <meta name="description" content="<?php echo $description; ?>"/>
    <link rel="shortcut icon" href="<?php echo rebirth_option( 'favicon_link' ) ?>"/>
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="dns-prefetch" href="<?php echo home_url(); ?>/">
<?php if (rebirth_option('site_dnsprefetch')) : ?>
    <link rel="dns-prefetch" href="<?php echo rebirth_option('site_dnsprefetch') ?>">
<?php endif; ?>
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net/">
    <link rel="dns-prefetch" href="//hm.baidu.com/">
    <link rel="dns-prefetch" href="//zz.bdstatic.com/">
    <link rel="dns-prefetch" href="//sp0.baidu.com/">
    <link rel="dns-prefetch" href="//api.share.baidu.com/">
    <link rel="dns-prefetch" href="//push.zhanzhang.baidu.com/">
    <link rel="dns-prefetch" href="//gravatar.loli.net/">
    <link rel="dns-prefetch" href="//www.google-analytics.com/">
	<?php wp_head(); ?>

    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.0/css/all.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@iconfu/svg-inject@1.2.3/dist/svg-inject.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?ver=<?php echo Rebirth_Version ?>" type="text/css" media="screen"/>
</head>
<body class="rebirth-body">
<div class="d-flex site-wrapper">
    <div class="d-block d-lg-none d-xl-none sidebar-wrapper">

        <?php if (is_404() == false) : ?>
            <include><?php get_sidebar(); ?></include>
        <?php endif; ?>
    </div>
    <div class="main-wrapper">

        <?php if (is_404() == false) : ?>
            <header class="fixed-top shadow-sm main-header scroll-reveal-header">
            <nav class="navbar navbar-expand-md header-navbar">
                <div class="container">
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <span class="d-inline-block align-top navbar-brand-logo">
                            <?php if ( rebirth_option( 'site_logo' ) ) : ?>
                                <img id="svg-img" src="<?php echo rebirth_option( 'site_logo' ) ?>" width="30"
                                     height="30" class="d-inline-block align-top navbar-brand-logo"
                                     onload="SVGInject(this)" alt="<?php
	                            echo esc_attr( rebirth_option( 'site_name' ) );
	                            ?>">
                            <?php endif; ?>
                        </span>
						<?php echo esc_attr( rebirth_option( 'site_name' ) ); ?>
                    </a>

                    <button class="navbar-toggler sidebar-toggler" type="button" data-toggle="collapse"
                            aria-controls="sidebar-wrapper" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse">
						<?php wp_nav_menu( [
							'theme_location' => 'primary',
							'menu_class'     => 'navbar-nav mr-auto',
							'fallback_cb'    => false,
							'container'      => false,
						] ) ?>
                        <div class="ml-auto nav-left">
                            <button type="button" class="btn site-tooltip btn-nav-left btn-dark-mode click-dark"
                                    data-toggle="tooltip" data-placement="bottom" title="切换风格">
                                🌓
                            </button>
                            <button type="button" class="btn site-tooltip btn-nav-left btn-search click-search"
                                    data-toggle="tooltip" data-placement="bottom" title="搜索文章">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <?php endif; ?>