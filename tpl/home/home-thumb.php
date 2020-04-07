<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @link  https://yqqy.top
 */


$order = 0;
while ( have_posts() ) : the_post();
	$order ++;

	if ( has_post_thumbnail() ) {
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
		$post_img        = $large_image_url[0];
	} else {
		$post_img = getThumbnail();
	}
	$the_cat = get_the_category();
	$the_cats = "";
	foreach ( $the_cat as $v ) {
		$the_cats .= $v->cat_name . ' ';
	}
	?>

    <article class="row mb-3 my-md-5 post-card home-post-item">
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-6 px-0 <?php echo $order % 2 === 0 ? 'order-md-last' : ''; ?>">
            <div class="post-card-image">
                <div class="post-card-image-shadow"></div>
                <a href="<?php the_permalink() ?>"
                   class="post-card-image-link <?php echo $order % 2 === 0 ? 'even' : 'odd' ?>">
                    <div class="post-card-image-link-background"
                         style="background-image: url('<?php echo $post_img; ?>')"></div>
                </a>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-6 <?php echo $order % 2 === 0 ? 'order-md-first' : '' ?>">
            <div class="d-flex flex-column justify-content-center post-card-content">
                <div class="text-center text-md-left mt-3 mt-md-0 post-card-content-tag">
                    <i class="fas fa-bookmark"></i>
					<?php echo $the_cats; ?>
                    </a>
                </div>
                <h3 class="post-card-content-title">
                    <a href="<?php the_permalink() ?>" class="post-card-content-title-link"><?php the_title(); ?></a>
                </h3>
                <p class="mb-3 mb-md-5 post-card-content-excerpt">
					<?php echo diyExcerptStyle( get_the_excerpt(), 'home' ) ?>
                </p>
                <div class="d-flex align-items-center post-card-content-meta">
                    <div class="d-flex align-items-center mr-1 post-card-content-meta-authors">
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
                           class="post-card-content-meta-authors-link site-tooltip"
                           data-toggle="tooltip"
                           data-placement="top" title="<?php echo esc_attr( get_the_author() ) ?>">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), '', '', '文章作者', array(
								'class' => array(
									'img-thumbnail',
									'rounded-circle',
									'post-card-content-meta-authors-link-avatar'
								)
							) );
							?>
                        </a>
                    </div>
                    <div class="d-flex flex-column align-items-start ml-1 post-card-content-meta-other">
                        <div class="post-card-content-meta-other-date">
                            <i class="icon far fa-clock"></i>
                            <?php echo get_the_time( 'Y-m-d', $post->ID ); ?>
                        </div>
                        <div class="post-card-content-meta-other-readtime">
                            <i class="icon far fa-bookmark"></i>
                            <?php echo getReadTime( $post->post_content ); ?>分钟阅读
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php
endwhile;