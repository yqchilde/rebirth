<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @link  https://yqqy.top
 */

if ( have_posts() ) : the_post();
	if ( has_post_thumbnail() ) {
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
		$post_img        = $large_image_url[0];
	} else {
		$post_img = getThumbnail();
	}
    // 时间
	$create_time = get_the_time( 'Y-m-d', $post->ID );
    // 分类
	$the_cat  = get_the_category();
	$the_cats = "";
	foreach ( $the_cat as $v ) {
		$the_cats .= $v->cat_name . ' | ';
	}
	$the_cats = substr( $the_cats, 0, strlen( $the_cats ) - 2 );
    // 作者
	$author = get_the_author();
    // 阅读量
	setPostViews( get_the_ID() );
	$read_count = getPostViews( get_the_ID() );
	?>

    <section class="main-hero">
        <div class="main-hero-bg"
             style="background-image: url('<?php echo $post_img ?>')"></div>
        <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
            <div class="text-center main-hero-content-title"><?php the_title(); ?></div>
            <div class="text-center main-hero-content-description">
				<?php echo $author ?>
                <span class="date-divider">/</span>
                <time datetime="<?php echo $create_time ?>"><?php echo $create_time ?></time>
                <span class="date-divider">/</span>
				<?php echo $the_cats ?>
                <span class="date-divider">/</span>
                <span class="read-count">
        阅读量
        <a class="leancloud-visitors-count"><?php echo $read_count ?></a>
      </span>
            </div>
        </div>
		<?php get_template_part( 'tpl/site/site', 'wave' ); ?>
    </section>
<?php endif;