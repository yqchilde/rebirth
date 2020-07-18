<?php
/*
	template name: 友链
 */

get_header();

?>

    <section class="main-hero template-links">

        <style type="text/css" id="responsive-header-img-css" class="responsive-header-img-css">
            .responsive-header-img {
                background-image: url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1");
            }

            @media (max-width: 1000px) {
                .responsive-header-img {
                    background-image: url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1");
                    background-image: -webkit-image-set(url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1") 1x,
                    url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1") 2x);
                    background-image: image-set(url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1") 1x,
                    url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1") 2x);
                }
            }

            @media (max-width: 600px) {
                .responsive-header-img {
                    background-image: url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1");
                    background-image: -webkit-image-set(url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1") 1x,
                    url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1") 2x);
                    background-image: image-set(url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1") 1x,
                    url("https://pic.yqqy.top/blog/20200223195612.jpg?imageMogr2/format/webp/interlace/1") 2x);
                }
            }
        </style>
        <div class="main-hero-bg responsive-header-img"></div>
        <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
            <div class="text-center main-hero-content-title">友情链接</div>
        </div>
		<?php get_template_part( 'tpl/site/site', 'wave' ); ?>
    </section>
    <main class="main-content">
        <div class="container-sm">
            <div class="row">
                <article class="post page borderbox post-content post-content-use-blank custom-links-template">
                    <p>您好，我的朋友！ </p>
                    <hr>
					<?php $linkCats = get_terms( "link_category", "orderby=term_id" ) ?>
					<?php if ( ! empty( $linkCats ) ) : ?>
						<?php foreach ( $linkCats as $linkCat ) : ?>
                            <blockquote>
                                <p><?php echo $linkCat->name ?></p>
                            </blockquote>
                            <ul class="row mx-0">
								<?php $items = getTheLinkItems( $linkCat->term_id );
								foreach ( $items as $v ) : ?>
                                    <li class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-4">
                                        <div class="shadow px-3 links-item-wrapper">
                                            <div class="links-item-wrapper-header">
                                                <a target="_blank" href="<?php echo $v['link_url'] ?>"><img
                                                            src="<?php echo $v['link_image'] ?>"
                                                            class="border links-item-wrapper-header-avatar"
                                                            alt="<?php echo $v['link_name'] ?>"></a>
                                            </div>
                                            <div class="links-item-wrapper-content">
                                                <div class="links-item-wrapper-content-name">
                                                    <a target="_blank"
                                                       href="<?php echo $v['link_url'] ?>"><?php echo $v['link_name'] ?></a>
                                                </div>
                                                <div class="links-item-wrapper-content-desc"><?php echo $v['link_description'] ?></div>
                                            </div>
                                        </div>
                                    </li>
								<?php endforeach; ?>
                            </ul>
						<?php endforeach; ?>
					<?php else : ?>
                        <ul class="row mx-0">
							<?php $items = getTheLinkItems();
							foreach ( $items as $v ) : ?>
                                <li class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-4">
                                    <div class="shadow px-3 links-item-wrapper">
                                        <div class="links-item-wrapper-header">
                                            <a target="_blank" href="<?php echo $v['link_url'] ?>"><img
                                                        src="<?php echo $v['link_image'] ?>"
                                                        class="border links-item-wrapper-header-avatar"
                                                        alt="<?php echo $v['link_name'] ?>"></a>
                                        </div>
                                        <div class="links-item-wrapper-content">
                                            <div class="links-item-wrapper-content-name">
                                                <a target="_blank"
                                                   href="<?php echo $v['link_url'] ?>"><?php echo $v['link_name'] ?></a>
                                            </div>
                                            <div class="links-item-wrapper-content-desc"><?php echo $v['link_description'] ?></div>
                                        </div>
                                    </div>
                                </li>
							<?php endforeach; ?>
                        </ul>
					<?php endif; ?>
                </article>
            </div>
        </div>
    </main>


<?php get_footer(); ?>