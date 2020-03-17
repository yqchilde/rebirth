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
<div class="search-wrapper">
    <div class="container-sm">
        <button type="button" class="close search-close click-search-close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="search-content">
            <div class="search-form">
                <i class="search-icon fas fa-search"></i>
                <label>
                    <input type="text" id="ghost-search-field" class="search-input" placeholder="请输入搜索关键词...">
                </label>
            </div>
            <div class="search-meta" data-no-results-text="有 [results] 篇文章" style="">有 0 篇文章</div>
            <div id="ghost-search-results" class="search-results">
            </div>
        </div>
    </div>
</div>