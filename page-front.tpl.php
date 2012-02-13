<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
<title><?php print $head_title; ?></title>
<?php print $head; ?><?php print $styles; ?><?php print $scripts; ?>
<script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body class="<?php print $body_classes; ?>">
<div id="wrapper">
  <div id="skipnav">
    <p>Skip to:</p>
    <ul>
      <li><a href="#content">Main Content</a></li>
    </ul>
  </div>
  <div id="global-header">
    <div class="container clear-block">
      <div id="top-logo"><a href="http://www.stanford.edu"><img src="<?php print base_path() . path_to_theme(); ?>/images/header-stanford-logo.png" width="198" height="11" alt="Stanford University" /></a></div>
      <?php if ($header): ?>
      <div id="top-menu"><?php print $header; ?></div>
      <?php endif; ?>
    </div>
  </div>
  <!-- /#global-header -->
  
  <div id="container" class="container clear-block">
    <div id="header" role="banner" class="clear-block">
      <?php if ($logo): ?>
      <div id="logo"> <a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a> </div>
      <?php endif; ?>
      <div id="site">
        <?php if ($site_name): ?>
        <div id="name">
          <h1><a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>"><?php print $site_name; ?></a></h1>
        </div>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
        <div id="slogan"> <?php print $site_slogan; ?> </div>
        <?php endif; ?>
      </div>
      <?php if($search_box): ?>
      <div id="search" role="search"> <?php print $search_box; ?> </div>
      <?php endif; ?>
    </div>
    <!-- /header -->
    <div id="navigation" role="navigation" class="clear-block">
      <?php if (!empty($primary_links)): ?>
      <div id="navigation-primary" role="navigation" class="clear-block"><?php print theme('links', $primary_links, array('class' => 'links primary-links nav nav-pills')); ?></div>
      <?php endif; ?>
      <!--/primary --> 
    </div>
    <!-- /navigation -->
    <?php if ($top): ?>
    <div id="top"><?php print $top ?></div>
    <?php endif; ?>
    <div id="content" class="row">
      <div class="span12">
        <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
        <?php if ($show_messages && $messages): print $messages; endif; ?>
        <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <?php if ($tabs): print $tabs; endif; ?>
        <?php if ($tabs2): print $tabs2; endif; ?>
        <?php if ($tabs): print '</div>'; endif; ?>
        <?php if ($upper): ?>
        <div id="upper"><?php print $upper ?></div>
        <?php endif; ?>
      </div>
      <?php if ($left): ?>
      <div id="sidebar-left" class="span3">
        <div class="well sidebar-nav"> <?php print $left; ?> </div>
      </div>
      <?php endif; ?>
      <!-- /sidebar-left -->
      
      <div id="main" role="main" class="<?php if ($left && $right): print 'span6'; elseif ($left || $right): print 'span9'; else: print 'span12';	endif; ?>">
        <?php if ($feature): ?>
        <div id="feature"><?php print $feature ?></div>
        <?php endif; ?>
        <?php print $help; ?> <?php print $content; ?> </div>
      <!-- /main -->
      
      <?php if ($right): ?>
      <div id="sidebar-right" class="span3">
        <div class="well sidebar-nav"> <?php print $right; ?> </div>
      </div>
      <?php endif; ?>
      <!-- /sidebar-right -->
      
      <?php if ($bottom): ?>
      <div id="bottom" class="span12"><?php print $bottom ?></div>
      <?php endif; ?>
    </div>
    <!--/content-->
    
    <div id="footer" role="contentinfo" class="clear-block">
      <?php if ($footer): ?>
      <?php print $footer ?>
      <?php endif; ?>
      <?php if (!empty($footer_message)): ?>
      <?php print $footer_message; ?>
      <?php endif; ?>
      <?php if (isset($secondary_links)): ?>
      <?php $linknum = count($secondary_links); print '<div id="navigation-secondary" role="navigation" class="across-' . $linknum . '">'; $menu_name = variable_get('menu_secondary_links_source', 'secondary-links'); print menu_tree($menu_name); print '</div>'; ?>
      <?php endif; ?>
      <!--/secondary--> 
    </div>
    <!--/footer--> 
  </div>
  <!--/container-->
  <div id="global-footer">
    <div class="container clear-block">
      <div id="bottom-logo"> <a href="http://www.stanford.edu"><img src="<?php print base_path() . path_to_theme(); ?>/images/footer-stanford-logo.png" alt="Stanford University" /></a> </div>
      <div id="bottom-text">
        <div id="bottom-menu" class="clear-block">
          <ul>
            <li><a href="http://www.stanford.edu">Stanford University Home</a></li>
            <li><a href="http://visit.stanford.edu/plan/maps.html">Maps &amp; Directions</a></li>
            <li><a href="http://www.stanford.edu/search/">Search Stanford</a></li>
            <li><a href="http://www.stanford.edu/site/terms.html">Terms of Use</a></li>
            <li><a href="http://www.stanford.edu/site/copyright.html">Copyright Complaints</a></li>
          </ul>
        </div>
        <p class="vcard">&copy; <span class="fn org">Stanford University</span>, <span class="adr"><span class="locality">Stanford</span>, <span class="region">California</span> <span class="postal-code">94305</span>. <span class="tel">(650) 723-2300</span></span></p>
      </div>
    </div>
  </div>
  <!-- /#global-footer --> 
  <?php print $closure; ?> </div>
</body>
</html>