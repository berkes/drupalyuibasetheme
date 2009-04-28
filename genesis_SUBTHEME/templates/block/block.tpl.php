<?php 
// $Id: block.tpl.php,v 1.1.2.2 2009/04/28 00:05:33 jmburnz Exp $

/**
 * @file block.tpl.php
 *
 * Theme implementation to display a block.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 */

/**
 * Block Edit Links
 * To disable block edit links remove or comment out the $edit_links variable 
 * then unset the block-edit.css in your subhtemes .info file.
 */
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="<?php print $classes; ?>">
  <div class="block-inner inner">

    <?php if ($block->subject): ?>
      <h2 class="block-title"><?php print $block->subject; ?></h2>
    <?php endif; ?>

    <div class="block-content"><?php print $block->content ?></div>

    <?php print $edit_links; ?>

  </div>
</div>