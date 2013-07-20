<?php
class RewriteApplication extends BasicApplication {
	public function dispatch() {
		$url = $this->url;
		$attr = explode("/",$url);
		$flink = new Table("friendly_link");
		//echo $url; die();
		$result = $flink->fetchAll("link = '".$url."'");
		if($result->isNull()) {
			if(trim($url) == "")
				$url = "index/index";
			$attr = explode("/",$url);
			if(trim($attr[0]) == "admin") {
				if(isset($attr[1])) {
					if ($this->_session->isSetAttr("logged")) {
						$controller = $attr[1];
					} else {
						$controller = "auth";
					}
					if(isset($attr[2]))
						$action = $attr[2];
					else 
						$action = "aindex";
					if(count($attr) > 2) {
						$tab = array();
						$i = 3;
						while($i <  count($attr)) {
							if($i+1 >= count($attr))
								break;
							$tab[$attr[$i++]] = $attr[$i++]; 
						}
					}
					
				} else {
					$controller = "auth";
					$action = "aindex";
				}
					
			} else {
				$controller = $attr[0];
				if(isset($attr[1]))
					$action = $attr[1];
				else 
					$action = "index";
				if(count($attr) > 1) {
					$tab = array();
					$i = 2;
					while($i <  count($attr)) {
						if($i+1 >= count($attr))
							break;
						$tab[$attr[$i++]] = $attr[$i++]; 
					}
				}
			}		
		} else {
			$result = $result->toArray();
			$controller = $result[0]['module'];
			$action = $result[0]['action'];
			$tab['id'] = $result[0]['module_id'];
			$tab['lang'] = $result[0]['lang'];
		}
		if(isset($tab))
			$request = new Request($tab);
		else 
			$request = new Request();
		$this->_module = $controller;
		$controller[0] = strtoupper($controller[0]);
		
		$controller .= "Controller";
		$this->controller = new $controller();
		$this->controller->setRequest($request);
		$this->_request = $request;
		$this->_action = $action;
		$this->controller->dispatch($this->_action, $this->_module);
	}
}
