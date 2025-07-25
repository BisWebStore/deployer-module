<?php

/**
 * @copyright Tim Bischoff - Software Developer
 * @link https://bisweb.de
 * @author Tim Bischoff - Software Developer <tim.bischoff@bisweb.de>
 */

declare(strict_types=1);

namespace BisWeb\Deployer\Core;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use OxidEsales\Eshop\Core\Registry;
use Psr\Log\LogLevel;

class BisWebDeployerLogger
{
    public function getLogger(): Logger
    {
        $logger = new Logger('biswebdeployerlogger');
        $logger->pushHandler(
            new StreamHandler(Registry::getConfig()->getLogsDir() . 'biswebdeployerlogger.log', LogLevel::INFO)
        );

        return $logger;
    }
}