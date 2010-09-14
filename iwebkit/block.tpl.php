<?php
// $Id$

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a block.
 */
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>">
<ul class="pageitem">
    <?php if($block->subject) { ?>
	<li class="textbox">
  	  <span class="header"><?php print $block->subject ?></span>
  	</li>
    <?php } ?>
  	<?php print $block->content ?>
</ul>
</div>