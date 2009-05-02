<?php
// $Id: page.tpl.php,v 1.1.2.9 2009/05/02 13:59:51 jmburnz Exp $

/**
 * @file page.tpl.php
 * Theme implementation to display a single Drupal page.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <?php print $head; ?>
		<title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<?php
/**
 * Change the body id selector to your preferred layout e.g body id="genesis_1"
 * @see layout.css
 */
?>
<body id="genesis_1" <?php if (!$is_front): print 'class="'. $section_class .'"'; endif; ?>>
  <div id="container" class="width <?php print $classes; ?>">

    <div id="skip-nav" class="clear-block">
      <a href="#main-content"><?php print t('Skip to main content'); ?></a>
    </div>

    <?php if ($leaderboard): ?>
      <div id="leaderboard" class="region clear-block"><?php print $leaderboard; ?></div>
    <?php endif; ?>

				<div id="header" class="clear-block">

						<?php if ($site_logo or $site_name or $site_slogan): ?>
								<div id="branding">
	
										<?php if ($site_logo): ?>
												<div id="logo"><?php print $site_logo; ?></div>
										<?php endif; ?>

										<?php if ($site_name): ?>
												<?php if ($title): ?>
														<div id="site-name"><strong><?php print $site_name; ?></strong></div>
												<?php else: /* Use h1 when the page title is empty */ ?>
														<h1 id="site-name"><?php print $site_name; ?></h1>
												<?php endif; ?>
										<?php endif; ?>

										<?php if ($site_slogan): ?>
												<div id="site-slogan"><?php print $site_slogan; ?></div>
										<?php endif; ?>

								</div>
						<?php endif; ?>

						<?php if ($search_box): print $search_box; endif; ?>

						<?php if ($header): ?>
								<div id="header-blocks" class="region"><?php print $header; ?></div>
						<?php endif; ?>

				</div>

				<?php if ($primary_menu or $secondary_menu): ?>
						<div id="nav" class="clear-block">
								<?php if ($primary_menu): print $primary_menu; endif; ?>
								<?php if ($secondary_menu): print $secondary_menu; endif; ?>
						</div>
				<?php endif; ?>

    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php if ($secondary_content): ?>
      <div id="secondary-content" class="region clear clear-block"><?php print $secondary_content; ?></div>
    <?php endif; ?>

    <div id="columns" class="clear">

      <div id="content-column">
        <div class="content-inner">

          <?php if ($mission): ?>
            <div id="mission"><?php print $mission; ?></div>
          <?php endif; ?>

          <?php if ($content_top): ?>
            <div id="content-top" class="region"><?php print $content_top; ?></div>
          <?php endif; ?>

          <div id="main-content">								
            <?php if ($title): ?><h1 id="page-title"><?php print $title; ?></h1><?php endif; ?>
            <?php if ($tabs): ?><div class="local-tasks"><?php print $tabs; ?></div><?php endif; ?>
            <?php if ($messages): print $messages; endif; ?>
            <?php if ($help): print $help; endif; ?>
            <?php print $content; ?>
          </div>

          <?php if ($content_bottom): ?>
            <div id="content-bottom" class="region"><?php print $content_bottom; ?></div>
          <?php endif; ?>

        </div>
      </div>

      <?php if ($left): ?>
        <div id="sidebar-left" class="sidebar"><?php print $left; ?></div>
      <?php endif; ?>

      <?php if ($right): ?>
        <div id="sidebar-right" class="sidebar"><?php print $right; ?></div>
      <?php endif; ?>

    </div>

    <?php if ($tertiary_content): ?>
      <div id="tertiary-content" class="region clear-block"><?php print $tertiary_content; ?></div> 
    <?php endif; ?>

    <?php if ($footer): ?>
      <div id="footer" class="region clear clear-block"><?php print $footer; ?></div>
    <?php endif; ?>

    <?php if ($footer_message or $feed_icons): ?>
      <div id="footer-message"><?php print $footer_message; ?><?php print $feed_icons; ?></div>
    <?php endif; ?>

  </div>

  <?php print $closure ?>
</body>
</html>