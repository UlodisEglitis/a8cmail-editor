<?php declare(strict_types = 1);

namespace EmailEditorDemo\Patterns;

use MailPoet\EmailEditor\Engine\Patterns\Abstract_Pattern;

/**
 * Pattern with blockTypes: core/post-content.
 */
class OneColumnPostContentPattern extends Abstract_Pattern {
	public $name = '1-column-content-core-post-content';
	public $block_types = ['core/post-content']; 	// required
	public $template_types = ['email-template']; 	// required
	public $categories = ['email-contents'];  		// optional

	public $namespace = 'email-editor-demo';		// required

	public function get_content(): string {
	  return '
<!-- wp:create-block/php-block /-->
	  <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}}},"layout":{"type":"constrained"},"metadata":{"categories":["email-contents"],"patternName":"mailpoet/1-column-content","name":"1 Column"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:image {"id":49,"width":"504px","sizeSlug":"large","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-large is-resized"><img src="http://localhost:8888/wp-content/uploads/2025/02/hd-05-themes-design@2x-1024x410.png" alt="" class="wp-image-49" style="width:504px"/></figure>
<!-- /wp:image -->

<!-- wp:create-block/php-block /-->

<!-- wp:paragraph -->
<p>One of the most exciting parts of creating a new store is <strong>picking a beautiful theme</strong>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Each professionally designed theme allows you to <strong>customize</strong> it to <strong>match the look and feel</strong> of your brand. They load quickly, are mobile-friendly, and <strong>put your products first</strong>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>So, let’s start by finding the perfect theme.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#3858e9"},"border":{"radius":"6px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" href="https://wordpress.com/themes/testa8c.wordpress.com" style="border-radius:6px;background-color:#3858e9">Design my store</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph -->
<p>If you’re ready to start owning your future today, <a class="" href="https://wordpress.com/plans/testa8c.wordpress.com" target="_blank" rel="noreferrer noopener">launch your store</a> for only $300 a month.</p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:image {"id":59,"width":"80px","sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full is-resized"><img src="http://localhost:8888/wp-content/uploads/2025/02/staff-marta@2x.png" alt="" class="wp-image-59" style="width:80px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Marta<br><strong>The WordPress.com Team</strong></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
	  ';
	}

	public function get_title(): string {
	  /* translators: Name of a content pattern used as starting content of an email */
	  return __('1 Column core/post-content', 'email-editor-demo');
	}
  }
