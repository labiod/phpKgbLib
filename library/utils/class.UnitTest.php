<?php
class UnitTest {
	private static $currTest = array();
	private static $_file = "";
	private static $_line = 0;
	private static $_function = "";
	private static $_class = "";
	private static $_testFailed = 0;
	private static $_testPassed = 0;
	private static $_view = "";
	private static $_currMethod = "";
	private static $_currMPassed = true;
	public static function startTest() {
		assert_options(ASSERT_ACTIVE, 1);
		assert_options(ASSERT_WARNING, 0);
		assert_options(ASSERT_QUIET_EVAL, 1);
		// ustawianie funkcji zwrotnej
		assert_options(ASSERT_CALLBACK, 'UnitTest::assert_handler');
		foreach (self::$currTest as $test) {
			self::$_class = $test["class"];
			$methods = get_class_methods($test["class"]);
			$obj = new $test["class"]();
			foreach ($methods as $method) {
				if(preg_match("/.*Test$/", $method)) {
					$obj->$method();
					if(self::$_currMPassed != true) {
						self::$_testFailed++;
						self::$_view .= "Method: ".$method." <span style=\"color: red; font-weight: bold; \" >FAILED</span> <hr />".self::$_currMethod ."<hr />";
					} else 	{
						self::$_testPassed++;
						self::$_view .= "Method: ".$method." <span style=\"color: green; font-weight: bold; \" >PASSED</span> <hr />".self::$_currMethod ."<hr />";
					}
						
					
					self::$_currMethod = "";
					self::$_currMPassed = true;
				}
				
					
			}
		}
		self::$_view .= "<span style=\"color: green; font-weight: bold; \" >Tests passed = ".self::$_testPassed."</span>, <span style=\"color: red; font-weight: bold; \" >Tests failed = ".self::$_testFailed."</span>, 
			<span style=\"color: blue; font-weight: bold; \" >All tests = ".(self::$_testPassed+self::$_testFailed)."</span><br />\n".self::$_view;
		echo self::$_view;
	}
	//utworzenie funkcji zwrotnej dla assert, uruchamiana w przypadku niepowodzenia
	public static function assert_handler($file, $line, $code) {
		//die();
	}
	
	//funkcja assertEquals porównuje parametry $given i $expected i jeśli nie są one takie same wyświetla błąd
	public static function assertEquals($given, $expected) {
		$trace = debug_backtrace();
		self::$_file = $trace[0]["file"];
		self::$_line = $trace[0]["line"];
		self::$_function = $trace[1]["function"];
		if($given == $expected) {
			self::$_currMethod .= "<span style=\"color: green; font-weight: bold; \" >PASSED</span>
			<ul>
			<li>class: ".self::$_class."</li>
	        <li>file: ".self::$_file."</li>
	        <li>line: <span style=\"color: green; font-weight: bold; \" >".self::$_line."</span></li>
	        </ul>";
		} else {
			self::$_currMPassed = false;
			self::$_currMethod .= "<span style=\"color: red; font-weight: bold; \" >FAILED</span>
			<ul>
			<li>class: ".self::$_class."</li>
	        <li>file: ".self::$_file."</li>
	        <li>line: <span style=\"color: red; font-weight: bold; \" >".self::$_line."</span></li>
	        </ul>";
		}
	}
	
	public static function addToTestedStack($class) {
		self::$currTest[]["class"] = $class;
	}

}


