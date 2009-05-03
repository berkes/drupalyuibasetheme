<?php
// $Id: comment-wrapper.tpl.php,v 1.1.2.1 2009/05/03 22:17:38 jmburnz Exp $

/**
 * @file comment-wrapper.tpl.php
 * Default theme implementation to wrap comments.
 *
 * @see template_preprocess_comment_wrapper()
 * @see theme_comment_wrapper()
 */
?>
<?php if ($content): ?>
  <div id="comments">
    <?php print $content; ?>
  </div>
<?php endif; ?> <!-- /silence coder -->