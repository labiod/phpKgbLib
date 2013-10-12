<?php
class Site extends SerializeModel {
	/**
	 *
	 * @var Site
	 */
	private static $_instance;
	
	/**
	 * return Site
	 */
	public static function getSite() {
		return self::$_instance;
	}
}