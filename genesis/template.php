<?php
// $Id: template.php,v 1.1.2.15 2009/05/19 00:04:59 jmburnz Exp $

/**
 * @file template.php
 */


/**
 * Automatically rebuild the theme registry.
 * Uncomment to use during development.
 */
//drupal_rebuild_theme_registry();


/**
 * Override or insert variables into page templates.
 *
 * @param $vars
 *   A sequential array of variables to pass to the theme template.
 * @param $hook
 *   The name of the theme function being called.
 */
function genesis_preprocess_page(&$vars, $hook) {
  global $theme;

  // Don't display empty help from node_help().
  if ($vars['help'] == "<div class=\"help\"> \n</div>") {
    $vars['help'] = '';
  }
  
  // Set variables for the logo and site_name.
  if (!empty($vars['logo'])) {
    // Return the site_name even when site_name is disabled in theme settings.
    $vars['logo_alt_text'] = variable_get('site_name', '');
    $vars['site_logo'] = '<a href="'. $vars['front_page'] .'" title="'. t('Home page') .'" rel="home"><img src="'. $vars['logo'] .'" alt="'. $vars['logo_alt_text'] .' '. t('logo') .'" /></a>';
  }
  if (!empty($vars['site_name'])) {
    $vars['site_name'] = '<a href="'. $vars['front_page'] .'" title="'. t('Home page') .'" rel="home">'. $vars['site_name'] .'</a>';
  }

  // Set variables for the primary and secondary links.
  if (!empty($vars['primary_links'])) {
    $vars['primary_menu'] = theme('links', $vars['primary_links'], array('class' => 'links primary-links clear-block'));
  }
  if (!empty($vars['secondary_links'])) {
    $vars['secondary_menu'] = theme('links', $vars['secondary_links'], array('class' => 'links secondary-links clear-block'));
  }

  // Section class. The section class is printed on the body element and allows you theme site sections.
  // We use the path alias otherwise all nodes will be in "section-node".
  $path_alias = drupal_get_path_alias($_GET['q']);
  if (!$vars['is_front']) {
    list($section, ) = explode('/', $path_alias, 2);
    $vars['section_class'] = 'class="'. safe_string('section-'. $section) .'"';
  }

  // Body Classes. In Genesis these are printed on the #container wrapper div, not on the body.
  $classes = explode(' ', $vars['body_classes']);

  // Remove the useless page-arg(0) class. In Drupal 7 this become more useful but for now section-class is better.
  if ($class = array_search(preg_replace('![^abcdefghijklmnopqrstuvwxyz0-9-]+!s', '', 'page-'. drupal_strtolower(arg(0))), $classes)) {
    unset($classes[$class]);
  }

 /** 
  * Optional Region body classes
  * Uncomment the following if you need to set
  * body classes for each active region.
  */
  /*		
  if (!empty($vars['leaderboard'])) {
    $classes[] = 'leaderboard';
  }
  if (!empty($vars['header'])) {
    $classes[] = 'header-blocks';
  }
  if (!empty($vars['secondary_content'])) {
    $classes[] = 'secondary-content';
  }
  if (!empty($vars['tertiary_content'])) {
    $classes[] = 'tertiary-content';
  }
  if (!empty($vars['footer'])) {
    $classes[] = 'footer';
  }
  */

  /**
   * Additional body classes to help out themers.
   */
  if (!$vars['is_front']) {
    $normal_path = drupal_get_normal_path($_GET['q']);
    // Set a class based on Drupals internal path, e.g. page-node-1. 
    // Using the alias is fragile because path alias's can change, $normal_path is more reliable.
    $classes[] = safe_string('page-'. $normal_path);
    if (arg(0) == 'node') {
      if (arg(1) == 'add') {
        $classes[] = 'page-node-add'; // Add .node-add class.
      }
      elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
        $classes[] = 'page-node-'. arg(2); // Add .node-edit or .node-delete classes.
      }
    }
  }
  $vars['classes'] = implode(' ', $classes); // Concatenate with spaces.
}


/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   A sequential array of variables to pass to the theme template.
 * @param $hook
 *   The name of the theme function being called.
 */
function genesis_preprocess_node(&$vars, $hook) {
  global $user;
  
  // Set the node id.
  $vars['node_id'] = 'node-'. $vars['node']->nid;

  // Special classes for nodes, emulate Drupal 7.
  $classes = array();
  $classes[] = 'node';
  if ($vars['promote']) {
    $classes[] = 'node-promoted';
  }
  if ($vars['sticky']) {
    $classes[] = 'node-sticky';
  }
  if (!$vars['status']) {
    $classes[] = 'node-unpublished';
  }
  if ($vars['teaser']) {
    // Node is displayed as teaser.
    $classes[] = 'node-teaser';
  }
  if (isset($vars['preview'])) {
    $classes[] = 'node-preview';
  }
  // Class for node type: "node-type-page", "node-type-story", "node-type-my-custom-type", etc.
  $classes[] = 'node-'. $vars['node']->type;
  $vars['classes'] = implode(' ', $classes); // Concatenate with spaces.

  // Set messages if node is unpublished.
  if (!$vars['node']->status) {
    if ($vars['page']) {
      drupal_set_message(t('%title is currently unpublished', array('%title' => $vars['node']->title)), 'warning'); 
    }
    else {
      $vars['unpublished'] = '<span class="unpublished">'. t('Unpublished') .'</span>';
    }
  }
}


/**
 * Override or insert variables in comment templates.
 *
 * @param $vars
 *   A sequential array of variables to pass to the theme template.
 * @param $hook
 *   The name of the theme function being called.
 */
function genesis_preprocess_comment(&$vars, $hook) {
  global $user;

  // Special classes for comments, emulate Drupal 7.
  // Load the node object that the current comment is attached to.
  $node = node_load($vars['comment']->nid);
  $classes = array();
  $classes[]  = 'comment';
  if ($vars['status'] != 'comment-published') {
    $classes[] = $vars['status'];
  }
  else {
    if ($vars['comment']->uid == 0) {
      $classes[] = 'comment-by-anonymous';
    }
    if ($vars['comment']->uid === $vars['node']->uid) {
      $classes[] = 'comment-by-node-author';
    }
    if ($vars['comment']->uid === $vars['user']->uid) {
      $classes[] = 'comment-by-viewer';
    }
    if ($vars['comment']->new) {
      $classes[] = 'comment-new';
    }
    $classes[] = $vars['zebra'];
  }
  $vars['classes'] = implode(' ', $classes);

  // If comment subjects are disabled, don't display them.
  if (variable_get('comment_subject_field', 1) == 0) {
    $vars['title'] = '';
  }

  // Set messages if comment is unpublished.
  if ($vars['comment']->status == COMMENT_NOT_PUBLISHED) {
    drupal_set_message(t('Comment #!id !title is currently unpublished', array('!id' => $vars['id'], '!title' => $vars['title'])), 'warning');
    $vars['unpublished'] = '<span class="unpublished">'. t('Unpublished') .'</span>';
 }
}


/**
 * Add a "Comments" heading above comments except on forum pages.
 */
function genesis_preprocess_comment_wrapper(&$vars) {
  if ($vars['content'] && $vars['node']->type != 'forum') {
    $vars['content'] = '<h2 id="comments-title">'. t('Comments') .'</h2>'.  $vars['content'];
  }
}


/**
 * Override or insert variables into block templates.
 *
 * @param $vars
 *   A sequential array of variables to pass to the theme template.
 * @param $hook
 *   The name of the theme function being called.
 */
function genesis_preprocess_block(&$vars, $hook) {
  $block = $vars['block'];
  
  // Set the block id.
  $vars['block_id'] = 'block-'. $block->module .'-'. $block->delta;

  // Special classes for blocks, emulate Drupal 7.
  // Set up variables for navigation-like blocks.
  $n1 = array('user-1', 'statistics-0');
  $n2 = array('menu', 'book', 'forum', 'blog', 'aggregator', 'comment');
  $h1 = $block->module .'-'. $block->delta;
  $h2 = $block->module;

  // Special classes for blocks
  $classes = array();
  $classes[] = 'block';
  $classes[] = 'block-'. $block->module;
  // Add nav class to navigation-like blocks.
  if (in_array($h1, $n1)) {
    $classes[] = 'nav';
  }
  if (in_array($h2, $n2)) {
    $classes[] = 'nav';
  }

  // Optionally use additional block classes
  //$classes[] = $vars['block_zebra'];
  //$classes[] = 'block-'. $block->region;
  //$classes[] = 'block-count-'. $vars['id'];
  $vars['classes'] = implode(' ', $classes);
  
  /**
   * Add block edit links. Credit to the Zen theme for this implimentation. The only
   * real difference is that the Zen theme wraps each link in span, whereas Genesis 
   * outputs the links in an item-list. Also I have omitted the Views links as these 
   * seem redundant because Views has its own set of hover links.
   */
  if (user_access('administer blocks')) {
    // Display a 'Edit Block' link for blocks.
    if ($block->module == 'block') {
      $edit_links[] = l(t('Edit Block'), 'admin/build/block/configure/'. $block->module .'/'. $block->delta, 
        array(
          'attributes' => array(
            'class' => 'block-edit',
          ),
          'query' => drupal_get_destination(),
          'html' => TRUE,
        )
      );
    }
    // Display 'Configure' for other blocks.
    else {
      $edit_links[] = l(t('Configure'), 'admin/build/block/configure/'. $block->module .'/'. $block->delta,
        array(
          'attributes' => array(
            'class' => 'block-edit',
          ),
          'query' => drupal_get_destination(),
          'html' => TRUE,
        )
      );
    }
    // Display 'Edit Menu' for menu blocks.
    if (($block->module == 'menu' || ($block->module == 'user' && $block->delta == 1)) && user_access('administer menu')) {
      $menu_name = ($block->module == 'user') ? 'navigation' : $block->delta;
      $edit_links[] = l( t('Edit Menu'), 'admin/build/menu-customize/'. $menu_name, 
        array(
          'attributes' => array(
            'class' => 'block-edit',
          ),
          'query' => drupal_get_destination(),
          'html' => TRUE,
        )
      );
    }
    // Theme links as an item list.
    $vars['edit_links'] = '<div class="block-edit">'. theme('item_list', $edit_links) .'</div>';
  }
}


/**
 * Clean a string of unwanted characters.
 *
 * @param $string
 *   The string
 * @return
 *   The converted string
 */
function safe_string($string) {
$string = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $string));
  if (!ctype_lower($string{0})) {
    $string = 'id'. $string;
  }
  return $string;
}


/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function genesis_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return implode(' » ', $breadcrumb);
  }
}