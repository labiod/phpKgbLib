<?php
/**
 * Created by Labiod.
 * User: admin
 * Date: 08/04/2015
 * Time: 16:54
 */

class LogMsg {
    const DEBUG_TYPE = 1;
    const INFO_TYPE = 2;
    const ERROR_TYPE = 3;

    private $mMsg;
    private $mTag;
    private $mType;

    /**
     * @param int $type
     * @param string $tag
     * @param string $msg
     */
    public function __construct($type, $tag, $msg) {
        $this->mType = $type;
        $this->mMsg = $msg;
        $this->mTag = $tag;
    }

    public function getMessage() {
        $content = "<div";
        if($this->mType == LogMsg::DEBUG_TYPE) {
            $content .= " class='log_debug' >";
        } else if($this->mType == LogMsg::INFO_TYPE) {
            $content .= " class='log_info' >";
        } else {
            $content .= "class='log_error' >";
        }
        $content .= "<strong>" .$this->mTag . "</strong> : ".$this->mMsg."</div>";
        return $content;

    }
}