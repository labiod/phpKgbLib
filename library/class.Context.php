<?php
/**
 * Created by Labiod
 * User: admin
 * Date: 08/02/2015
 * Time: 15:25
 */

class Context {
    /**
     * @var View
     */
    private $mMainView;
    private $mFileName;
    private $mTable = array ();
    /**
     * @var Log
     */
    private $mLogger;

    /**
     * @param $fileName
     */
    protected function __construct($fileName) {
        $this->mFileName = $fileName;
    }

    public function getParam($namespace, $name, $default = null) {
        if (count ( $this->mTable ) == 0)
            self::loadConfiguration ( $this->mFileName );
        if(array_key_exists($namespace . "." . $name, $this->mTable))
            return $this->mTable [$namespace . "." . $name];
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
        if (is_file ( $this->mFileName )) {
            $time = filemtime ( $this->mFileName );
            if (is_file ( "cache/" . $time . "_" . $this->mFileName . ".php" )) {
                require_once "cache/" . $time . "_" . $this->mFileName . ".php";
                $this->mTable = $table;
            } else {
                $file = fopen ( $this->mFileName, "r" );
                $stable = "<?php\n ";
                while ( $line = fgets ( $file ) ) {
                    if (substr ( $line, 0, 2 ) == "//" || preg_match ( "/^[ \s]*$/", $line ))
                        continue;
                    $tmp = explode ( "=", $line );
                    $tmp [1] = str_replace ( "\"", "", $tmp [1] );
                    $tmp [1] = str_replace ( "'", "", $tmp [1] );
                    $stable .= "\$table['" . trim ( $tmp [0] ) . "'] = '" . trim ( $tmp [1] ) . "';\n";
                    $this->mTable [trim ( $tmp [0] )] = trim ( $tmp [1] );
                }
                $stable .= "?>";
                fclose ( $file );
                $newCache = fopen ( "cache/" . $time . "_" . $this->mFileName . ".php", "x" );
                fwrite ( $newCache, $stable );
                fclose ( $newCache );
            }
        } else {
            throw new FileNotFound ( "Nie znaleziono żądanego pliku: " . $this->mFileName );
        }
    }

    /**
     * @param Log $logger
     */
    public function setLogger($logger)
    {
        $this->mLogger = $logger;
    }

    protected function showLogger() {
        if($this->mLogger != null) {
            $this->mLogger->publish();
        }
    }
} 