<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @link  https://yqqy.top
 */
?>
<section class="main-footer-info">
	<div class="container-sm">
		<div class="row">
			<div class="d-none d-lg-block py-5 col main-footer-info-tags">
				<h3 class="mb-3 main-footer-info-title main-footer-info-tags-title">标签云</h3>
				<div class="d-flex flex-row flex-wrap justify-content-center align-items-center w-100 h-100 main-footer-info-tags-list">
					<?php if (get_tags()) : ?>
						<?php $tags = get_tags();
						foreach ( $tags as $v ) : ?>
							<a href="<?php echo home_url() . '/tag/' . $v->slug; ?>"
							   class="tag-item"><?php echo $v->name; ?></a>
						<?php endforeach; ?>
					<?php else: ?>
					暂无标签云
					<?php endif; ?>

				</div>
			</div>
			<div class="d-none d-lg-block py-5 col main-footer-info-navigation">
				<h3 class="mb-3 main-footer-info-title main-footer-info-navigation-title">导航</h3>
				<div class="w-100 h-100 main-footer-info-navigation-list">
					<div class="side-navbar-nav list-group list-group-flush">
						<?php if (is_array(getSiteNavInfo()) || is_object(getSiteNavInfo())) : ?>
							<?php $navInfo = getSiteNavInfo();?>
							<?php foreach ( $navInfo as $k => $v ) : ?>
								<a href="<?php echo $v ?>"
								   class="list-group-item list-group-item-action menu-item side-menu-nav-item nav-bai-du nav-current active"><?php echo $k ?></a>
							<?php endforeach; ?>
                        <?php else: ?>
						暂无导航
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
