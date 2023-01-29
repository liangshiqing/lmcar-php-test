<?php

namespace App\Service;

use think\facade\Log;
use think\LogManager;

class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINK_LOG = 'thinkLog';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = \Logger::getLogger("Log");
        } elseif ($type == self::TYPE_THINK_LOG) {

            //使用最简单的工厂模式获取不同对象
            $config = [
                'default' => 'file',
                'channels' => [
                    'file' => [
                        'type' => 'file',
                        'path' => './logs/',
                    ],
                ],
            ];
            $this->logger = new LogManager();
            $this->logger->init($config);
        }
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}