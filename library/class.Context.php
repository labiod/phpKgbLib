<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08/02/2015
 * Time: 15:25
 */

class Context {
    /**
     * @var View
     */
    private $_mainView;
    private $_fileName;
    private $_table = array ();

    /**
     * @param $fileName
     */
    public function __construct($fileName) {
        $this->_fileName = $fileName;
    }

    public function getParam($namespace, $name, $default = null) {
        if (count ( $this->_table ) == 0)
            self::loadConfiguration ( $this->_fileName );
        if(array_key_exists($namespace . "." . $name, $this->_table))
            return $this->_table [$namespace . "." . $name];
        else
            return $default;
    }

    /**
     *
     * Metoda ładuje konfiguracje aplikacji w pliku, podanego w $path
     * jesli dany plik nie istnieje wyrzuca wyjątek
     *
     * @param string $path
     * @throws FileNotFound
     * @version 0.0.1
     */
    private function loadConfiguration() {
        if (is_file ( $this->_fileName )) {
            $time = filemtime ( $this->_fileName );
            if (is_file ( "cache/" . $time . "_" . $this->_fileName . ".php" )) {
                require_once "cache/" . $time . "_" . $this->_fileName . ".php";
                $this->_table = $table;
            } else {
                $file = fopen ( $this->_fileName, "r" );
                $stable = "<?php\n ";
                while ( $line = fgets ( $file ) ) {
                    if (substr ( $line, 0, 2 ) == "//" || preg_match ( "/^[ \s]*$/", $line ))
                        continue;
                    $tmp = explode ( "=", $line );
                    $tmp [1] = str_replace ( "\"", "", $tmp [1] );
                    $tmp [1] = str_replace ( "'", "", $tmp [1] );
                    $stable .= "\$table['" . trim ( $tmp [0] ) . "'] = '" . trim ( $tmp [1] ) . "';\n";
                    $this->_table [trim ( $tmp [0] )] = trim ( $tmp [1] );
                }
                $stable .= "?>";
                fclose ( $file );
                $newCache = fopen ( "cache/" . $time . "_" . $this->_fileName . ".php", "x" );
                fwrite ( $newCache, $stable );
                fclose ( $newCache );
            }
        } else {
            throw new FileNotFound ( "Nie znaleziono żądanego pliku: " . $this->_fileName );
        }
    }
} 