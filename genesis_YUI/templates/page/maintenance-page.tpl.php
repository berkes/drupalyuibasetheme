<?php
// $Id: maintenance-page.tpl.php,v 1.1.2.1 2009/12/24 00:23:36 jmburnz Exp $

/**
* @file maintenance-page.tpl.php
*
* Theme implementation to display a single Drupal page while off-line.
*
* @see template_preprocess()
* @see template_preprocess_maintenance_page()
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body id="genesis-2b">
  <div id="container" class="<?php print $body_classes; ?>">
    <div id="header" class="clear-block">
      <?php if ($logo or $site_name or $site_slogan): ?>
        <div id="branding">
          <?php if (!empty($logo)): ?>
            <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
          <?php endif; ?>
          <?php if (!empty($site_name)): ?>
            <div id="site-name"><strong>
              <a href="<?php print $base_path ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
            </strong></div>
          <?php endif; ?>
          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /branding -->
      <?php endif; ?>
    </div> <!-- /header -->
    <div id="columns"><div class="columns-inner clear-block">
      <div id="content-column"><div class="content-inner">
        <div id="main-content">
          <?php if ($title): ?><h1 id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <div id="content" class="section region">
            <?php print $content; ?>
          </div>
        </div> <!-- /main-content -->
      </div></div> <!-- /content-column -->
    </div></div> <!-- /columns -->
  </div> <!-- /container -->
  <?php print $closure ?>
</body>
</html>