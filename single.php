<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @Version: 1.0.1
 * @link  https://yqqy.top
 */
get_header();
?>
<div class="progress site-progress">
    <div class="progress-bar reading-progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
         aria-valuemax="100"></div>
</div>
<?php get_template_part('tpl/single/single', 'header'); ?>

<?php get_template_part('tpl/single/single', 'content'); ?>

<?php get_footer(); ?>
