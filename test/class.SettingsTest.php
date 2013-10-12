<?php
class SettingsTest {
	public function __construct() {
		UnitTest::addToTestedStack ( "SettingsTest" );
	}
	public function firstTest() {
		UnitTest::assertEquals ( Settings::getParam ( "db", "user" ), "user" );
		UnitTest::assertEquals ( Settings::getParam ( "db", "user" ), "root" );
	}
	public function secondTest() {
		UnitTest::assertEquals ( Settings::getParam ( "db", "user" ), "root" );
	}
}