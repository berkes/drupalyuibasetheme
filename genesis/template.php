<?php
// $Id: template.php,v 1.1.2.9 2009/05/01 18:06:59 jmburnz Exp $

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
    $vars['site_logo'] = '<a href="'. $vars['front_page'] .'" title="'. t('Home page') .'" rel="home"><img src="'. $vars['logo'] .'" alt="'. $vars['site_name'] .' '. t('logo') .'" /></a>';
  }
  if (!empty($vars['site_name'])) {
    $vars['site_name'] = '<a href="'. $vars['front_page'] .'" title="'. t('Home page') .'" rel="home">'. $vars['site_name'] .'</a>';
  }
		
		// Set variables for the primary and secondary links.
  if (!empty($vars['primary_links'])) {
    $vars['primary_menu'] = theme('links', $vars['primary_links'], array('class' => 'links primary-links'));
		}
		if (!empty($vars['secondary_links'])) {
    $vars['secondary_menu'] = theme('links', $vars['secondary_links'], array('class' => 'links secondary-links'));
  }
		
  // Section classes.
		$path = drupal_get_path_alias($_GET['q']);
  if (!$vars['is_front']) {
    list($section, ) = explode('/', $path, 2);
				$vars['section_class'] = safe_string('section-'. $section);
  }
		// body_classes.
  $classes = explode(' ', $vars['body_classes']);
  if ($class = array_search(preg_replace('/[^a-z0-9_-]+/', '', 'page-'. drupal_strtolower(arg(0))), $classes)) {
    unset($classes[$class]);
  }
  if (!$vars['is_front']) {
    $classes[] = safe_string('page-'. $path);
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

  // Special classes for nodes
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
				  drupal_set_message(t('This node is currently unpublished.'), $type = 'warning');
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
				// Optionally use odd and even zebra classes.
				//$classes[] = $vars['zebra'];
		}
		$vars['classes'] = implode(' ', $classes);


		// If comment subjects are disabled, don't display them.
		if (variable_get('comment_subject_field', 1) == 0) {
				$vars['title'] = '';
		}
		
		// Set messages if comment is unpublished.
		$message = t('Comment'). ' #'. $vars['id'] . t(' is currently unpublished.');
		if ($vars['comment']->status == COMMENT_NOT_PUBLISHED) {
				drupal_set_message($message, $type = 'warning');
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

  // Special classes for blocks
  $classes = array();
  $classes[] = 'block';
  $classes[] = 'block-'. $block->module;
  // Optionally use additional block classes
		//$classes[] = $vars['block_zebra'];
  //$classes[] = 'block-'. $block->region;
  //$classes[] = 'block-count-'. $vars['id'];
  $vars['classes'] = implode(' ', $classes);
  
		/**
			* Add block edit links.
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
						$edit_links[] = l(t('Configure'), 'admin/build/block/configure/' . $block->module . '/' . $block->delta,
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
						$edit_links[] = l( t('Edit Menu'), 'admin/build/menu-customize/' . $menu_name, 
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
 * Converts a string to an id.
 *
 * @param $string
 *   The string
 * @return
 *   The converted string
 *
 * @see http://drupal.org/project/zen
 */
function safe_string($string) {
  $string = drupal_strtolower(preg_replace('/[^a-zA-Z0-9_-]+/', '-', $string));
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

/**
 * Implements HOOK_theme().
 *
 * The Zen base theme (where this comes from) uses this function as a work-around 
 * for a bug in Drupal 6.0-6.4: #252430 (Allow BASETHEME_ prefix in preprocessor 
 * function names).
 *
 * Sub-themes also use this function by calling it from their HOOK_theme() in
 * order to get around a design limitation in Drupal 6: #249532 (Allow subthemes
 * to have preprocess hooks without tpl files.)
 *
 * @param $existing
 *   An array of existing implementations that may be used for override purposes.
 * @param $type
 *   What 'type' is being processed.
 * @param $theme
 *   The actual name of theme that is being being checked.
 * @param $path
 *   The directory path of the theme or module, so that it doesn't need to be looked up.
 */
function genesis_theme(&$existing, $type, $theme, $path) {
  // Each theme has two possible preprocess functions that can act on a hook.
  // This function applies to every hook.
  $functions[0] = $theme .'_preprocess';
  // Inspect the preprocess functions for every hook in the theme registry.
  foreach (array_keys($existing) AS $hook) {
    // Each theme has two possible preprocess functions that can act on a hook.
    // This function only applies to this hook.
    $functions[1] = $theme .'_preprocess_'. $hook;
    foreach ($functions AS $key => $function) {
      // Add any functions that are not already in the registry.
      if (function_exists($function) && !in_array($function, $existing[$hook]['preprocess functions'])) {
        // We add the preprocess function to the end of the existing list.
        $existing[$hook]['preprocess functions'][] = $function;
      }
    }
  }
  // Since we modify the $existing cache directly, return nothing.
  return array();
}