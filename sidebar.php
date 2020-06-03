<div class="sidebar-container">
    <div class="d-flex justify-content-between sidebar-header">
        <div class="sidebar-title"><?php echo rebirth_option( 'site_name' ) ?></div>
        <div class="d-flex sidebar-right">
            <div class="d-flex align-items-center justify-content-center sidebar-search click-search">
                <i class="fas fa-search"></i>
            </div>
            <div class="d-flex align-items-center justify-content-center sidebar-close">
                <i class="fas fa-times"></i>
            </div>
        </div>
    </div>
    <div class="list-group list-group-flush">
		<?php $args = array( "post_type" => "nav_menu_item" ) ?>
		<?php if ( sizeof(get_nav_menu_locations()) !== 0 ) : ?>
			<?php $menus = wp_get_nav_menu_items( get_nav_menu_locations()['primary'], $args ); ?>
			<?php if ( $menus != null ) : ?>
				<?php foreach ( $menus as $v ) : ?>
					<?php if ( is_home() ) : ?>
                        <a href="<?php echo $v->url ?>"
                           class="list-group-item list-group-item-action menu-item"><?php echo $v->title ?></a>
					<?php elseif ( is_category() ) : ?>
                        <a href="<?php echo $v->url ?>" class="list-group-item list-group-item-action menu-item <?php
						if ( get_category( get_query_var( 'cat' ) )->term_id == $v->object_id ) {
							echo 'active';
						} else {
							echo '';
						}
						?>"><?php echo $v->title ?></a>
					<?php elseif ( is_page() ) : ?>
                        <a href="<?php echo $v->url ?>" class="list-group-item list-group-item-action menu-item <?php
						if ( get_queried_object_id() == $v->object_id ) {
							echo 'active';
						} else {
							echo '';
						}
						?>"><?php echo $v->title ?></a>
					<?php elseif ( is_single() ) : ?>
                        <a href="<?php echo $v->url ?>"
                           class="list-group-item list-group-item-action menu-item"><?php echo $v->title ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php endif; ?>
    </div>
    <div class="mt-2 text-center sidebar-footer">
        <button type="button" class="btn site-tooltip btn-footer btn-dark-mode click-dark" data-toggle="tooltip"
                data-placement="bottom" title="切换风格">
            🌓
        </button>
    </div>
</div>
