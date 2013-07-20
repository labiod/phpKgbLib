<?php
class Timer {
	
	// command constants
    const CMD_START = 'start';
    const CMD_STOP = 'end';
    
	//Ilość microsekund w sekundzie
	const USECDIV = 1000000;
	const MSECDIV = 1000;
	
	//format daty
	const SECONDS = 0;
    const MILLISECONDS = 1;
    const MICROSECONDS = 2;
	
    private static $_running = false;
    private static $_queue = array();
    
	private static function microtime_float() {
	    list($usec, $sec) = explode(" ", microtime(true));
	    return ((float)$usec + (float)$sec);
	}
	
	private static function _pushTime($option) {
		$mt = microtime();
		if($option == self::CMD_START) {
			if(self::$_running === true) {
				trigger_error("Timer has already been stopped/paused or has not yet been started", E_USER_NOTICE);
				return;
			}
			self::$_running = true;
		} else if($option == self::CMD_STOP) {
			if(self::$_running === false) {
				trigger_error("Timer has already been started", E_USER_NOTICE);
				return;
			}
			self::$_running = false;
		} else {
			trigger_error('Invalid command specified: '.$option, E_USER_ERROR);
		}
		
		// recapture the time as close to the end of the function as possible
        if ($option === self::CMD_START) {
            $mt = microtime();
        }
        
        list($usec, $sec) = explode(' ', $mt);
 
        // typecast them to the required types
        $sec = (int) $sec;
        $usec = (float) $usec;
        $usec = (int) ($usec * self::USECDIV);
 
        // create the array
        $time = array(
        	'sec'   => $sec,
            'usec'  => $usec,
        );
        
		// add a time entry depending on the command
        if ($option == self::CMD_START) {
            array_push(self::$_queue, $time);
 
        } else if ($option == self::CMD_STOP) {
        	$count = count(self::$_queue);
            $array = &self::$_queue[$count - 1];
            $array["sec"] = $time["sec"] -  $array["sec"];
            $array["usec"] = $time["usec"] -  $array["usec"];
        }
	}
	
	public static function start() {
		self::_pushTime(self::CMD_START);
	}
	
	public static function stop() {
		
		self::_pushTime(self::CMD_STOP);
	}
	
	public static function getLast($format = self::SECONDS) {
		$time = array_pop(self::$_queue);
		$sec = $time['sec'];
		$usec = $time['usec'];
		if($format == self::SECONDS) {
			$ret = ($sec + $usec / self::USECDIV) ." s";
		} else if($format == self::MICROSECONDS) {
			$ret = ($sec * self::USECDIV + $usec) ." us";
		} else {
			$ret = ($sec * self::MSECDIV + $usec / self::MSECDIV) ." ms";
		}
		return $ret;
	}
}