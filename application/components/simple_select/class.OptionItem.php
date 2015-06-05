<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 05/06/2015
 * Time: 21:56
 */

class OptionItem {
    private $title;
    private $value;
    private $selected;

    /**
     * @param mixed $selected
     */

    public function __construct($title, $value = "") {
        $this->title = $title;
        $this->value = $value != "" ? $value : $title;
    }

    public function getName() {
        return $this->name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getValue() {
        return $this->value;
    }

    public function getSelected() {
        return $this->selected;
    }
    public function setSelected($selected)
    {
        $this->selected = $selected;
    }
} 