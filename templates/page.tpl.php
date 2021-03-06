<div id="site-content">
  <div id="skipnav">
    <p>Skip to:</p>
    <ul>
      <li><a href="#main" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a></li>
      <?php if ($main_menu): ?>
      <li><a href="#nav" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a></li>
      <?php endif; ?>
    </ul>
  </div>
  <!-- /#skipnav -->
  <div id="global-header">
    <div class="container">
      <div class="row">
        <div id="top-logo" class="span4"><a href="http://www.stanford.edu"><img src="<?php print base_path() . path_to_theme(); ?>/images/header-stanford-logo.png" width="198" height="11" alt="Stanford University" /></a></div>
        <?php if ($page['global_header']): ?>
        <div id="top-menu" class="span8"><?php print render($page['global_header']); ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- /#global-header -->
  <div id="page-content">
      <div id="header" role="banner" class="clearfix">
      <div class="container">
        <div class="row">
	<div class="span5">
        <?php if ($logo): ?>
        <div id="logo"> <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a> </div>
        <?php endif; ?>
        <div id="site">
          <?php if ($site_name): ?>
          <div id="name"><a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>"><?php print $site_name; ?></a></div>
          <?php endif; ?>
          <?php if ($site_slogan): ?>
          <div id="slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div>
        <?php if ($page['header']): ?>
        <?php print render($page['header']); ?>
        <?php endif; ?>
      </div>
      <div class="span7">
      <?php if ($page['header_nav']): ?>
      <?php print render($page['header_nav']); ?>
      <?php endif; ?>
      </div>
      </div>
      </div>
      </div>
      <!-- /#header -->
    <div class="container">
      <?php if ($page['top']): ?>
      <div id="top" class="row"><?php print render($page['top']); ?></div>
      <?php endif; ?>
      <?php if ($main_menu || !empty($page['nav'])): ?>
      <div id="navigation-primary" role="navigation" class="clearfix">
        <div class="navbar row">
	<div class="navbar-inner">
	<div class="">
	 <!--<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
        </a>-->
	<!--<div class="nav-collapse collapse">-->
        <div class="nav-collapse collapse">
        <?php if ($page['nav']): ?>
          <?php print render($page['nav']); ?>
        <?php endif; ?>
        <?php if (empty($page['nav'])): ?>
        <?php if ($main_menu): ?>
        <div id="main-menu"> <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?> </div>
        <!-- /#main-menu -->
        <?php endif; ?>
        <?php endif; ?>
        </div>
      </div></div></div></div>
      <?php endif; ?>
      <!-- /#navigation-primary -->
      
      <?php if ($page['upper']): ?>
      <div id="upper" class="row"><?php print render($page['upper']); ?></div>
      <?php endif; ?>
      <div id="main-content">
        <div id="content-header" class="row">
          <div class="span12"> <?php print $messages; ?> <?php print render($title_prefix); ?>
            <?php if ($title): ?>
            <?php if (!$is_front): ?>
            <h1 class="title" id="page-title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php endif; ?>
            <?php if ($tabs): ?>
            <div id="tabs-wrapper" class="clearfix"><?php print render($tabs); ?></div>
            <?php endif; ?>
            <?php print render($tabs2); ?> <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
            <ul class="action-links">
              <?php print render($action_links); ?>
            </ul>
            <?php endif; ?>
            <?php if ($page['feature']): ?>
            <div id="feature" class="row"><?php print render($page['feature']); ?></div>
            <?php endif; ?>
          </div>
        </div>
        <!-- /#content-header -->
        <div id="content" class="row">
          <?php if ($page['sidebar_first']): ?>
          <div id="sidebar-first" class="sidebar span2"><?php print render($page['sidebar_first']); ?></div>
          <?php endif; ?>
          <!-- /#sidebar-first -->
          <div id="main" role="main" class="<?php if (($page['sidebar_first']) && ($page['sidebar_second'])): print 'span7'; elseif (($page['sidebar_first']) || ($page['sidebar_second'])): print 'span10'; else: print 'span12';	endif; ?>">
            <?php if ($page['content_top']): ?>
            <div id="content-top" class="row"><?php print render($page['content_top']); ?></div>
            <?php endif; ?>
            <?php if ($page['content_upper']): ?>
            <div id="content-upper" class="row"><?php print render($page['content_upper']); ?></div>
            <?php endif; ?>
            <?php if ($breadcrumb): print $breadcrumb; endif;?>
            <?php if ($page['highlighted']): ?>
            <div id="highlighted" class="row"><?php print render($page['highlighted']); ?></div>
            <?php endif; ?>
            <?php print render($page['content']); ?>
            <?php if ($page['content_lower']): ?>
            <div id="content-lower" class="row"><?php print render($page['content_lower']); ?></div>
            <?php endif; ?>
            <?php if ($page['content_bottom']): ?>
            <div id="content-bottom" class="row"><?php print render($page['content_bottom']); ?></div>
            <?php endif; ?>
          </div>
          <!-- /#main -->
          <?php if ($page['sidebar_second']): ?>
          <div id="sidebar-second" class="sidebar span3"><?php print render($page['sidebar_second']); ?></div>
          <?php endif; ?>
          <!-- /#sidebar-second --> 
        </div>
        <!-- /#content -->
        <?php if ($page['lower']): ?>
        <div id="lower" class="row"><?php print render($page['lower']); ?></div>
        <?php endif; ?>
      </div>
      <!--/#main-content--> 
      
    </div>
  </div>
  <!--/#page-content-->
  <div id="footer" role="contentinfo" class="clearfix">
    <div class="container">
    <?php if (!empty($footer_message)): ?>
    <?php print $footer_message; ?>
    <?php endif; ?>
    <?php if ($secondary_menu): ?>
    <div id="navigation-secondary" role="navigation" class="clearfix across-<?php print count($secondary_menu); ?>">
      <div id="secondary-menu">
        <?php $linknum_secondary = count($secondary_menu); print theme('links__system_main_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div>
      <!-- /#secondary-menu --> 
    </div>
    <?php endif; ?>
    <!-- /#navigation-secondary -->
    <?php if ($page['bottom']): ?>
    <div id="bottom" class="row"><?php print render($page['bottom']); ?></div>
    <?php endif; ?>
    <!-- /#bottom --> 
  </div>
  </div>
  <!--/#footer-->
  <div id="global-footer">
    <div class="container">
      <div class="row">
        <div id="bottom-logo" class="span2"><a href="http://www.stanford.edu"><img src="<?php print base_path() . path_to_theme(); ?>/images/footer-stanford-logo.png" alt="Stanford University" /></a></div>
        <div id="bottom-text" class="span10">
          <div id="bottom-menu" class="clearfix">
            <ul>
              <li><a href="http://www.stanford.edu">Stanford University Home</a></li>
              <li><a href="http://visit.stanford.edu/plan/maps.html">Maps &amp; Directions</a></li>
              <li><a href="http://www.stanford.edu/search/">Search Stanford</a></li>
              <li><a href="http://www.stanford.edu/site/terms.html">Terms of Use</a></li>
              <li><a href="http://www.stanford.edu/site/copyright.html">Copyright Complaints</a></li>
            </ul>
          </div>
          <p class="vcard">&copy; <span class="fn org">Stanford University</span>, <span class="adr"><span class="locality">Stanford</span>, <span class="region">California</span> <span class="postal-code">94305</span></span></p>
        </div>
      </div>
    </div>
  </div>
  <!-- /#global-footer --> 
</div>
<!-- /#site-content -->
