<?php 
// $Id: block.tpl.php,v 1.1 2008/10/19 14:54:47 jmburnz Exp $

/**
 * @file block.tpl.php
	*
 * Theme implementation to display a block.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 */
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module .' '. $block_zebra .' '. $block->region; ?>">
  <div class="block-inner inner">

		<?php if ($block->subject): ?>
			<h2 class="title"><?php print $block->subject; ?></h2>
		<?php endif; ?>
	
		<div class="content">
			<?php print $block->content ?>
		</div>
	
		<?php print $edit_links; ?>
		
 </div>
</div>