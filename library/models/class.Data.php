<?php
/**
 * 
 * Klasa bazowa dla klas opisujących dane
 * @author kb
 * @category Data Object Classes
 * @package models
 * @version 0.0.1
 *
 */
abstract class Data {
	protected $data = null;
	public abstract function getData();
}