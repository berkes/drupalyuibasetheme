<?php 
// $Id: block.tpl.php,v 1.1.2.1 2009/04/19 17:50:53 jmburnz Exp $

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
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="<?php print $block_classes; ?>">

  <?php if ($block->subject): ?>
    <h2 class="title"><?php print $block->subject; ?></h2>
  <?php endif; ?>

  <?php print $block->content ?>

  <?php print $edit_links; ?>

</div>