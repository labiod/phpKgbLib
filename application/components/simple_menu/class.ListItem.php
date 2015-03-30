<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29/03/2015
 * Time: 20:58
 */
class ListItem {
    private $_itemText;
    private $_id = "";
    private $_url;
    private $_className = "";

    /**
     *
     * @param string $itemText - Text display in li
     * @param string $url - default empty
     * @param string $id - element id
     * @param string $className - element className
     */
    public function __construct($itemText, $url = "", $id = "", $className = "")
    {
        $this->_itemText = $itemText;
        $this->_url = $url;
        $this->_id = $id;
        $this->_className = $className;
    }

    public function setClassName($className) {
        $this->_className = $className;
    }

    public function getClassName() {
        return $this->_className;
    }

    public function getText() {
        return $this->_itemText;
    }

    public function getId() {
        return $this->_id;
    }

    public function getUrl() {
        return $this->_url;
    }
}
