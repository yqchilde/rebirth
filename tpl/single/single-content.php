<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @link  https://yqqy.top
 */
// 文章内容
$blog_content = autoLinkNoFollow( get_the_content() );

// 文章作者
$blog_author = esc_attr( get_the_author() );
// 文章链接
$blog_url = esc_url( get_the_permalink() );
// 文章标题
$blog_title = get_the_title();
// 作者头像
$blog_avatar = get_avatar( get_the_author_meta( 'user_email' ) );
// 作者发布文章链接
$blog_author_others = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
// 查看更多文章链接
$the_more_article_link = esc_url( get_category_link( get_the_category()[0]->term_id ) );
// 判断上一篇文章有没有
if ( get_previous_post() != null ) {
	// 上一篇文章分类
	$prev_blog_cat = get_category( get_the_category( get_previous_post()->ID )[0]->term_id )->cat_name;
	// 上一篇文章链接
	$prev_blog_link = get_permalink( get_previous_post()->ID );
}
// 判断下一篇文章有没有
if ( get_next_post() != null ) {
	// 下一篇文章分类
	$next_blog_cat = get_category( get_the_category( get_next_post()->ID )[0]->term_id )->cat_name;
	// 下一篇文章链接
	$next_blog_link = get_permalink( get_next_post()->ID );
}

?>
<main class="main-content">
    <div class="container-sm">
        <nav class="d-none d-md-block pl-0 post-content-main-breadcrumb mb-3" aria-label="breadcrumb">
            <ol class="px-3 py-0 px-md-0 breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url() ?>"><?php echo rebirth_option( "site_name" ) ?></a></li>
                <li class="breadcrumb-item"><?php the_category( ' ' ) ?></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $blog_title ?></li>
            </ol>
        </nav>
        <div class="row post-content-main">
            <article class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 px-0 borderbox post-content post-content-use-blank article-main">                <!--kg-card-begin: markdown-->
				<?php echo $blog_content ?>
                <!--kg-card-end: markdown-->
            </article>
            <div class="d-none d-md-block col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 px-0 article-toc-area">
                <nav id="site-toc" data-toggle="toc" class="sticky-top article-toc-nav">
                    <div class="toc-title">文章目录：</div>
                </nav>
            </div>
        </div>
        <section class="post-tools text-center w-100">
            <button
                    type="button"
                    class="btn site-popover btn-tools-item btn-share btn-share-popover"
                    data-container=".site-wrapper"
                    data-toggle="popover"
                    data-placement="bottom"
                    data-trigger="click"
                    data-content="<ul class='d-flex justify-content-center align-items-center site-popover-wrapper-share'><li><a class='share-weibo' href='https://service.weibo.com/share/share.php?title=文章标题&url=文章地址&pic=文章配图' title='分享到微博' target='_blank' rel='nofollow noopener'><i class='fab fa-weibo'></i></a></li><li><a class='share-qq' href='https://connect.qq.com/widget/shareqq/index.html?url=文章地址&title=文章标题&summary=文章摘要&pics=文章配图&site=网站名称' title='分享到QQ' target='_blank' rel='nofollow noopener'><i class='fab fa-qq'></i></a></li><li><a class='share-wechat' title='分享到微信'><i class='fab fa-weixin'></i></a><div class='post-share-wechat-qr' id='wechat-qr-code-img'></div></li><li><a class='share-twitter' href='https://twitter.com/share?text=文章标题&url=文章地址' title='分享到推特' target='_blank' rel='nofollow noopener'><i class='fab fa-twitter'></i></a></li></ul>"
            >
                <i class="fas fa-share-alt"></i>
            </button>
            <button
                    type="button"
                    class="btn btn-tools-item btn-donation"
                    data-toggle="collapse"
                    data-target="#collapseDonation"
                    aria-expanded="false"
                    aria-controls="collapseDonation"
                    title="捐赠"
            >
                <i class="fas fa-coffee"></i>
            </button>
            <div class="collapse collapse-donation" id="collapseDonation">
                <div class="card card-body card-collapse">
                    <div class="row">
                        <div class="col-sm">
                            <figure class="figure">
                                <img src="<?php echo rebirth_option( 'donate_alipay' ) ?>"
                                     alt="支付宝捐赠" title="请使用支付宝扫一扫进行捐赠">
                                <figcaption class="figure-caption">请使用支付宝扫一扫进行捐赠</figcaption>
                            </figure>
                        </div>
                        <div class="col-sm">
                            <figure class="figure">
                                <img src="<?php echo rebirth_option( 'donate_wxpay' ) ?>"
                                     alt="微信捐赠" title="请使用微信扫一扫进行赞赏">
                                <figcaption class="figure-caption">请使用微信扫一扫进行赞赏</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <ul class="post-copyright">
            <li class="post-copyright-author">
                <strong>文章作者： </strong>
				<?php echo $blog_author ?>
            </li>
            <li class="post-copyright-link">
                <strong>文章链接：</strong>
                <a href="<?php echo $blog_url ?>" title="<?php echo $blog_title ?>"><?php echo $blog_url ?></a>
            </li>
            <li class="post-copyright-license">
                <strong>版权声明： </strong>本博客所有文章除特别声明外，均采用 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/"
                                                            rel="external nofollow" target="_blank">CC BY-NC-SA 4.0</a>
                许可协议，转载请注明出处！
            </li>
        </ul>
        <section class="d-flex justify-content-between align-items-center post-author-footer">
            <section class="author-card d-flex justify-content-between align-items-center w-75">
                <img class="author-profile-image" src="<?php echo getAvatarUrl( $blog_avatar ) ?>"
                     alt="<?php echo $blog_author ?>">
                <section class="w-100 author-card-content">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-auto col-lg-auto col-xl-auto pr-0">
                            <h4 class="author-card-name">
                                <a href="<?php echo $blog_author_others ?>"><?php echo $blog_author ?></a>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 col-md-auto col-lg-auto col-xl-auto">
                            <div class="author-card-social">
								<?php if ( rebirth_option( 'author_qq' ) ) : ?>
                                    <a class="site-tooltip author-card-social-links" target="_blank"
                                       rel="noreferrer noopener nofollow"
                                       href="<?php echo rebirth_option( 'author_qq' ) ?>" data-toggle="tooltip"
                                       data-placement="top" title="QQ">
                                        <i class="fab fa-qq"></i>
                                    </a>
								<?php endif; ?>

								<?php if ( rebirth_option( 'author_wechat' ) ) : ?>
                                    <a class="site-popover author-card-social-links"
                                       href="#"
                                       data-container=".site-wrapper"
                                       data-toggle="popover"
                                       data-placement="top"
                                       data-trigger="hover"
                                       data-content="<div class='hero-social-wechat'><img src='<?php echo rebirth_option( 'author_wechat' ) ?>' alt='微信二维码'/></div>"
                                    >
                                        <i class="fab fa-weixin"></i>
                                    </a>
								<?php endif; ?>

								<?php if ( rebirth_option( 'author_sina' ) ) : ?>
                                    <a class="site-tooltip author-card-social-links" target="_blank"
                                       rel="noreferrer noopener nofollow"
                                       href="<?php echo rebirth_option( 'author_sina' ) ?>" data-toggle="tooltip"
                                       data-placement="top" title="WeiBo">
                                        <i class="fab fa-weibo"></i>
                                    </a>
								<?php endif; ?>

								<?php if ( rebirth_option( 'author_github' ) ) : ?>
                                    <a class="site-tooltip author-card-social-links" target="_blank"
                                       rel="noreferrer noopener nofollow"
                                       href="<?php echo rebirth_option( 'author_github' ) ?>" data-toggle="tooltip"
                                       data-placement="top" title="Github">
                                        <i class="fab fa-github"></i>
                                    </a>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <p><?php echo rebirth_option( 'author_flag' ) ?></p>
                </section>
            </section>
            <div class="post-footer-right">
                <a class="author-card-button" href="<?php echo $blog_author_others ?>">更多文章</a>
            </div>
        </section>
        <aside class="post-read-more">
            <div class="row read-next-feed">
                <div class="col-lg px-0 px-sm-3 d-flex min-h-300 post-read-more-item">
					<?php if ( is_single() ) : ?>
					<?php $termId = get_the_category()[0]->term_id; ?>
					<?php $categoryImgs = getCategoryBgImg(); ?>
	                <?php if ( $categoryImgs == null ) : ?>
                        <article class="read-next-card" style="background-image: url(<?php echo getSingleBottomImg() ?>)">
                    <?php else: ?>
	                    <?php foreach ( $categoryImgs as $k => $v ) : ?>
	                    <?php if ( explode( "_", $k )[1] == $termId ) : ?>
                            <article class="read-next-card" style="background-image: url('<?php echo $v ?>')">
                        <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
						<?php wp_reset_query(); ?>
						<?php endif; ?>
                        <header class="read-next-card-header">
                            <small class="read-next-card-header-sitetitle">&mdash;
								<?php echo $blog_author ?>&mdash;</small>
                            <h3 class="read-next-card-header-title">
								<?php the_category( ' ' ) ?>
                            </h3>
                        </header>
                        <div class="read-next-divider">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                        d="M13 14.5s2 3 5 3 5.5-2.463 5.5-5.5S21 6.5 18 6.5c-5 0-7 11-12 11C2.962 17.5.5 15.037.5 12S3 6.5 6 6.5s4.5 3.5 4.5 3.5"></path>
                            </svg>
                        </div>
                        <div class="read-next-card-content">
                            <ul>
								<?php
								$cat = get_the_category();
								foreach ( $cat as $key => $category ) {
									$catid = $category->term_id;
								}
								$args        = array( 'orderby' => 'rand', 'showposts' => 3, 'cat' => $catid );
								$query_posts = new WP_Query();
								$query_posts->query( $args );
								while ( $query_posts->have_posts() ) : $query_posts->the_post(); ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									<?php wp_reset_query(); ?>
								<?php endwhile; ?>
                            </ul>
                        </div>
                        <footer class="read-next-card-footer">
                            <a href="<?php echo $the_more_article_link ?>">查看更多文章 →</a>
                        </footer>
                    </article>
                </div>
                <!--检测下一篇文章-->
				<?php if ( get_next_post() ) : ?>
                    <div class="col-lg px-0 px-sm-3 d-flex min-h-300 post-read-more-item">
                        <article class="post-read-next">
                            <a class="post-read-image-link post-read-next-image-link"
                               href="<?php echo $next_blog_link ?>">
                                <img class="post-read-next-image"
                                     src="<?php echo esc_url( getNextThumbnailUrl() ) ?>"
                                     alt="#">
                            </a>
                            <div class="post-read-next-content">
                                <a class="post-read-next-content-link" href="<?php echo $next_blog_link ?>">
                                    <header class="post-read-next-header">
                                        <span class="post-read-next-tags">
                                            <?php echo $next_blog_cat ?>
                                        </span>
                                        <h2 class="post-read-next-title">
											<?php echo get_next_post()->post_title; ?>
                                        </h2>
                                    </header>
                                    <section class="post-read-next-excerpt">
                                        <p>
											<?php echo diyExcerptStyle( get_next_post()->post_excerpt, 'single' ) ?>
                                        </p>
                                    </section>
                                </a>
                                <footer class="post-read-next-meta">
                                    <ul class="author-list">
                                        <li class="author-list-item">
                                            <a href="<?php echo $blog_author_others ?>" class="static-avatar">
                                                <img class="author-profile-image"
                                                     src="<?php echo getAvatarUrl( $blog_avatar ) ?>"
                                                     alt="<?php echo $blog_author ?>">
                                                <span class="author-profile-name"><?php echo $blog_author ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <span class="reading-time"><?php echo getReadTime( get_next_post()->post_content ); ?>分钟阅读</span>
                                </footer>
                            </div>
                        </article>
                    </div>
				<?php endif; ?>
                <!--检测上一篇文章-->
				<?php if ( get_previous_post() ) : ?>
                    <div class="col-xl px-0 px-sm-3 d-flex min-h-300 post-read-more-item">
                        <article class="post-read-next">
                            <a class="post-read-image-link post-read-next-image-link"
                               href="<?php echo $prev_blog_link ?>">
                                <img class="post-read-next-image"
                                     src="<?php echo esc_url( getPrevThumbnailUrl() ) ?>"
                                     alt="#">
                            </a>
                            <div class="post-read-next-content">
                                <a class="post-read-next-content-link" href="<?php echo $prev_blog_link ?>">
                                    <header class="post-read-next-header">
                                        <span class="post-read-next-tags">
                                            <?php echo $prev_blog_cat ?>
                                        </span>
                                        <h2 class="post-read-next-title">
											<?php echo get_previous_post()->post_title; ?>
                                        </h2>
                                    </header>
                                    <section class="post-read-next-excerpt">
                                        <p>
											<?php echo diyExcerptStyle( get_previous_post()->post_excerpt, 'single' ) ?>
                                        </p>
                                    </section>
                                </a>
                                <footer class="post-read-next-meta">
                                    <ul class="author-list">
                                        <li class="author-list-item">
                                            <a href="<?php echo $blog_author_others ?>" class="static-avatar">
                                                <img class="author-profile-image"
                                                     src="<?php echo getAvatarUrl( $blog_avatar ) ?>"
                                                     alt="<?php echo $blog_author ?>">
                                                <span class="author-profile-name"><?php echo $blog_author ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <span class="reading-time"><?php echo getReadTime( get_previous_post()->post_content ); ?>分钟阅读</span>
                                </footer>
                            </div>
                        </article>
                    </div>
				<?php endif; ?>
            </div>
        </aside>
        <div id="comments" class="w-100 post-comments">
            <div id="vcomments" class="v"></div>
        </div>
    </div>
</main>
