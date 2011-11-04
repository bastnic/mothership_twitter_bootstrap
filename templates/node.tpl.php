<?php
//kpr(get_defined_vars());
//http://drupalcontrib.org/api/drupal/drupal--modules--node--node.tpl.php

//node--[CONTENT TYPE].tpl.php
if ($classes) {
  $classes = ' class="'. $classes . ' "';
}

if ($id_node) {
  $id_node = ' id="'. $id_node . '"';
}

hide($content['comments']);
hide($content['links']);
?>
<!--node-->
<div <?php print $id_node . $classes .  $attributes; ?>>
  <?php print $mothership_poorthemers_helper; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
  <div class="meta">
    <?php print $user_picture; ?>
    <span class="date">Date <?php print $date; ?></span>
    <span class="author">By <?php print $name; ?></span>
<?php /*    <div class="type"> Type:<?php print $type; ?> </div> */ ?>
    <?php if(module_exists('comment')): ?>
      <div class="comments">Comments: <?php print $comment_count; ?></div>
    <?php endif; ?>
  </div>
  <?php endif; ?>



  <?php  hide($content['fieldname']); ?>
  <div class="content"><?php print render($content['fieldname']);?></div>
  <div class="content"><?php print render($content);?></div>

  <?php print render($content['links']); ?>
  <?php print render($content['comments']); ?>
</div>
