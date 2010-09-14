<?php
// $Id$

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a node.
 */
?>
<?php if (!empty($content)) { ?>
<ul class="pageitem">
  <li class="textbox">
  	<?php if ($teaser) { ?>
  	<span class="header"><?php print $title ?></span>
  	<?php } ?>
  	<p><?php print $content ?></p>
  </li>
</ul>
<?php } ?>