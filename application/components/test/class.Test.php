<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 03/04/2015
 * Time: 21:33
 */

class Test extends Component {

    public function show()
    {
        $viewFile = "application/components/test/view/test.phtml";
        $cacheFolder = "application/components/test/view/cache";
        $cFile = $this->cacheFile($viewFile, $cacheFolder);
        $this->test = "Hello";
        include $cFile;
        echo $fileContent;
    }

    public function loadFile($file) {
        $handler = fopen($file, "r");
        $content = "";
        while (!feof($handler)) {

            $line_of_text = fgets($handler);
            $content .= $line_of_text;

        }
//        $content .= "\"";

        fclose($handler);
//        ob_start();
//        include "view/test.phtml";
//        $content = ob_get_contents();
//        $content = str_replace("\$", "$", $content);
//        ob_end_clean();
        return $content;
    }

    private function cacheFile($filePath, $cacheFolder) {
        $time = filemtime ( $filePath );
        $fileName = basename($filePath);
        $cacheFile = $cacheFolder . "/" . $time . "_" . $fileName . ".php";
        if (!is_file ( $cacheFile )) {
            if(!is_dir($cacheFolder)) {
                mkdir($cacheFolder);
            }
            $sTable = array();
            $content = $this->loadFile($filePath);
            $result = "";
            $i = 0;
            $pattern = "/{\\$([a-zA-Z][a-zA-z_0-9]*):(['\"]?[a-zA-Z _0-9]+['\"]?)}/";
            $replacement = "<?php $\\1=\\2; ?>";
            preg_match_all($pattern, $content, $result);
            for($i = 0; $i < count($result[0]); ++$i) {
               $sTable[$result[1][$i]] = $result[2][$i];
            }
            echo preg_replace($pattern, $replacement, $content);
//            echo $content;
            print_r($sTable);
            die();
            $content = "<?php\n \$fileContent =<<<EOD
".$content."
EOD;
?>";
            $newCache = fopen ( $cacheFile, "x" );
            fwrite ( $newCache, $content );
            fclose ( $newCache );
        }
        return $cacheFolder . "/" . $time . "_" . $fileName . ".php";
    }
}