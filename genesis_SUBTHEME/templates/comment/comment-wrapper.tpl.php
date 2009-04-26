<?php
// $Id: comment-wrapper.tpl.php,v 1.2 2009/04/26 23:39:06 jmburnz Exp $

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