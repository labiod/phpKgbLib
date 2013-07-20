<?php
abstract class Component extends Widget {
	public static function factory($componentName) {
		if($parents = class_parents($componentName)) {
			foreach($parents as $parent) {
				if($parent == get_class()) {
					return new $componentName();
	
				}
			}
		}
		return null;
	}	
}