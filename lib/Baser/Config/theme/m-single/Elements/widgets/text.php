<?php
/* SVN FILE: $Id$ */
/**
 * [PUBLISH] テキストウィジェット
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2013, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.Plugins.Blog.View
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
?>
<article class="mainWidth widget-text-<?php echo $id ?>">
<?php if ($name && $use_title): ?>
<h2 class="fontawesome-circle-arrow-down"><?php echo $name ?></h2>
<?php endif ?>
<?php echo $text ?>
</article>
