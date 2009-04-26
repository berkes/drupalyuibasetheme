<?php
// $Id: comment.tpl.php,v 1.2 2009/04/26 23:39:05 jmburnz Exp $

/**
 * @file comment.tpl.php
 * Default theme implementation for comments.
 *
 * These two variables are provided for context.
 * - $comment: Full comment object.
 * - $node: Node object the comments are attached to.
 *
 * @see template_preprocess_comment()
 * @see theme_comment()
 */
?>
<div class="<?php print $comment_classes; ?>">

  <?php if ($title): ?>
    <h3 class="comment-title">
      <span class="comment-id"><?php print '#'. $id; ?></span> 
      <?php print $title; ?>
      <?php if ($comment->new): ?>
        <span class="new"><?php print $new; ?></span>
      <?php endif; ?>
						<?php print $unpublished; ?>
    </h3>
  <?php endif; ?>

  <?php print $picture; ?>

  <?php if ($submitted): ?>
    <p class="submitted"><?php print $submitted; ?></p>
  <?php endif; ?>

  <?php print $content; ?>
  
  <?php if ($signature): ?>
    <div class="user-signature"><?php print $signature; ?></div>
  <?php endif; ?>

  <?php if ($links): ?>
    <?php print $links; ?>
  <?php endif; ?>

</div> <!-- /comment -->