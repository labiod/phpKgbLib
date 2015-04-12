<?php

/**
 * Created by Labiod
 * User: admin
 * Date: 08/04/2015
 * Time: 16:35
 */
class Log
{
    /**
     * @var Log
     */
    private static $sInstance = null;


    private $mQueue;
    /**
     * @param $context Context
     */
    private function __construct($context) {
        $this->mContext = $context;
        $this->mContext->setLogger($this);
        $this->mQueue = new Queue();
    }
    public static function d($context, $tag, $msg)
    {
        if(self::$sInstance == null) {
            self::$sInstance = new Log($context);
        }
        self::$sInstance->putToQueue(new LogMsg(LogMsg::DEBUG_TYPE, $tag, $msg));
    }

    private function putToQueue($logMsg) {
        $this->mQueue->addItem($logMsg);
    }

    public function publish() {
        include "view/log.phtml";
    }
}