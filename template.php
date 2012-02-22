<?php
function stanford_bootstrap_preprocess_page(&$vars) {
  // Add page template suggestions based on the aliased path.
  // For instance, if the current page has an alias of about/history/early,
  // we'll have templates of:
  // page-about-history-early.tpl.php
  // page-about-history.tpl.php
  // page-about.tpl.php
  // Whichever is found first is the one that will be used.
  if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    if ($alias != $_GET['q']) {
      $template_filename = 'page';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '-' . $path_part;
        $vars['template_files'][] = $template_filename;
      }
    }
  }
}

function stanford_bootstrap_preprocess_block(&$vars) {
  // Count number of blocks in a given theme region
	$vars['block_count'] = count(block_list($vars['block']->region));
}

function region_has_block($test_region) {
  // Check to see if a region is occupied
  // returns 1 if it's full

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
