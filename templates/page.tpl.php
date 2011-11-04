<?php
//dsm(get_defined_vars());
//dsm($theme_hook_suggestions);
// template naming
//page--[CONTENT TYPE].tpl.php

$site_name_element = "h1";
?>
<!--page.tpl.php-->
<?php print $mothership_poorthemers_helper; ?>


<header class="topbar">
  <div class="container">
    <<?php print $site_name_element; ?> id="site-name">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="brand">
        <?php print $site_name; ?>
      </a>
    </<?php print $site_name_element; ?>>

    <?php print render($page['header']); ?>
  </div>
</header>

<div class="page">
  <?php print $breadcrumb; ?>

  <?php if ($action_links): ?>
    <ul class="action-links"><?php print render($action_links); ?></ul>
  <?php endif; ?>

  <?php if ($tabs && $tabs['#primary']): ?>
    <nav><?php print render($tabs); ?></nav>
  <?php endif; ?>

  <div id="main" role="main">
    <?php //title ?>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
    <?php //<div class="page-header"> ?>
      <h1 id="page-title"><?php print $title; ?></h1>
    <?php //</div> ?>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php //title ?>

    <?php if($page['help'] OR $page['highlighted'] OR $messages){ ?>
        <div class="drupal-messages">
        <?php $message_printed = true; ?>
    <?php } ?>

      <?php print render($page['help']); ?>
      <?php print render($page['highlighted']); ?>
      <?php print $messages; ?>
    <?php if(isset($message_printed) && $message_printed){ ?></div><?php } ?>

    <?php print render($page['content']); ?>
  </div><!--/main-->


  <?php print render($page['sidebar_first']); ?>
  <?php print render($page['sidebar_second']); ?>

</div><!--/page-->

<footer>
  <?php print render($page['footer']); ?>
</footer>
