<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @Version: 1.0.3
 * @link  https://yqqy.top
 */
?>
<section class="main-footer-waves-area waves-area">
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
</section>
<section class="py-5 main-footer-info">
    <div class="container-sm">
        <div class="row">
            <div class="d-none d-lg-block col main-footer-info-tags">
                <h3 class="mb-3 main-footer-info-title main-footer-info-tags-title">标签云</h3>
                <div class="d-flex flex-row flex-wrap align-items-start w-100 h-100 main-footer-info-tags-list">
					<?php $tags = get_tags();
					foreach ( $tags as $v ) : ?>
                        <a href="<?php echo home_url() . '/tag/' . $v->slug; ?>"
                           class="tag-item"><?php echo $v->name; ?></a>
					<?php endforeach; ?>
                </div>
            </div>
            <div class="d-none d-lg-block col main-footer-info-navigation">
                <h3 class="mb-3 main-footer-info-title main-footer-info-navigation-title">导航</h3>
                <div class="w-100 h-100 main-footer-info-navigation-list">
                    <div class="side-navbar-nav list-group list-group-flush">
						<?php if (is_array(getSiteNavInfo()) || is_object(getSiteNavInfo())) : ?>
							<?php $navInfo = getSiteNavInfo();?>
							<?php foreach ( $navInfo as $k => $v ) : ?>
                                <a href="<?php echo $v ?>"
                                   class="list-group-item list-group-item-action menu-item side-menu-nav-item nav-bai-du nav-current active"><?php echo $k ?></a>
							<?php endforeach; ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>