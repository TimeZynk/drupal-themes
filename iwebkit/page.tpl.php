<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<title><?php print $site_name ?></title>
<?php print $head ?>
<?php print $styles ?>
<?php print $scripts ?>
</head>

<body>
<div id="topbar">
  <div id="title">
    <?php
    if($title) {
      print $title;
    } else {
      print $site_name;
    }
    ?>
    </div>
  <div id="leftnav"><?php print $breadcrumb; ?></div>
</div>

<?php
if($tabs) {
  print $tabs;
}
?>

<div id="content">
  <?php if($is_front && $logo) { ?>
  <ul id="site-logo" class="pageitem">
    <li class="textbox center">
      <img src="<?php print $logo ?>"/>
    </li>
  </ul>
  <?php } ?>

  <?php if($messages) { ?>
  <ul class="pageitem">
    <?php print $messages ?>
  </ul>
  <?php } ?>

  <?php if (isset($primary_links)) { ?><?php print theme('links', $primary_links, array('class' => 'links', 'id' => 'navlist')) ?><?php } ?>

  <?php print $content ?>
</div>

<?php if ($footer_message): ?>
<div id="footer">
  <?php print $footer_message; ?>
</div>
<?php endif; ?>
<?php print $closure ?>
</body>
</html>