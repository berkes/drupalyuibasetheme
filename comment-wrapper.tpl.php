<?php
// $Id: comment-wrapper.tpl.php,v 1.4 2009/04/06 06:08:56 jmburnz Exp $

/**
 * @file comment-wrapper.tpl.php
 * Default theme implementation to wrap comments.
 *
 * @see template_preprocess_comment_wrapper()
 * @see theme_comment_wrapper()
 */
?>
<?php if ($content): ?>
  <div id="comment-wrapper">
    <?php print $content; ?>
  </div>
<?php endif; ?> <!-- /silence coder -->