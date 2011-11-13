<?php if(theme_get_setting('mothership_html5')){  ?>
<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" <?php print $rdf_namespaces; ?>>
<?php }else{ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<?php } ?>

<?php print $mothership_poorthemers_helper; ?>
<?php
/*
TODO a test if we use rdf to add in the profile
*/

if(theme_get_setting('mothership_html5')){  ?>
  <head>
<?php }else{ ?>
  <head profile="<?php print $grddl_profile; ?>">
<?php } ?>

<title><?php print $head_title; ?></title>

<?php print $head; ?>
<?php print $appletouchicon; ?>

<?php if(theme_get_setting('mothership_viewport')){  ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php } ?>

<?php print $styles; ?>

<?php print $scripts; ?>

<?php
//  if(module_exists('html5_tools')){
//    print $html5shiv;
//  }
//TODO: some kinda setting for shiv - modenizr etc settings
?>

<?php if(theme_get_setting('mothership_html5')){  ?>
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<?php } ?>

<?php print $selectivizr; ?>

</head>

<!--[if IE 8]>    <body class="<?php print $classes; ?> ie ie8" <?php print $attributes;?>><![endif]-->
<!--[if IE 7]>    <body class="<?php print $classes; ?> ie ie7" <?php print $attributes;?>><![endif]-->
<!--[if IE 6]>    <body class="<?php print $classes; ?> ie ie6" <?php print $attributes;?>><![endif]-->
<!--[if !IE]>-->  <body class="<?php print $classes; ?>" <?php print $attributes;?>> <!--<![endif]-->
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

  <?php print $page_top; //stuff from modules always render first ?>

  <?php print $page_header; // comes from template.php preprocess page?>
  <?php print $page; // uses the page.tpl ?>
  <?php print $page_footer;  // comes from template.php preprocess page ?>

  <?php print $page_bottom; //stuff from modules always render last ?>

</body>
</html>
