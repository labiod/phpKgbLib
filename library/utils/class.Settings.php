<?php
class Settings {
	private static $tmpPath = "config.ini";
	private static $_table = array();
	/**
	 * 
	 * Metoda ładuje konfiguracje aplikacji w pliku, podanego w $path
	 * jesli dany plik nie istnieje wyrzuca wyjątek
	 * @param string $path
	 * @throws FileNotFound
	 * @version 0.0.1
	 */
	public static function loadConfiguration($path) {
		if(is_file($path)) {
			$time = filemtime($path);
			if(is_file("cache/".$time."_".$path.".php")) {
				require_once "cache/".$time."_".$path.".php";
				self::$_table = $table;
			} else {
				$file = fopen($path, "r");
				$stable = "<?php\n ";
				while($line = fgets($file)) {
					if(substr($line, 0, 2) == "//" || preg_match("/^[ \s]*$/", $line))
						continue;
					$tmp = explode("=", $line);
					$tmp[1] = str_replace("\"", "", $tmp[1]); 
					$tmp[1] = str_replace("'", "", $tmp[1]); 
					$stable .= "\$table['".trim($tmp[0])."'] = '".trim($tmp[1])."';\n";
					self::$_table[trim($tmp[0])] = trim($tmp[1]);
				}
				$stable .= "?>";
				fclose($file);
				$newCache = fopen("cache/".$time."_".$path.".php", "x");
				fwrite($newCache, $stable);
				fclose($newCache);
			}
			
		} else {
			throw new FileNotFound("Nie znaleziono żądanego pliku: ".$path);
		}
		
	}
	
	public static function getParam($namespace, $name) {
		if(count(self::$_table) == 0)
			self::loadConfiguration(self::$tmpPath);
		return self::$_table[$namespace.".".$name];
	}
}