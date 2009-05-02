<?php
// $Id: box.tpl.php,v 1.1.2.3 2009/05/02 00:51:40 jmburnz Exp $

/**
 * @file box.tpl.php
 * Theme implementation to display a box.
 *
 * @see template_preprocess()
 */
?>
<div class="box">
  <div class="box-inner">

    <?php if ($title): ?>
      <h2 class="box-title"><?php print $title ?></h2>
    <?php endif; ?>

    <div class="box-content">
      <?php print $content ?>
    </div>

  </div>
</div>