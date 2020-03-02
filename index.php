<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @Version: 1.0.2
 * @link  https://yqqy.top
 */
get_header(); ?>

<?php get_template_part('tpl/home/home', 'hero'); ?>

<!--加载首页模板-->
<main class="main-content">
    <div class="container-sm">
        <?php if (have_posts()) : ?>
            <?php get_template_part('tpl/home/home', 'thumb'); ?>
        <?php endif; ?>
    </div>
    <?php get_template_part('tpl/home/home', 'pagination'); ?>
</main>

<?php get_footer(); ?>
