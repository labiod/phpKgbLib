<?php
abstract class View {
    /**
     * @var Context
     */
    private $_context;
	protected $_parameters = array ();

    /**
     * @param Context $context
     */
    public function __construct(Context $context) {
        $this->_context = $context;
    }
	public function __get($name) {
		if(isset($this->_parameters[$name]))
			return $this->_parameters[$name];
		return null;//Settings::getParam("site", "title");
	}

    protected abstract function onDraw();
}