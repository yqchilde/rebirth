<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @link  https://yqqy.top
 */


define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
require_once get_template_directory() . '/options.php';
require get_template_directory() . '/inc/trick.php';

// 主题版本号
define( 'Rebirth_Version', wp_get_theme()->get( 'Version' ) );

if ( ! function_exists( 'rebirth_setup' ) ):

	function rebirth_setup() {
		// 开启后台文章特色图
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true );

		// 该主题在一个位置使用wp_nav_menu()
		register_nav_menus( array(
			'primary' => __( 'Nav Menus', 'rebirth' ), //导航菜单
		) );

		// 给nav_menu的li添加class
		function rebirth_menu_classes( $classes, $item, $args ) {
			if ( $args->theme_location == 'primary' ) {
				$classes[] = 'nav-item';
			}

			return $classes;
		}

		add_filter( 'nav_menu_css_class', 'rebirth_menu_classes', 1, 3 );

		// 后台添加链接功能
		add_filter( 'pre_option_link_manager_enabled', '__return_true' );

		// 移除wp-block-library-css
		add_action( 'wp_enqueue_scripts', 'remove_block_library_css', 100 );
		function remove_block_library_css() {
			wp_dequeue_style( 'wp-block-library' );
		}

		// 移除feed
		remove_action( 'wp_head', 'feed_links', 2 );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		// 移除离线编辑器开放接口
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		// 去除本页唯一链接信息
		remove_action( 'wp_head', 'index_rel_link' );
		// 清除前后文信息
		remove_action( 'wp_head', 'parent_post_rel_link' );
		remove_action( 'wp_head', 'start_post_rel_link' );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
		// 去除版本信息
		remove_action( 'wp_head', 'wp_generator' );
		// 移除wp-json链
		remove_action( 'wp_head', 'rest_output_link_wp_head' );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'template_redirect', 'rest_output_link_header', 11 );
		// emoji载入css
		remove_action( 'wp_head', 'wp_print_styles', 8 );
		// rel=canonical
		remove_action( 'wp_head', 'rel_canonical' );
		// rel=shortlink
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
		remove_action( 'template_redirect', 'wp_shortlink_header', 11 );
		// 检查并发布将来的帖子
		remove_action( 'publish_future_post', 'check_and_publish_future_post', 10 );
		remove_action( 'wp_footer', 'wp_print_footer_scripts' );

		function my_function_admin_bar() {
			return false;
		}

		add_filter( 'show_admin_bar', 'my_function_admin_bar' );

		add_action( 'widgets_init', 'my_remove_recent_comments_style' );
		function my_remove_recent_comments_style() {
			global $wp_widget_factory;
			remove_action( 'wp_head', array(
				$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
				'recent_comments_style'
			) );
		}

		// 禁用表情符号
		function disable_emojis() {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
		}

		add_action( 'init', 'disable_emojis' );

		// 用于删除tinymce表情符号插件的过滤器功能
		function disable_emojis_tinymce( $plugins ) {
			if ( is_array( $plugins ) ) {
				return array_diff( $plugins, array( 'wpemoji' ) );
			} else {
				return array();
			}
		}

		// 移除菜单冗余代码
		add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 100, 1 ); //删除Class选择器
		add_filter( 'nav_menu_item_id', 'my_css_attributes_filter', 100, 1 ); //删除Id选择器
		add_filter( 'page_css_class', 'my_css_attributes_filter', 100, 1 );
		function my_css_attributes_filter( $var ) {
			return is_array( $var ) ? array_intersect( $var, array(
				'nav-item',
				'current-post-ancestor',
				'current-menu-ancestor',
				'current-menu-parent'
			) ) : '';
		}

	}

endif;

add_action( 'after_setup_theme', 'rebirth_setup' );

// 引入脚本和样式
function rebirth_scripts() {

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js', array(), null, true );
	wp_register_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), null, true );
	wp_register_script( 'valine', 'https://cdn.jsdelivr.net/npm/valine@1.4.14/dist/Valine.min.js', array(), null, true );
	wp_register_script( 'trick', get_template_directory_uri() . '/inc/js/trick.js', array(), Rebirth_Version, true );
	wp_register_script( 'rebirth', get_template_directory_uri() . '/inc/js/rebirth.js', array(), Rebirth_Version, true );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'valine' );
	wp_enqueue_script( 'trick' );
	wp_enqueue_script( 'rebirth' );

}

add_action( 'wp_enqueue_scripts', 'rebirth_scripts' );

// 删除自带小工具
function unregister_default_widgets() {
	unregister_widget( "WP_Widget_Pages" );
	unregister_widget( "WP_Widget_Calendar" );
	unregister_widget( "WP_Widget_Archives" );
	unregister_widget( "WP_Widget_Links" );
	unregister_widget( "WP_Widget_Meta" );
	unregister_widget( "WP_Widget_Search" );
	unregister_widget( "WP_Widget_Categories" );
	unregister_widget( "WP_Widget_Recent_Posts" );
	unregister_widget( "WP_Nav_Menu_Widget" );
}

add_action( "widgets_init", "unregister_default_widgets", 11 );

// 分类页面全部添加斜杠，利于SEO
function siren_nice_trailingslashit( $string, $type_of_url ) {
	if ( $type_of_url != 'single' ) {
		$string = trailingslashit( $string );
	}

	return $string;
}

add_filter( 'user_trailingslashit', 'siren_nice_trailingslashit', 10, 2 );

// 去除链接显示categroy
add_action( 'load-themes.php', 'no_category_base_refresh_rules' );
add_action( 'created_category', 'no_category_base_refresh_rules' );
add_action( 'edited_category', 'no_category_base_refresh_rules' );
add_action( 'delete_category', 'no_category_base_refresh_rules' );
function no_category_base_refresh_rules() {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}

// Remove category base
add_action( 'init', 'no_category_base_permastruct' );
function no_category_base_permastruct() {
	global $wp_rewrite, $wp_version;
	if ( version_compare( $wp_version, '3.4', '<' ) ) {

	} else {
		$wp_rewrite->extra_permastructs['category']['struct'] = '%category%';
	}
}

// Add our custom category rewrite rules
add_filter( 'category_rewrite_rules', 'no_category_base_rewrite_rules' );
function no_category_base_rewrite_rules( $category_rewrite ) {
	//var_dump($category_rewrite); // For Debugging
	$category_rewrite = array();
	$categories       = get_categories( array( 'hide_empty' => false ) );
	foreach ( $categories as $category ) {
		$category_nicename = $category->slug;
		if ( $category->parent == $category->cat_ID )// recursive recursion
		{
			$category->parent = 0;
		} elseif ( $category->parent != 0 ) {
			$category_nicename = get_category_parents( $category->parent, false, '/', true ) . $category_nicename;
		}
		$category_rewrite[ '(' . $category_nicename . ')/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
		$category_rewrite[ '(' . $category_nicename . ')/page/?([0-9]{1,})/?$' ]                  = 'index.php?category_name=$matches[1]&paged=$matches[2]';
		$category_rewrite[ '(' . $category_nicename . ')/?$' ]                                    = 'index.php?category_name=$matches[1]';
	}
	// Redirect support from Old Category Base
	global $wp_rewrite;
	$old_category_base                                 = get_option( 'category_base' ) ? get_option( 'category_base' ) : 'category';
	$old_category_base                                 = trim( $old_category_base, '/' );
	$category_rewrite[ $old_category_base . '/(.*)$' ] = 'index.php?category_redirect=$matches[1]';

	//var_dump($category_rewrite); // For Debugging
	return $category_rewrite;
}

// Add 'category_redirect' query variable
add_filter( 'query_vars', 'no_category_base_query_vars' );
function no_category_base_query_vars( $public_query_vars ) {
	$public_query_vars[] = 'category_redirect';

	return $public_query_vars;
}

// Redirect if 'category_redirect' is set
add_filter( 'request', 'no_category_base_request' );
function no_category_base_request( $query_vars ) {
	//print_r($query_vars); // For Debugging
	if ( isset( $query_vars['category_redirect'] ) ) {
		$catlink = trailingslashit( get_option( 'home' ) ) . user_trailingslashit( $query_vars['category_redirect'], 'category' );
		status_header( 301 );
		header( "Location: $catlink" );
		exit();
	}

	return $query_vars;
}

// 去掉Wordpress挂件
function disable_dashboard_widgets() {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );//wordpress博客
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );//wordpress其它新闻
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );//wordpress概况
}

add_action( 'admin_menu', 'disable_dashboard_widgets' );

// 去除后台显示底部文字
function my_admin_footer_text() {
	return '';
}

// 去除后台显示版本信息
function my_update_footer() {
	return '';
}

add_filter( 'admin_footer_text', 'my_admin_footer_text', 10 );
add_filter( 'update_footer', 'my_update_footer', 50 );

// 调用Utils库做一些自定义的活
require get_template_directory() . '/inc/Utils.php';
