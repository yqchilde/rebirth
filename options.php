<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// 从样式表获取主题名称
//	$themeName = wp_get_theme();
//	$themeName = preg_replace("/\W/", "_", strtolower($themeName));
//
//	$optionsFramework_settings = get_option('optionsframework');
//	$optionsFramework_settings['id'] = $themeName;
//	update_option('optionsframework', $optionsFramework_settings);

	$option_name = get_option( 'stylesheet' );
	$option_name = preg_replace( "/\W/", "_", strtolower( $option_name ) );

	return $option_name;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	// 将所有分类（categories）加入数组
	$options_categories     = array();
	$options_categories_obj = get_categories();
	foreach ( $options_categories_obj as $category ) {
		$options_categories[ $category->cat_ID ] = $category->cat_name;
	}

	// 将所有标签（tags）加入数组
	$options_tags     = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[ $tag->term_id ] = $tag->name;
	}


	// 将所有页面（pages）加入数组
	$options_pages     = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ( $options_pages_obj as $page ) {
		$options_pages[ $page->ID ] = $page->post_title;
	}

	// 如果使用图片单选按钮, define a directory path
	$imagepath = get_template_directory_uri() . '/images/';

	$options = array();

	// 基本设置
	$options[] = array(
		'name' => '基础设置',
		'type' => 'heading'
	);

	// 站点名称
	$options[] = array(
		'name' => '站点名称',
		'desc' => 'Yq\'s Blog',
		'id'   => 'site_name',
		'std'  => '',
		'type' => 'text'
	);

	// 首页封面图
	$options[] = array(
		'name' => '首页封面图',
		'desc' => '填写首页封面图的完整链接',
		'id'   => 'home_cover',
		'std'  => '',
		'type' => 'text'
	);

	// logo
	$options[] = array(
		'name' => 'logo',
		'desc' => '最佳尺寸30px*30px, 建议使用svg。
					<a href="https://yqqy.top/tips/848">为什么推荐使用svg图片</a>',
		'id'   => 'site_logo',
		'type' => 'text'
	);

	// favicon图片，填写url或相对WordPress根目录的路径
	$options[] = array(
		'name' => '网站图标',
		'desc' => 'favicon图片，填写url或相对WordPress根目录的路径',
		'id'   => 'favicon_link',
		'std'  => '/favicon.png',
		'type' => 'text'
	);

	// 网站关键词
	$options[] = array(
		'name' => '网站首页关键词',
		'desc' => '各关键字间用半角逗号","分割，数量在5个以内最佳。',
		'id'   => 'site_meta_keywords',
		'type' => 'text'
	);

	// 网站描述
	$options[] = array(
		'name' => '网站首页描述',
		'desc' => '用简洁的文字描述本站点，字数建议在120个字以内。',
		'id'   => 'site_meta_description',
		'std'  => '',
		'type' => 'text'
	);

	// dns预加载图床
	$options[] = array(
		'name' => 'DNS预加载图床',
		'desc' => '输入图床链接，
		不需要输入http(s)，直接//domain',
		'id'   => 'site_dnsprefetch',
		'std'  => '',
		'type' => 'text'
	);

	// 默认没有封面图要展示默认封面图的路径
	$options[] = array(
		'name' => '默认封面图路径',
		'desc' => '如果没有设置文章特色图，就会用这里的图片，支持Url
					默认在主题images文件夹下',
		'id'   => 'default_img',
		'std'  => '/images/post.jpg',
		'type' => 'text'
	);

	// 分类的图片设置
	$options[] = array(
		'name' => '分类的图片设置，$是分类的tag_ID，#号里面是图片链接',
		'desc' => '请注意格式，严格的json格式
					{
						"category_$": "#",
						"category_$": "#",
						依次添加...
					}',
		'id'   => 'site_category_img',
		'std'  => '{
	"category_$": "#",
	"category_$": "#",
	...
}',
		'type' => 'textarea'
	);

	// ICP备案号
	$options[] = array(
		'name' => 'ICP备案号',
		'desc' => '填写你的网站ICP备案号',
		'id'   => 'site_icp',
		'type' => 'text'
	);

	// 公安网备案号
	$options[] = array(
		'name' => '公安网备案号',
		'desc' => '填写你的网站公安网备案号',
		'id'   => 'site_gongan',
		'type' => 'text'
	);

	// 公安网备案跳转地址
	$options[] = array(
		'name' => '公安网备案跳转地址',
		'desc' => '输入你的公安网备案跳转地址，方便查看',
		'id'   => 'site_gongan_link',
		'type' => 'text'
	);

	// 百度统计代码
	$options[] = array(
		'name' => '百度统计代码',
		'desc' => '添加你的百度统计代码',
		'id'   => 'site_baidutj_script',
		'type' => 'textarea'
	);

	// 百度统计查询链接
	$options[] = array(
		'name' => '百度统计查询链接',
		'desc' => '在页面底部展示百度统计查询链接',
		'id'   => 'site_baidutj_link',
		'type' => 'text'
	);

	// 网站右下角文字
	$options[] = array(
		'name' => '网站右下角文字',
		'desc' => '网站右下角显示文字',
		'id'   => 'site_bottom_right_msg',
		'std'  => '只珍朝夕，不负韶华。',
		'type' => 'text'
	);

	// 网站底部导航网址
	$options[] = array(
		'name' => '网站底部导航网址，$name是网站标题，$link是对应链接',
		'desc' => '请注意格式，严格的json格式
					{
						"$name": "$link",
						"$name": "$link",
						依次添加...
					}',
		'id'   => 'site_bottom_nav_info',
		'type' => 'textarea',
		'std'  => '{
	"百度": "https://www.baidu.com",
	"Yq小站": "https://yqqy.top"
}'
	);

	// 作者信息
	$options[] = array(
		'name' => '作者信息',
		'type' => 'heading'
	);

	// 作者
	$options[] = array(
		'name' => '作者',
		'desc' => 'Yqchilde',
		'id'   => 'author_name',
		'std'  => '',
		'type' => 'text'
	);

	// 城市
	$options[] = array(
		'name' => '城市',
		'desc' => '写下你的城市，展示在你的作者页',
		'id'   => 'author_city',
		'std'  => '山西 大同',
		'type' => 'text'
	);

	// 个人头像
	$options[] = array(
		'name' => '个人头像',
		'desc' => '最佳尺寸92px*92px，用于在作者页显示',
		'id'   => 'author_avatar',
		'type' => 'upload'
	);

	// gravatar头像源
	$options[] = array(
		'name' => 'gravatar头像源',
		'desc' => '这里填写你的gravatar头像中文源，默认使用极客族
		不需要写http(s)://',
		'id'   => 'gravatar_source',
		'std'  => 'sdn.geekzu.org',
		'type' => 'text'
	);

	// 自定义关键词和描述
	$options[] = array(
		'name' => '警示语 / 励志铭 / 描述',
		'desc' => '写下一段简洁的文字，展示在你的作者页',
		'id'   => 'author_flag',
		'std'  => '',
		'type' => 'text'
	);

	// 博客弹窗时间
	$options[] = array(
		'name' => '弹窗时间',
		'desc' => '弹窗时间，例如2020-04-07T08:00:00
		注意有个日期和时间中间有个「T」',
		'id'   => 'toast_time',
		'type' => 'text'
	);

	// 博客弹窗内容
	$options[] = array(
		'name' => '弹窗内容',
		'desc' => '要弹窗的内容',
		'id'   => 'toast_content',
		'std'  => '欢迎访问个人博客！如果觉得这个弹窗频繁，可以手动叉掉后暂时不会再出现哦！',
		'type' => 'text'
	);

	// 支付宝捐赠二维码
	$options[] = array(
		'name' => '支付宝捐赠二维码',
		'desc' => '写下一段简洁的文字，展示在你的作者页',
		'id'   => 'donate_alipay',
		'type' => 'upload'
	);

	// 微信捐赠二维码
	$options[] = array(
		'name' => '微信捐赠二维码',
		'desc' => '写下一段简洁的文字，展示在你的作者页',
		'id'   => 'donate_wxpay',
		'type' => 'upload'
	);

	// 社交网络(不写则不显示)
	$options[] = array(
		'name' => '社交网络',
		'type' => 'heading'
	);

	// 腾讯QQ
	$options[] = array(
		'name' => '腾讯QQ',
		'desc' => 'tencent://message/?uin={{QQ number}}. 如： tencent://message/?uin=123456',
		'id'   => 'author_qq',
		'type' => 'text'
	);

	// 微信
	$options[] = array(
		'name' => '微信',
		'desc' => '微信二维码',
		'id'   => 'author_wechat',
		'type' => 'upload'
	);

	// 微博
	$options[] = array(
		'name' => '微博',
		'desc' => '新浪微博地址',
		'id'   => 'author_sina',
		'type' => 'text'
	);

	// github
	$options[] = array(
		'name' => 'github',
		'desc' => 'github地址',
		'id'   => 'author_github',
		'type' => 'text'
	);

	// telegram
	$options[] = array(
		'name' => 'telegram',
		'desc' => 'telegram联系方式',
		'id'   => 'author_telegram',
		'type' => 'text'
	);

	// 其他
	$options[] = array(
		'name' => '其他',
		'type' => 'heading'
	);

	// 关于
	$options[] = array(
		'name' => '关于',
		'desc' => sprintf( 'Theme Rebirth v %s  |  <a href="https://github.com/yqchilde/rebirth"> 主题说明 </a>', Rebirth_Version ),
		'id'   => 'theme_intro',
		'std'  => '',
		'type' => 'typography '
	);

	// 检查更新
	$options[] = array(
		'name'    => '检查更新',
		'desc'    => '<a href="https://github.com/yqchilde/rebirth/releases/latest">Download the latest version</a>',
		'id'      => "theme_version",
		'std'     => "tag",
		'type'    => "images",
		'options' => array(
			'tag'  => 'https://img.shields.io/github/v/release/yqchilde/rebirth.svg?style=flat-square',
			'tag2' => 'https://img.shields.io/github/commits-since/yqchilde/rebirth/' . Rebirth_Version . '?logo=dev&style=flat-square',
		),
	);

	// Valine配置提示
	$options[] = array(
		'name' => '主题评论采用第三方Valine系统',
		'desc' => 'Valine文档：<a href="https://valine.js.org" target="_blank">https://valine.js.org</a>',
		'type' => 'info'
	);

	// appId
	$options[] = array(
		'name' => 'Valine->appId',
		'desc' => '第三方评论Valine的appId',
		'id'   => 'valine_appid',
		'type' => 'text'
	);

	// appKey
	$options[] = array(
		'name' => 'Valine->appKey',
		'desc' => '第三方评论Valine的appKey',
		'id'   => 'valine_appkey',
		'type' => 'text'
	);

	// serverURLs
	$options[] = array(
		'name' => 'Valine->serverURLs',
		'desc' => '第三方评论Valine的serverURLs',
		'id'   => 'valine_serverurls',
		'type' => 'text'
	);

	return $options;
}