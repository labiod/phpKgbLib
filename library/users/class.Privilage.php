<?php
class Privilage {
	private $module_name;
	private $actions;
	public function __construct(array $record) {
		$this->module_name = $record["module"];
		$this->actions = preg_split("/[ ]*,[ ]*/", trim($record["action_name"]));
	}
	
	public function checkAction($action) {	
		return in_array($action, $this->actions);
	}
	
	public function merge(Privilage $priv) {
		if($this->module_name != $priv->module_name)
			return false;
		$newActions = array_merge($this->actions, $priv->actions);
		$this->actions = $newActions;
		return true;
	}
	
	public function __toString() {
		return $this->module_name.": \n[".implode(", ", $this->actions)."]";
	}
}
