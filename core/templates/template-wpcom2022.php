<?php declare(strict_types = 1);

namespace EmailEditorDemo\Templates;

class WPcom2022 {
  public function getSlug(): string {
    return 'wpcom-2022';
  }

  public function getTitle(): string {
    return __('wpcom-2022', 'email-editor-demo');
  }

  public function getDescription(): string {
    return __('wpcom-2022', 'email-editor-demo');
  }

	public function getContent(): string {
		// translators: This is a text used in a footer on an email <!--[mailpoet/site-title]--> will be replaced with the site title.
		$footerText = __('You received this email because you are subscribed to the <!--[mailpoet/site-title]-->', 'email-editor-demo');
		return '
		<!-- wp:group {"lock":{"move":false,"remove":false},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background"><!-- wp:paragraph -->
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|10","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--20)"><!-- wp:image {"id":20,"width":"130px","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large is-resized"><img src="http://localhost:8888/wp-content/uploads/2025/01/wp-1024x210.png" alt="" class="wp-image-20" style="width:130px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:post-content {"lock":{"move":false,"remove":false},"layout":{"type":"default"}} /-->

<!-- wp:group {"style":{"color":{"background":"#f6f7f7"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#f6f7f7"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"49px","style":{"color":{"background":"#f6f7f7"}}} -->
<div class="wp-block-column has-background" style="background-color:#f6f7f7;flex-basis:49px"></div>
<!-- /wp:column -->

<!-- wp:column {"style":{"color":{"background":"#f6f7f7"}}} -->
<div class="wp-block-column has-background" style="background-color:#f6f7f7"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:spacer {"height":"12px"} -->
<div style="height:12px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"id":21,"width":"60px","height":"auto","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="http://localhost:8888/wp-content/uploads/2025/01/icon-wp-jetpack.png" alt="" class="wp-image-21" style="width:60px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><strong>Get the Jetpack app</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Bring your WordPress site with you everywhere you go.</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"120px"} -->
<div class="wp-block-column" style="flex-basis:120px"><!-- wp:image {"lightbox":{"enabled":false},"id":25,"width":"115px","sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full is-resized"><a href="https://play.google.com/store/apps/details?id=com.jetpack.android&amp;referrer=utm_source%3Dblast%26utm_medium%3Demail&amp;pli=1"><img src="http://localhost:8888/wp-content/uploads/2025/01/wpcom-gplay-2x-2.png" alt="" class="wp-image-25" style="width:115px"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"lightbox":{"enabled":false},"id":23,"width":"115px","sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full is-resized"><a href="https://apps.apple.com/app/apple-store/id1565481562?pt=299112&amp;ct=blast_email&amp;mt=8"><img src="http://localhost:8888/wp-content/uploads/2025/01/wpcom-app-store-2x.png" alt="" class="wp-image-23" style="width:115px"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"7px"} -->
<div style="height:7px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"34px"} -->
<div class="wp-block-column" style="flex-basis:34px"><!-- wp:image {"id":27,"width":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="http://localhost:8888/wp-content/uploads/2025/01/wpcom-social-x-2x.png" alt="" class="wp-image-27" style="width:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"34px"} -->
<div class="wp-block-column" style="flex-basis:34px"><!-- wp:image {"id":28,"width":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="http://localhost:8888/wp-content/uploads/2025/01/wpcom-social-fb-2x.png" alt="" class="wp-image-28" style="width:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"34px"} -->
<div class="wp-block-column" style="flex-basis:34px"><!-- wp:image {"id":31,"width":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="http://localhost:8888/wp-content/uploads/2025/01/wpcom-social-ig-2x-1.png" alt="" class="wp-image-31" style="width:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"34px"} -->
<div class="wp-block-column" style="flex-basis:34px"><!-- wp:image {"id":30,"width":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="http://localhost:8888/wp-content/uploads/2025/01/wpcom-social-yt-2x.png" alt="" class="wp-image-30" style="width:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:image {"id":33,"width":"150px","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large is-resized"><img src="http://localhost:8888/wp-content/uploads/2025/01/WP-bb-logo-1024x138.png" alt="" class="wp-image-33" style="width:150px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Learn how to build your website with our video tutorials on <a href="https://www.youtube.com/playlist?list=PL6nDc7ACvovLwH8kNrcVh_-hyx6z94j54&amp;utm_source=email&amp;utm_medium=email&amp;utm_campaign=email_footer" target="_blank" rel="noreferrer noopener">YouTube</a>.</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Automattic, Inc.</strong> - 60 29th St. #343, San Francisco, CA 94110</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><strong>Don’t want these emails?</strong> <a href="blob:https://mc.a8c.com/c6bde39f-fd08-4d7a-848c-c68afe7c2378" target="_blank" rel="noreferrer noopener">Unsubscribe</a> ● <a href="https://wordpress.com/me/notifications/updates" target="_blank" rel="noreferrer noopener">Update your preferences</a></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"26px"} -->
<div style="height:26px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
		'; // we can now remove the subscription_unsubscribe_url shortcode.
	}
}
