<?php 
// $Id: node.tpl.php,v 1.1.2.4 2009/05/03 12:06:45 jmburnz Exp $

/**
 * @file node.tpl.php
 * Theme implementation to display a node.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>">

  <?php if (!$page): ?>
    <h2 class="title">
						<a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
						<?php print $unpublished; ?>
		  </h2>
  <?php endif; ?>

  <?php if ($submitted): ?>
    <p class="submitted"><?php print $submitted; ?></p>
  <?php endif; ?>

  <?php print $picture; ?>

  <?php print $content; ?>
		<h1><?php print $sample_variable; ?></h1>

  <?php if ($terms): ?>
    <?php print $terms; ?>
  <?php endif; ?>

  <?php if ($links): ?>
    <?php print $links; ?>
  <?php endif; ?>

</div> <!-- /node -->