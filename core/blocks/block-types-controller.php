<?php declare(strict_types = 1);

namespace EmailEditorDemo\Blocks;

class Block_Types_Controller {
  private PHP_Block $php_block;

  public function __construct(
    PHP_Block $php_block
  ) {
	$this->php_block = $php_block;
  }

  public function initialize(): void {
	$this->php_block->initialize();
  }
}
