<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @Version: 1.0.1
 * @link  https://www.yqqy.top
 */

global $paged, $wp_query;
$range = 2;
$max_page = 0;
if (!$max_page) {
    $max_page = $wp_query->max_num_pages;
}
if ($max_page > 1) {
    if (!$paged) {
        $paged = 1;
    }
}
?>

<div class="py-3 py-md-5 site-pagination">
    <nav aria-label="文章分页">
        <ul class="mb-0 pagination">
            <li class="page-item">
                <?php if ($paged != 1) {
                    echo previous_posts_link("<span aria-hidden='true'><i class='fas fa-angle-left'></i></span>");
                } ?>
            </li>
            <?php if ($max_page > $range) {
                if ($paged < $range) {
                    for ($i = 1; $i <= ($range + 1); $i++) {
                        if ($i == $paged) {
                            echo "<li class='page-item active'><span class='page-link'>" . $i . "</span></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                        }
                    }
                } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                    for ($i = $max_page - $range; $i <= $max_page; $i++) {
                        if ($i == $paged) {
                            echo "<li class='page-item active'><span class='page-link'>" . $i . "</span></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                        }
                    }
                } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                    for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                        if ($i == $paged) {
                            echo "<li class='page-item active'><span class='page-link'>" . $i . "</span></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                        }
                    }
                }
            } else {
                for ($i = 1; $i <= $max_page; $i++) {
                    if ($i == $paged) {
                        echo "<li class='page-item active'><span class='page-link'>" . $i . "</span></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
                    }
                }
            } ?>
            <li class="page-item">
                <?php if ($paged != $max_page) {
                    echo next_posts_link("<span aria-hidden='true'><i class='fas fa-angle-right'></i></span>");
                } ?>
            </li>
        </ul>
    </nav>
</div>
