<?php
function stanford_bootstrap_preprocess_block(&$vars) {
	$vars['block_count'] = count(block_list($vars['block']->region));
}

function region_has_block($test_region) {
  /* Check to see if a region is occupied
   * returns 1 if it's full
   */

  $test_empty = 0;

  $result = db_query_range('SELECT n.pages, n.visibility FROM {blocks} n WHERE n.region="%s" AND n.theme="%s"', $test_region, $GLOBALS['theme'], 0, 10);
  if (count($result) > 0) {
    while ($node = db_fetch_object($result))
    {

      if ($node->visibility < 2) {
        $path = drupal_get_path_alias($_GET['q']);

        // Compare with the internal and path alias (if any).
        $page_match = drupal_match_path($path, $node->pages);
        if ($path != $_GET['q']) {
          $page_match = $page_match || drupal_match_path($_GET['q'], $node->pages);
        }
        // When $block->visibility has a value of 0, the block is displayed on
        // all pages except those listed in $block->pages. When set to 1, it
        // is displayed only on those pages listed in $block->pages.
        $page_match = !($node->visibility xor $page_match);
      } else {
        $page_match = drupal_eval($block->pages);
      }

      if ($page_match)
        $test_empty = 1;
    }
  }
  return $test_empty;
}

/**
* Generate the HTML output for a menu tree
*/
function phptemplate_menu_tree($tree) {
  return '<ul class="nav nav-tabs">'. $tree .'</ul>';
}

/**
 * Returns a rendered menu tree.
 *
 * @param $tree
 *   A data structure representing the tree as returned from menu_tree_data.
 * @return
 *   The rendered HTML of that data structure.
 */
function phptemplate_menu_tree_output($tree) {
  $output = '';
  $items = array();

  // Pull out just the menu items we are going to render so that we
  // get an accurate count for the first/last classes.
  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  foreach ($items as $i => $data) {
    $extra_class = array();
    if ($i == 0) {
      $extra_class[] = 'first';
    }
    if ($i == $num_items - 1) {
      $extra_class[] = 'last';
    }
    $extra_class = implode(' ', $extra_class);
    $link = theme('menu_item_link', $data['link']);
    if ($data['below']) {
      $output .= theme('menu_item', $link, $data['link']['has_children'], menu_tree_output($data['below']), $data['link']['in_active_trail'], $extra_class);
    }
    else {
      $output .= theme('menu_item', $link, $data['link']['has_children'], '', $data['link']['in_active_trail'], $extra_class);
    }
  }
  return $output ? theme('menu_tree', $output) : '';
}