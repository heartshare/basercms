<?php
/* SVN FILE: $Id$ */
/**
 * [ADMIN] プラグイン　フォーム
 *
 * PHP versions 5
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2013, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @version			$Revision$
 * @modifiedby		$LastChangedBy$
 * @lastmodified	$Date$
 * @license			http://basercms.net/license/index.html
 */
?>
<?php echo $this->BcForm->input('ResetDbUrl', array('type' => 'hidden', 'value' => $this->BcBaser->getUrl(array('action' => 'reset_db')))) ?>
<script type="text/javascript">
$(function(){
  $("#BtnReset").click(function(){
    if(confirm('プラグインのデータを初期化します。よろしいですか？')) {
      $("#PluginAdminInstallForm").attr('action', $("#ResetDbUrl").val());
    } else {
      return false;
    }
  });
});
</script>

<?php if ($installMessage): ?>
	<div id="UpdateMessage"><?php echo $installMessage ?></div>
<?php endif ?> 

<?php echo $this->BcForm->create('Plugin', array('url' => array($this->request->data['Plugin']['name']))) ?>
<?php echo $this->BcForm->input('Plugin.name', array('type' => 'hidden')) ?>
<?php echo $this->BcForm->input('Plugin.title', array('type' => 'hidden')) ?>
<?php echo $this->BcForm->input('Plugin.status', array('type' => 'hidden')) ?>
<?php echo $this->BcForm->input('Plugin.version', array('type' => 'hidden')) ?>

<div class="em-box">
	<?php echo $this->BcForm->value('Plugin.name') . ' ' . $this->BcForm->value('Plugin.version') ?>
	<?php if ($this->BcForm->value('Plugin.title')): ?>
		（<?php echo $this->BcForm->value('Plugin.title') ?>）
	<?php endif ?>
</div>

<div>
	<?php echo $this->BcForm->error('Plugin.name') ?>
	<?php echo $this->BcForm->error('Plugin.title') ?>
</div>

<div class="submit">

	<?php if ($dbInited): ?>
		<?php echo $this->BcForm->submit('プラグインのデータを初期化する', array('div' => false, 'class' => 'button', 'id' => 'BtnReset')) ?>
		<?php echo $this->BcForm->submit('有効化', array('div' => false, 'class' => 'button', 'id' => 'BtnSave')) ?>
	<?php else: ?> 
		<?php echo $this->BcForm->submit('インストール', array('div' => false, 'class' => 'button', 'id' => 'BtnSave')) ?>
	<?php endif; ?>
</div>

<?php echo $this->BcForm->end() ?>
