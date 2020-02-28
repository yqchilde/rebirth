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

<section class="main-hero">
	<?php if ( is_category() ) : ?>
		<?php $termId = get_category( get_query_var( 'cat' ) )->term_id; ?>
		<?php $categoryImgs = getCategoryBgImg();
		foreach ( $categoryImgs as $k => $v ) : ?>
			<?php if ( explode("_", $k)[1] == $termId ) : ?>
                <div class="main-hero-bg"
                     style="background-image: url('<?php echo $v ?>')"></div>
			<?php endif; ?>
		<?php endforeach; ?>
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
            <!--判断是否是首页-->
		<?php elseif ( is_home() ) : ?>
            <div class="text-center main-hero-content-title"><?php echo rebirth_option( 'author_name' ) ?></div>
            <div class="text-center main-hero-content-description home-sentence"></div>
		<?php endif; ?>
    </div>
    <div class="main-hero-waves-area">
        <svg class="waves-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave"
                      d="M -160 44 c 30 0 58 -18 88 -18 s 58 18 88 18 s 58 -18 88 -18 s 58 18 88 18 v 44 h -352 Z"/>
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0"/>
                <use xlink:href="#gentle-wave" x="48" y="3"/>
                <use xlink:href="#gentle-wave" x="48" y="5"/>
                <use xlink:href="#gentle-wave" x="48" y="7"/>
            </g>
        </svg>
    </div>
</section>