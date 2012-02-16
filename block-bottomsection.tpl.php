<?php
$edit_links = l(t('edit block'), 'admin/build/block/configure/'. $block->module .'/'. $block->delta, array('title' => t('edit the content of this block'), 'class' => 'block-edit'), drupal_get_destination(), NULL, FALSE, TRUE);
?>

<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="<?php

if (((region_has_block('left')) && (region_has_block('right'))) && (($block_count == 4) && ($block_id == 1))): print 'span2';
elseif (((region_has_block('left')) && (region_has_block('right'))) && (($block_count == 4) && ($block_id == 2))): print 'span2';
elseif (((region_has_block('left')) && (region_has_block('right'))) && ($block_count == 4)) : print 'span1'; 
elseif (((region_has_block('left')) && (region_has_block('right'))) && ($block_count == 3)) : print 'span2'; 
elseif (((region_has_block('left')) && (region_has_block('right'))) && ($block_count == 2)) : print 'span3';
elseif (((region_has_block('left')) && (region_has_block('right'))) && ($block_count == 1)) : print 'span6'; 

elseif (((region_has_block('left')) || (region_has_block('right'))) && (($block_count == 4) && ($block_id == 1))): print 'span3';
elseif (((region_has_block('left')) || (region_has_block('right'))) && ($block_count == 4)) : print 'span2'; 
elseif (((region_has_block('left')) || (region_has_block('right'))) && ($block_count == 3)) : print 'span3'; 
elseif (((region_has_block('left')) || (region_has_block('right'))) && (($block_count == 2) && ($block_id == 1))): print 'span6';
elseif (((region_has_block('left')) || (region_has_block('right'))) && (($block_count == 2) && ($block_id == 2))): print 'span3'; 
elseif (((region_has_block('left')) || (region_has_block('right'))) && ($block_count == 1)) : print 'span9'; 

elseif ($block_count == 4) : print 'span3';
elseif ($block_count == 3) : print 'span4';
elseif ($block_count == 2) : print 'span6';
else: print 'span12'; 
endif; 
?> block block-<?php print $block->module ?>">
  <?php if ($block->subject): ?>
  <h2><?php print $block->subject ?></h2>
  <?php endif;?>
  <div class="content"><?php print $block->content ?></div>
  <?php if (user_access('administer blocks')) :?>
  <span class="label label-important"><?php print $edit_links; ?>
  <?php if ($block_id == 1) print '1 of ' . $block_count; ?>
  <?php if ($block_id == 2) print '2 of ' . $block_count; ?>
  <?php if ($block_id == 3) print '3 of ' . $block_count; ?>
  <?php if ($block_id == 4) print '4 of ' . $block_count; ?>
  </span>
  <?php endif; ?>
</div>
