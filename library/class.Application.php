<?php
require_once 'class.BasicApplication.php';
require_once 'http/class.Request.php';
require_once 'http/class.Response.php';
require_once 'http/class.HttpSession.php';
require_once 'models/class.DBConnection.php';
require_once 'models/class.Table.php';
class Application extends BasicApplication {
	public function dispatch() {
		$url = $this->url;
		if($url == "" || $url == "/") {
			$url = "index";
		}
		$attr = explode("/",$url);
		$flink = new Table("friendly_links");
		$result = $flink->fetchAll("link = '".$url."'");
		if($result->isNull()) {
			if(count($attr) == 1)
				$attr[1] = "index";
			$module = $attr[0];
			if(trim($attr[1]) == "admin") {
				$controller = "Admin";
				if(!isset($attr[2]) || trim($attr[2]) == "")
					$action = "index";
				else
					$action = $attr[2];
					$i = 3;				
			} else {
				if(trim($attr[1]) == "")
					$action = "index";
				else
					$action = $attr[1];
				$controller = "";	
				$i = 2;
			}
			$tab = $this->getAppParams($attr, $i);						
		} else {
			$result = $result->getData();
			$module = $result[0]['module'];
			$controller = ($result[0]['type'] != "Index" ) ? $result[0]['type'] : "";
			$action = trim($result[0]['action']) == "" ? "index" : $result[0]['action'];
			$tab = $this->getAppParams(explode("/", $result[0]["params"])); 
		}	
        ApplicationFilter::clearRequest();
		if(isset($tab))
			$request = new Request($tab);
		else 
			$request = new Request();
		$this->_module = $module;
		$tmp = $module;
		$tmp[0] = strtoupper($tmp[0]);
		$controller .= $tmp."Controller";
		$this->controller = new $controller($request);
		$this->_request = $request;
		$this->_action = $action;
		$this->controller->setUrl($this->url);
		$this->controller->dispatch($this->_action, $this->_module);
	}
	public static function loadComponent($componentName) {
		$newComponent = Component::factory($componentName);
        $tmp = func_get_args();
        $params = array_slice($tmp, 1);
        if(sizeof($params) > 0) {
            return call_user_func_array(array($newComponent, "show"), $params);
            //return call_user_method("show", $newComponent, $params);
        }
		return $newComponent->show();
	}
}