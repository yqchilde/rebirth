<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @link  https://yqqy.top
 */

?>

<section class="main-hero">
	<?php if ( is_category() ) : ?>
		<?php $termId = get_category( get_query_var( 'cat' ) )->term_id; ?>
		<?php if ( is_array( getCategoryBgImg() ) || is_object( getCategoryBgImg() ) ) : ?>
			<?php $categoryImgs = getCategoryBgImg();
			foreach ( $categoryImgs as $k => $v ) : ?>
				<?php if ( explode( "_", $k )[1] == $termId ) : ?>
                    <div class="main-hero-bg"
                         style="background-image: url('<?php echo $v ?>')"></div>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php wp_reset_query(); ?>
	<?php else: ?>
        <div class="main-hero-bg"
             style="background-image: url('<?php echo rebirth_option( 'home_cover' ) ?>')"></div>
	<?php endif; ?>
    <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
        <!--判断是否是作者页-->
		<?php if ( is_author() ) : ?>
            <div class="text-center main-hero-content-avatar">
                <img class="main-hero-content-avatar-img"
                     src="<?php echo getAuthorAvatar() ?>"
                     alt="头像"/>
            </div>
            <div class="text-center main-hero-content-title"><?php echo rebirth_option( 'author_name' ) ?></div>
            <div class="text-center main-hero-content-description"><?php echo rebirth_option( 'author_flag' ) ?></div>
            <div class="text-center main-hero-content-description">
				<?php if ( rebirth_option( 'author_city' ) ) : ?>
                    <i class="fas fa-map-marker-alt"></i> <?php echo rebirth_option( 'author_city' ) ?>
				<?php endif; ?>
                <span class="date-divider"></span>
                <i class="fas fa-poll-h"></i> <?php echo count_user_posts( 1, 'post', true ) ?> 篇文章
            </div>
            <div class="text-center main-hero-content-social">
				<?php if ( rebirth_option( 'author_qq' ) ) : ?>
                    <a class="site-tooltip main-hero-content-social-links" target="_blank"
                       rel="noreferrer noopener nofollow"
                       href="<?php echo rebirth_option( 'author_qq' ) ?>" data-toggle="tooltip" data-placement="bottom"
                       title=""
                       data-original-title="加入QQ群">
                        <i class="fab fa-qq"></i>
                    </a>
				<?php endif; ?>
				<?php if ( rebirth_option( 'author_wechat' ) ) : ?>
                    <a
                            class="site-popover main-hero-content-social-links"
                            data-container=".site-wrapper"
                            data-toggle="popover"
                            data-placement="bottom"
                            data-trigger="hover"
                            data-content="<div class='hero-social-wechat'><img src='<?php echo rebirth_option( 'author_wechat' ) ?>' alt='微信二维码'/></div>"
                    ><i class="fab fa-weixin"></i>
                    </a>
				<?php endif; ?>
				<?php if ( rebirth_option( 'author_sina' ) ) : ?>
                    <a class="site-tooltip main-hero-content-social-links" target="_blank"
                       rel="noreferrer noopener nofollow"
                       href="<?php echo rebirth_option( 'author_sina' ) ?>" data-toggle="tooltip"
                       data-placement="bottom" title=""
                       data-original-title="访问微博">
                        <i class="fab fa-weibo"></i>
                    </a>
				<?php endif; ?>
				<?php if ( rebirth_option( 'author_github' ) ) : ?>
                    <a class="site-tooltip main-hero-content-social-links" target="_blank"
                       rel="noreferrer noopener nofollow"
                       href="<?php echo rebirth_option( 'author_github' ) ?>" data-toggle="tooltip"
                       data-placement="bottom" title=""
                       data-original-title="访问Github">
                        <i class="fab fa-github"></i>
                    </a>
				<?php endif; ?>
				<?php if ( rebirth_option( 'author_telegram' ) ) : ?>
                    <a class="site-tooltip main-hero-content-social-links" target="_blank"
                       rel="noreferrer noopener nofollow"
                       href="<?php echo rebirth_option( 'author_telegram' ) ?>" data-toggle="tooltip"
                       data-placement="bottom" title=""
                       data-original-title="访问telegram">
                        <i class="fab fa-telegram"></i>
                    </a>
				<?php endif; ?>
            </div>
            <!--判断是否是分类页-->
		<?php elseif ( is_category() ) : ?>
            <div class="text-center main-hero-content-title"><?php echo getCategoryDescription( 'name' ) ?></div>
			<?php if ( true ): ?>
                <div
                        class="text-center main-hero-content-description"><?php echo getCategoryDescription( 'description' ) ?>
                </div>
			<?php endif ?>
            <div class="text-center main-hero-content-description">
                该分类下有 <?php echo getCurrentCategoryCount(); ?> 篇文章
            </div>
            <!--判断是否是标签页-->
		<?php elseif ( is_tag() ) : ?>
            <div class="text-center main-hero-content-title">
				<?php echo get_the_tags()[0]->name ?>
            </div>
			<?php if ( true ): ?>
                <div
                        class="text-center main-hero-content-description"><?php echo get_the_tags()[0]->description ?>
                </div>
			<?php endif ?>
            <div class="text-center main-hero-content-description">
                该标签下有 <?php echo get_the_tags()[0]->count ?> 篇文章
            </div>
            <!--判断是否是首页-->
		<?php elseif ( is_home() ) : ?>
            <div class="text-center main-hero-content-title"><?php echo rebirth_option( 'author_name' ) ?></div>
            <div class="text-center w-75 main-hero-content-description home-sentence"></div>
		<?php endif; ?>
    </div>
	<?php get_template_part('tpl/site/site', 'wave'); ?>
</section>