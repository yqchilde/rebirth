<?php
/*
	template name: 归档
 */

get_header();
?>

    <section class="main-hero template-archive">

        <style type="text/css" id="responsive-header-img-css" class="responsive-header-img-css">
            .responsive-header-img {
                background-image: url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1");
            }

            @media (max-width: 1000px) {
                .responsive-header-img {
                    background-image: url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1");
                    background-image: -webkit-image-set(url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1") 1x,
                    url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1") 2x);
                    background-image: image-set(url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1") 1x,
                    url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1") 2x);
                }
            }

            @media (max-width: 600px) {
                .responsive-header-img {
                    background-image: url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1");
                    background-image: -webkit-image-set(url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1") 1x,
                    url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1") 2x);
                    background-image: image-set(url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1") 1x,
                    url("https://pic.yqqy.top/blog/20200719002602.jpg?imageMogr2/format/webp/interlace/1") 2x);
                }
            }
        </style>
        <div class="main-hero-bg responsive-header-img"></div>
        <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
            <div class="text-center main-hero-content-title">文章归档</div>
        </div>
    </section>
    <main class="main-content">
    <div class="container-sm">
        <div class="row">
            <article class="post page borderbox post-content custom-archive-template">
                <div class="archive-page">
                    <div class="archive-page-title"><?php echo date( "Y年m月d日", time() ) ?>
                        累计 <?php echo wp_count_posts()->publish ?> 篇文章
                    </div>
                    <ul class="archive-page-list timeline">

						<?php $posts = new WP_Query( 'posts_per_page=-1&post_status=publish&post_type=post' ); ?>
						<?php while ( $posts->have_posts() ): $posts->the_post(); ?>
							<?php
							if ( has_post_thumbnail() ) {
								$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
								$post_img        = $large_image_url[0];
							} else {
								$post_img = getThumbnail();
							}
							?>

                            <div class="timeline-item">
                                <div class="timeline-marker"></div>
                                <div class="card border-0 shadow timeline-content">
                                    <a href="<?php the_permalink() ?>" class="card-body">
                                        <div class="media-left">
                                            <time datetime="2020-06-09"><?php echo get_the_time( 'Y年m月d日', $post->ID ); ?></time>
                                            <h6 class="card-title">
												<?php the_title(); ?>
                                            </h6>
                                            <p class="card-text">
												<?php echo diyExcerptStyle( get_the_excerpt(), 'single' ) ?>
                                            </p>
                                        </div>
                                        <div class="media-right">
                                            <img class="card-img-right"
                                                 srcset="<?php echo $post_img ?> 300w,
                                       <?php echo $post_img ?> 600w,
                                       <?php echo $post_img ?> 1000w,
                                       <?php echo $post_img ?> 2000w"
                                                 sizes="(max-width: 1000px) 400px, 700px"
                                                 src="<?php echo $post_img ?>"
                                                 alt="<?php the_title(); ?>"
                                            />
                                        </div>
                                    </a>
                                </div>
                            </div>
						<?php endwhile; ?>

                    </ul>
                </div>
            </article>
        </div>
    </div>

<?php get_footer(); ?>