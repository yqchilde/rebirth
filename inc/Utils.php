<?php
/**
 * 响应式wordpress主题
 *
 * @package : rebirth
 * @Author: Yqchilde
 * @link  https://yqqy.top
 */

// 获取文章默认特色图片
function getThumbnail() {
	preg_match( "/^https?:\/\/(([a-zA-Z0-9_-])+(\.)?)*(:\d+)?(\/[#]?((\.)?(\?)?=?&?[a-zA-Z0-9_%-](\?)?)*)*$/", rebirth_option( 'default_img' ), $match );
	if ( $match ) {
		return $match[0];
	} else {
		return "/wp-content/themes/rebirth" . rebirth_option( 'default_img' );
	}
}

// 获取作者页头像
function getAuthorAvatar() {
	if ( rebirth_option( 'author_avatar' ) ) {
		$avatar = rebirth_option( 'author_avatar' );
	} else {
		$avatar = get_avatar_url( get_the_author_meta( 'ID' ) );
	}

	return $avatar;
}

// 预计阅读时间统计
function getReadTime( $post_content ) {
	$speed    = 300;
	$text_num = mb_strlen( preg_replace( '/\s/', '', html_entity_decode( strip_tags( $post_content ) ) ), 'UTF-8' );

	return ceil( $text_num / $speed );
}

// 文章摘要缩略长度
function newExcerptLength() {
	return 95;
}

// 文章摘要缩略符号
function newExcerptMore() {
	return ' ...';
}

add_filter( 'excerpt_more', 'newExcerptMore' );
add_filter( "excerpt_length", "newExcerptLength", 999 );

// 定制摘要样式
function diyExcerptStyle( $post_excerpt, $type ) {
	$post_excerpt = strip_tags( htmlspecialchars_decode( $post_excerpt ) );
	$post_excerpt = trim( $post_excerpt );

	$patternArr   = array( '/\s/', '/ /' );
	$replaceArr   = array( '', '' );
	$post_excerpt = preg_replace( $patternArr, $replaceArr, $post_excerpt );

	if ( $type == 'home' ) {
		if ( strlen( $post_excerpt ) == 0 ) {
			return '';
		} else if ( strlen( $post_excerpt ) > 400 ) {
			return mb_strcut( $post_excerpt, 0, 400, 'utf-8' ) . '...';
		} else {
			return mb_strcut( $post_excerpt, 0, 400, 'utf-8' );
		}
	} elseif ( $type == 'single' ) {
		if ( strlen( $post_excerpt ) == 0 ) {
			return '';
		} else if ( strlen( $post_excerpt ) > 280 ) {
			return mb_strcut( $post_excerpt, 0, 280, 'utf-8' ) . '...';
		} else {
			return mb_strcut( $post_excerpt, 0, 280, 'utf-8' );
		}
	} else {
		return null;
	}
}

// 设置nav的a标签中的class和data-link-alt属性
function rebirth_menu_link_attr( $attr, $item ) {
	$attr['class']         = 'nav-link';
	$attr['data-link-alt'] = $item->title;

	return $attr;
}

add_filter( 'nav_menu_link_attributes', 'rebirth_menu_link_attr', 10, 3 );

// 给分页导航 next_posts_link api 添加属性
function rebirth_next_posts_link_attributes() {
	return 'class="page-link"' . 'aria-label="下一页"';
}

add_filter( 'next_posts_link_attributes', 'rebirth_next_posts_link_attributes' );

// 给分页导航 previous_posts_link api 添加属性
function rebirth_prev_posts_link_attributes() {
	return 'class="page-link"' . 'aria-label="上一页"';
}

add_filter( 'previous_posts_link_attributes', 'rebirth_prev_posts_link_attributes' );

// 获取阅读数量
function getPostViews( $postID ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );

		return "0";
	}

	return $count;
}

// 设置或更新阅读数量
function setPostViews( $postID ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
	} else {
		$count ++;
		update_post_meta( $postID, $count_key, $count );
	}
}

// Gravatar头像使用中国服务器
function gravatar_cn( $url ) {
	$gravatar_url = array( '0.gravatar.com', '1.gravatar.com', '2.gravatar.com', 'secure.gravatar.com' );

	if ( rebirth_option( 'gravatar_source' ) ) {
		return str_replace( $gravatar_url, rebirth_option( 'gravatar_source' ), $url );
	}

	return str_replace( $gravatar_url, 'sdn.geekzu.org', $url );
}

add_filter( 'get_avatar_url', 'gravatar_cn', 4 );

// 获取相邻文章缩略图 上一篇
function getPrevThumbnailUrl() {
	$prev_post = get_previous_post();
	if ( ! $prev_post ) {
		return getThumbnail(); // 首页图
	} else {
		return isHaveThumbnailInArticle( $prev_post );
	}
}

// 下一篇
function getNextThumbnailUrl() {
	return isHaveThumbnailInArticle( get_next_post() );
}

// 判断文章中是否有缩略图
function isHaveThumbnailInArticle( $obj ) {
	if ( has_post_thumbnail( $obj->ID ) ) {
		$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $obj->ID ), 'large' );

		return $img_src[0];
	} else {
		$content = $obj->post_content;
		preg_match_all( '/<img.*?[ \t\r\n]?src=[\'"]?(.+?)[\'"]?(?:[ \t\r\n]+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER );
		$n = count( $strResult[1] );
		if ( $n > 0 ) {
			return $strResult[1][0];
		} else {
			return getThumbnail();
		}
	}
}

// 获取当前分类文章总数
function getCurrentCategoryCount() {
	$cat_ID = get_query_var( 'cat' );

	return get_category( $cat_ID )->count;
}

// 友情链接
function getTheLinkItems( $id = null ) {
	$bookmarks = get_bookmarks( 'orderby=link_id&category=' . $id );
	$linksInfo = [];
	if ( ! empty( $bookmarks ) ) {
		foreach ( $bookmarks as $k => $bookmark ) {
			if ( empty( $bookmark->link_description ) ) {
				$bookmark->link_description = 'This guy is so lazy ╮(╯▽╰)╭';
			}
			if ( empty( $bookmark->link_image ) ) {
				$bookmark->link_image = 'https://pic.yqqy.top/blog/20200223184800.png?imageslim';
			}
			$linksInfo[ $k ]["link_url"]         = $bookmark->link_url;
			$linksInfo[ $k ]["link_name"]        = $bookmark->link_name;
			$linksInfo[ $k ]["link_image"]       = $bookmark->link_image;
			$linksInfo[ $k ]["link_description"] = $bookmark->link_description;
		}
	}

	return $linksInfo;
}

// 获取分类页面描述
function getCategoryDescription( $info ) {
	if ( $info == "name" ) {
		return get_category( get_query_var( 'cat' ) )->name;
	} else if ( $info == "description" ) {
		return get_category( get_query_var( 'cat' ) )->description;
	}

	return null;
}

// 实时搜索路由
add_action( 'rest_api_init', function () {

	register_rest_route( 'rebirth/v1', '/cache_search/json', array(
		'methods'  => 'GET',
		'callback' => 'cacheSearchJson',
	) );

} );

// 实时搜索rest api
function cacheSearchJson() {
	$vowels = array(
		"[",
		"{",
		"]",
		"}",
		"<",
		">",
		"\r\n",
		"\r",
		"\n",
		"-",
		"'",
		'"',
		'`',
		" ",
		":",
		";",
		'\\',
		"  ",
		"toc"
	);
	$regex  = <<<EOS
/<\/?[a-zA-Z]+("[^"]*"|'[^']*'|[^'">])*>|begin[\S\s]*\/begin|hermit[\S\s]*\/hermit|img[\S\s]*\/img|{{.*?}}|:.*?:/m
EOS;

	$output = '';
	$posts  = new WP_Query( 'posts_per_page=-1&post_status=publish&post_type=post' );
	while ( $posts->have_posts() ): $posts->the_post();
		$output .= '{"type":"post","link":"' . get_permalink() . '","title":' . json_encode( get_the_title() ) . ',"time":"' . get_the_time( 'Y-m-d', $posts->ID ) . '","text":' . json_encode( str_replace( $vowels, " ", preg_replace( $regex, ' ', get_the_content() ) ) ) . '},';
	endwhile;
	wp_reset_postdata();

	$pages = get_pages();
	foreach ( $pages as $page ) {
		$output .= '{"type":"page","link":"' . get_page_link( $page ) . '","title":' . json_encode( $page->post_title ) . ',"time":"' . get_the_time( 'Y-m-d', $posts->ID ) . '","text":' . json_encode( str_replace( $vowels, " ", preg_replace( $regex, ' ', $page->post_content ) ) ) . '},';
	}

	$output = substr( $output, 0, strlen( $output ) - 1 );

	$data   = '[' . $output . ']';
	$result = new WP_REST_Response( json_decode( $data ), 200 );
	$result->set_headers(
		array(
			'Content-Type'  => 'application/json',
			'Cache-Control' => 'max-age=3600',
		)
	);

	return $result;
}

// 获取后台设置的分类封面图
function getCategoryBgImg() {
	return json_decode( rebirth_option( 'site_category_img' ) );
}

// seo优化(文章内容新窗口打开+nofollow)
function autoLinkNoFollow( $content ) {
	$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>";
	if ( preg_match_all( "/$regexp/siU", $content, $matches, PREG_SET_ORDER ) ) {
		if ( ! empty( $matches ) ) {
			$srcUrl = get_option( 'siteurl' );
			for ( $i = 0; $i < count( $matches ); $i ++ ) {
				$tag      = $matches[ $i ][0];
				$tag2     = $matches[ $i ][0];
				$url      = $matches[ $i ][0];
				$noFollow = '';
				$pattern  = '<a href="(.*?)">';
				preg_match( $pattern, $tag2, $match, PREG_OFFSET_CAPTURE );
				if ( $match[1][0][0] != "#" ) {
					$pattern = '/target\s*=\s*"\s*_blank\s*"/';
					preg_match( $pattern, $tag2, $match, PREG_OFFSET_CAPTURE );
					if ( count( $match ) < 1 ) {
						$noFollow .= ' target="_blank" ';
					}
					$pattern = '/rel\s*=\s*"\s*[n|d]ofollow\s*"/';
					preg_match( $pattern, $tag2, $match, PREG_OFFSET_CAPTURE );
					if ( count( $match ) < 1 ) {
						$noFollow .= ' rel="nofollow" ';
					}
				}
				$pos = strpos( $url, $srcUrl );
				if ( $pos === false ) {
					$tag     = rtrim( $tag, '>' );
					$tag     .= $noFollow . '>';
					$content = str_replace( $tag2, $tag, $content );
				}
			}
		}
	}

	$content = str_replace( ']]>', ']]>', $content );

	return $content;
}

// 获取网站底部导航信息
function getSiteNavInfo() {
	return json_decode( rebirth_option( 'site_bottom_nav_info' ) );
}

// 提取默认avatar的src
function getAvatarUrl( $avatarLink ) {
	preg_match( '/src=["|\'](.+)[\&|"|\']/U', $avatarLink, $matches );

	if ( isset( $matches[1] ) && ! empty( $matches[1] ) ) {
		return esc_url_raw( $matches[1] );
	}

	return '';
}

// 文章关键词seo description优化
function wp_description() {
	global $s, $post;
	$description = '';
	$blog_name   = get_bloginfo( 'name' );
	if ( is_singular() ) {  //文章页如果存在描述字段，则显示描述，否则截取文章内容
		if ( ! empty ( $post->post_excerpt ) ) {
			$text = $post->post_excerpt;
		} else {
			$text = $post->post_content;
		}
		$description = trim( str_replace( array(
			"\r\n",
			"\r",
			"\n",
			"　",
			" "
		), " ", str_replace( "\"", "'", strip_tags( $text ) ) ) );
		if ( ! ( $description ) ) {
			$description = $blog_name . "-" . trim( wp_title( '', false ) );
		}
	} elseif ( is_home() ) {//首页显示描述设置
		$description = rebirth_option( 'site_meta_description' ); // 首頁要自己加
	} elseif ( is_tag() ) {//标签页显示描述设置
		$description = $blog_name . "有关 '" . single_tag_title( '', false ) . "' 的文章";
	} elseif ( is_category() ) {//分类页显示描述设置
		$description = $blog_name . "有关 '" . single_cat_title( '', false ) . "' 的文章";
	} elseif ( is_archive() ) {//文档页显示描述设置
		$description = $blog_name . "在: '" . trim( wp_title( '', false ) ) . "' 的文章";
	} elseif ( is_search() ) {//搜索页显示描述设置
		$description = $blog_name . ": '" . esc_html( $s, 1 ) . "' 的搜索結果";
	} else {//默认其他页显示描述设置
		$description = $blog_name . "有关 '" . trim( wp_title( '', false ) ) . "' 的文章";
	}

	//输出描述
	return $description = mb_substr( $description, 0, 220, 'utf-8' ) . '..';
//	echo "<meta name=\"description\" content=\"$description\" />\n";
}

// 文章关键词seo keywords优化
function wp_keywords() {
	global $s, $post;
	$keywords = '';
	if ( is_single() ) {  //如果是文章页，关键词则是：标签+分类ID
		if ( get_the_tags( $post->ID ) ) {
			foreach ( get_the_tags( $post->ID ) as $tag ) {
				$keywords .= $tag->name . ', ';
			}
		}
		foreach ( get_the_category( $post->ID ) as $category ) {
			$keywords .= $category->cat_name . ', ';
		}
		$keywords = substr_replace( $keywords, '', - 2 );
	} elseif ( is_home() ) {
		$keywords = rebirth_option( 'site_meta_keywords' );  //主页关键词设置
	} elseif ( is_tag() ) {  //标签页关键词设置
		$keywords = single_tag_title( '', false );
	} elseif ( is_category() ) {//分类页关键词设置
		$keywords = single_cat_title( '', false );
	} elseif ( is_search() ) {//搜索页关键词设置
		$keywords = esc_html( $s, 1 );
	} else {//默认页关键词设置
		$keywords = trim( wp_title( '', false ) );
	}
	if ( $keywords ) {  //输出关键词
		return $keywords;
	}

	return "";
}

// 默认文章底部图
function getSingleBottomImg() {
	return "/wp-content/themes/rebirth" . rebirth_option( 'default_img' );
}