<?php
/*
	template name: 关于
 */

get_header();

?>
<section class="main-hero">

    <style type="text/css" id="responsive-header-img-css" class="responsive-header-img-css">
        .responsive-header-img {
            background-image: url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1");
        }

        @media (max-width: 1000px) {
            .responsive-header-img {
                background-image: url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1");
                background-image: -webkit-image-set(url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1") 1x,
                url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1") 2x);
                background-image: image-set(url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1") 1x,
                url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1") 2x);
            }
        }

        @media (max-width: 600px) {
            .responsive-header-img {
                background-image: url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1");
                background-image: -webkit-image-set(url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1") 1x,
                url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1") 2x);
                background-image: image-set(url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1") 1x,
                url("https://pic.yqqy.top/blog/20200111/40aUV3H1WDdU.jpg?imageMogr2/format/webp/interlace/1") 2x);
            }
        }
    </style>
    <div class="main-hero-bg responsive-header-img"></div>
	<?php get_template_part( 'tpl/site/site', 'wave' ); ?>
    <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
        <div class="text-center main-hero-content-title">关于本站</div>
        <div class="text-center main-hero-content-description">
            Yqchilde /
            <time datetime="2018-10-06">2020-02-09</time>
        </div>
    </div>
</section>
<main class="main-content custom-about-template">
    <div class="container-sm">
        <div class="row">
            <article class="post page borderbox post-content-use-blank post-content">
                <h3 id="-">简介</h3>
                <p>男，98年双鱼座伪文艺程序员，吾辈愚钝身无长物，仅所依凭，唯手熟耳。</p>
                <p>职业：Gopher🐒。</p>
                <p>爱好：写代码，穷游，逗女友开心。 </p>
                <p>常用昵称：Yqchilde</p>
                <p>Gayhub：<a href="https://github.com/yqchilde"
                             target="_blank">https://github.com/yqchilde</a></p>
                <h3 id="--1">有趣的工具</h3>
                <p>短链生成(t.cn)：<a href="https://t.cn/A6hvLzaD" target="_blank">https://t.cn/A6hvLzaD</a></p>
                <p>科学上✈：<a href="https://t.cn/A6h7pEy" target="_blank">https://t.cn/A6h7pEyH</a></p>
                <h3 id="--2">喜欢的话</h3>
                <p>代码写的越急，程序跑得越慢。—— Roy Carlson</p>
                <p>最快的IO就是不IO。—— Nils-Peter Nelson</p>
                <h3 id="--3">联系</h3>
                <p><a>yqchilde@gmail.com</a></p>
                <p>24小时在线，有事请联系！</p>
                <h3 id="--4">声明</h3>
                <p>本博客所有内容采用<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/">知识共享署名-非商业性使用-相同方式共享
                        4.0 国际许可协议进行许可</a>。</p>
            </article>
        </div>
    </div>
</main>
<?php get_footer(); ?>
