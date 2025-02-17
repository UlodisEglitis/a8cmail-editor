<?php declare(strict_types = 1);

namespace EmailEditorDemo\Blocks;

use EmailEditorDemo\Cdn_Asset_Url;

class PHP_Block extends AbstractBlock {
  private Cdn_Asset_Url $cdnAssetUrl;
  protected $blockName = 'php-block';

  public function __construct(
	Cdn_Asset_Url $cdnAssetUrl
  ) {
    $this->cdnAssetUrl = $cdnAssetUrl;
  }

  public function render($attributes, $content, $block) {
	  return "<?php\n" . $attributes['message'] . "\n?>" ?? null;
  }
}
