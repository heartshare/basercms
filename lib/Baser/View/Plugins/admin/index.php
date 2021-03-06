<?php
/* SVN FILE: $Id$ */
/**
 * [ADMIN] プラグイン 一覧
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
$this->BcBaser->js(array(
	'admin/jquery.baser_ajax_data_list',
	'admin/jquery.baser_ajax_batch',
	'admin/baser_ajax_data_list_config',
	'admin/baser_ajax_batch_config'
	), false);
?>


<script type="text/javascript">
$(function(){
	// データリスト設定
	$.baserAjaxDataList.config.methods.del.confirm = 'このデータを本当に無効にしてもいいですか？\nプラグインフォルダ内のファイル、データベースに保存した情報は削除されずそのまま残ります。';
	$.baserAjaxDataList.config.methods.del.result = null;
	$.baserAjaxDataList.config.methods.delfile = {
		button: '.btn-delfile',
		confirm: '本当に削除してもいいですか？\nプラグインフォルダ内のファイル、データベースのデータも全て削除されます。'
	}
	// 一括処理設定
	$.baserAjaxBatch.config.methods.del.confirm = '本当に無効にしてもいいですか？\nプラグインフォルダ内のファイル、データベースに保存した情報は削除されずそのまま残ります。';
	$.baserAjaxBatch.config.methods.del.result = null;
	$.baserAjaxDataList.init();
	$.baserAjaxBatch.init({ url: $("#AjaxBatchUrl").html()});
	$( "#tabs" ).tabs();
});
</script>


<div id="AjaxBatchUrl" style="display:none"><?php $this->BcBaser->url(array('controller' => 'plugins', 'action' => 'ajax_batch')) ?></div>
<div id="AlertMessage" class="message" style="display:none"></div>

<div id="tabs">
	<ul>
		<li><a href="#DataList">所有プラグイン</a></li>
		<li><a href="#BaserMarket">baserマーケット</a></li>
	</ul>
	<div id="DataList"><?php $this->BcBaser->element('plugins/index_list') ?></div>
	<div id="BaserMarket"><?php $this->BcBaser->element('plugins/index_list_market') ?></div>
</div>