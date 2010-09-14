<?php
// $Id$

/**
 * @file node.tpl.php
 * 
 * Theme implementation to display a message box.
 */
?>
<ul class="pageitem">
  <li class="textbox">
    <?php if($title) { ?>
  	  <span class="header"><?php print $title ?></span>
    <?php } ?>
  	<?php print $content ?>
  </li>
</ul>