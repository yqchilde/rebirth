# WordPress Theme - Rebirth

![](https://img.shields.io/github/v/release/yqchilde/rebirth.svg?style=flat-square) ![](https://img.shields.io/github/commits-since/yqchilde/rebirth/1.0.5?logo=dev&style=flat-square)
### 声明

Rebirth主题的WordPress版本是完全移植过来的，原主题为`JaxsonWang(淮城一只猫)制作`，且是ghost博客主题，详情请看 [点击查看](https://github.com/JaxsonWang/Rebirth)

### 特色

- 大气、简约、优雅以及强大的响应式布局
- 原生黑暗模式，支持 macOS 和 window10 黑暗模式
- 友情链接和关于独立页独特模板，更好展示自己站点
- 恰到好处的个人社交信息
- 适合于中文字体阅读个人文章页面，优化到每一个元素
- [Valine 评论系统](https://valine.js.org/)的支持
- 强大的社交分享文章功能
- 增强模板 SEO 优化
- 更多功能等你来体验

### 更新日志

[更新日志](https://github.com/yqchilde/rebirth/blob/master/CHANGELOG.md)

## 使用指南

### 下载安装

- 建议使用 `git clone` 下载

- 如果直接下载压缩包记载将文件夹名字改回rebirth，即保证主题目录为 `wp-content/themes/rebirth`

- 请把主题文件包解压去掉master改为rebirth

- 关于设置主题方面，在wordpress后台里`外观->Rebirth主题设置`里面操作(都有功能描述)

- 如果发现bug，请及时给我一个issue

  ![](https://pic.yqqy.top/blog/20200227161811.png?imageslim)

### 使用前提示

1. 主题没有用wordpress默认评论系统，所以没有写默认评论样式。主题用的是 **[Valine.js](https://valine.js.org)** 三方评论系统，是基于`Leancloud`的，申请个人免费开发板足够使用，申请之后的**appId**，**appKey**，**serverUrls** 填入主题设置里面即可享受。
2. 主题支持**Markdown**文章，这意味着目前不能使用wordpress自带的默认的古腾堡编辑器，这里我推荐大家使用[WP Githuber MD](https://github.com/terrylinooo/githuber-md)，这款插件，避免页面某些错位。

### 关于页面

是基于wordpress编写的独立页面模板，文件在`/page/page-about.php`，如果需要更改，请更改这个源代码

### 友链页面

是基于wordpress编写的独立页面模板，文件在`/page/page-links.php`，如果需要更改，请更改这个源代码

友链分类如果设置了链接分类那么就会显示分类，如果没有设置链接分类那么就不会显示分类

友链分类顺序、链接分类顺序，全部是按照`link_id`排序的，也就是说创建顺序，所以请灵活调整

**添加友链**

后台->链接->添加->名称、Web地址、图像描述、图像地址

### 新建页面

如果需要新建页面，请在`page/`目录下创建`page-xxx.php`文件，`xxx`就是你在页面的链接后缀，模板编写方法可以百度也可以参考友链或者关于页面，然后在wordpress后台->页面->新建页面->页面属性->模板->`自己创建的模板名字）`

### tag_ID获取方法

关于主题设置分类页面的封面设置里面提到的tag_ID获取方法，详情请看图片

![image.png](https://i.loli.net/2020/03/28/83hXRbALpPJoE9Z.png)
![image.png](https://i.loli.net/2020/03/28/kR6srxdUPtwXqCS.png)

### 主题设置
请在后台->外观->Rebirth主题设置里面填写相关信息，每处都写了解释，如果不懂，请直接给我一个issue。

## 插件推荐

这里列出我正在用的插件，也代表主题兼容性

- `External Media without Import`  让你的媒体库插入外链，这意味着每篇文章的特色图片你可以用图床的外链，不用每次上传图片，导致内存大量增加
- `Google XML Sitemaps`  生成sitemap.xml
- `WP Githuber MD`  markdown编辑器
- `WP Rocket`  让你的wordpress变得更快(缓存插件)
- `百度搜索推送管理`  自动提交链接给百度站长平台

## Support

>jetbrains

<a href="https://www.jetbrains.com/?from=yqchilde/rebirth" target="_blank">
<img src="https://github.com/yqchilde/rebirth/blob/master/images/jetbrains.svg" width="100px" height="100px">
</a>

```
jetbrains有一项开源赞助计划，可以通过开源项目免费申请jetbrains全家桶license
jetbranins官方在赠送license的时候会请求提议加入他们的品牌logo推广放入到仓库中,
不过这一切都是用户自愿的原则
```

## License

WordPress Theme Rebirth is open source and released under the MIT License.