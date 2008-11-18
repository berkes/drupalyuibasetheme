<?php
// $Id: box.tpl.php,v 1.3 2008/11/18 14:52:21 jmburnz Exp $

/**
 * @file box.tpl.php
 * Theme implementation to display a box.
 *
 * @see template_preprocess()
 */
?>
<div class="box">
  <div class="box-inner inner">

		  <?php if ($title): ?>
			   <h2 class="box-title"><?php print $title ?></h2>
		  <?php endif; ?>

		  <div class="box-content">
		    <?php print $content ?>
		  </div>

  </div>
</div>