<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 05/06/2015
 * Time: 21:45
 */
require_once "class.OptionItem.php";

class SimpleSelect extends Component {

    /**
     * @var $items array OptionItem
     */
    private $items;
    private $name;

    /**
     * @param $items OptionItem
     */
    public function __construct($name, $items) {
        $this->items = $items;
        $this->name = $name;
    }
    public function show()
    {
        ob_start();
        include "view/simple_select.phtml";
        $content = ob_get_contents();
        ob_end_clean();
        $content =<<<EOD
            {$content}
EOD;
        echo $content;
    }

    public function setSelectedOption($value)
    {
        foreach ($this->items as $item) {
            if($item->getValue() == $value) {
                $item->setSelected(true);
            }
        }

    }
}