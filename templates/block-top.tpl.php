<?php
$edit_links = l(t('edit block'), 'admin/build/block/configure/'. $block->module .'/'. $block->delta, array('title' => t('edit the content of this block'), 'class' => 'block-edit'), drupal_get_destination(), NULL, FALSE, TRUE);
?>

<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="<?php
if ($block_count == 4) : print 'span3';
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
  <button class="btn"><i class="icon-edit"></i> <?php print $edit_links; ?></button>
  <?php endif; ?>
</div>
