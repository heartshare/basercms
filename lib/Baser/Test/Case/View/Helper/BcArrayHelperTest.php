<?php

/**
 * test for BcAdminHelper
 *
 * PHP versions 5
 *
 * baserCMS : Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2013, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2013, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @since			baserCMS v 3.0.0-beta
 * @license			http://basercms.net/license/index.html
 */
App::uses('View', 'View');
App::uses('BcArrayHelper', 'View/Helper');
App::uses('AppHelper', 'View/Helper');

/**
 * Admin helper library.
 *
 * 管理画面用のヘルパー
 *
 * @package       Baser.Test.Case
 * @property      BcAdminHelper $Helper
 */
class BcArrayHelperTest extends CakeTestCase {

	private $data;

	public function setUp() {
		parent::setUp();
		$this->Helper = new BcArrayHelper(new View(null));
		$this->data = array('b' => 'カンジ', 'd' => 'リュウジ', 'a' => 'スナオ', 'c' => 'ゴンチャン');
	}

	public function tearDown() {
		unset($this->Helper);
		parent::tearDown();
	}

/**
 * 配列の最初のキーを判定する
 *
 * */
	public function testFirst() {
		$this->assertTrue($this->Helper->first($this->data, 'b'));
		$this->assertFalse($this->Helper->first($this->data, 'c'));
	}

/**
 * 配列の最後のキーを判定する
 *
 * */
	public function testLast() {
		$this->assertTrue($this->Helper->last($this->data, 'c'));
		$this->assertFalse($this->Helper->last($this->data, 'd'));
	}

/**
 * 配列にテキストを追加する
 *
 * */
	public function testAddTest() {
		// prefixとsuffix両方指定
		$result = $this->Helper->addText($this->data, 'baserCMS開発者:', 'さん');
		$expect = array(
			'b' => 'baserCMS開発者:カンジさん',
			'd' => 'baserCMS開発者:リュウジさん',
			'a' => 'baserCMS開発者:スナオさん',
			'c' => 'baserCMS開発者:ゴンチャンさん',
		);
		$this->assertEquals($expect, $result);

		// prefixのみ指定
		$result = $this->Helper->addText($this->data, 'baserCMS開発者:');
		$expect = array(
			'b' => 'baserCMS開発者:カンジ',
			'd' => 'baserCMS開発者:リュウジ',
			'a' => 'baserCMS開発者:スナオ',
			'c' => 'baserCMS開発者:ゴンチャン',
		);
		$this->assertEquals($expect, $result);

		// suffixのみ指定
		$result = $this->Helper->addText($this->data, null, 'さん');
		$expect = array(
			'b' => 'カンジさん',
			'd' => 'リュウジさん',
			'a' => 'スナオさん',
			'c' => 'ゴンチャンさん',
		);
		$this->assertEquals($expect, $result);

		// prefixとsuffix両方指定なし
		$result = $this->Helper->addText($this->data);
		$expect = array(
			'b' => 'カンジ',
			'd' => 'リュウジ',
			'a' => 'スナオ',
			'c' => 'ゴンチャン',
		);
		$this->assertEquals($expect, $result);
	}

}
