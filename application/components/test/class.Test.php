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
        $p = 4;
        $text = "Testowy";
        $content = $this->loadFile("application/components/test/view/test.phtml");
        $tt = "Test {$p}";
        $return =<<<"EOD"
        $content
        <div> $tt </div>
EOD;
//        echo $return;
    }

    public function loadFile($file) {
        $handler = fopen($file, "r");
        $content = "\"";
        while (!feof($handler)) {

            $line_of_text = fgets($handler);
            $content .= $line_of_text;

        }
        $content .= "\"";

        fclose($handler);
//        ob_start();
//        include "view/test.phtml";
//        $content = ob_get_contents();
//        $content = str_replace("\$", "$", $content);
//        ob_end_clean();
        return $content;
    }
}