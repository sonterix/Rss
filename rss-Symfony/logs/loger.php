<?php

require_once '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logInfo = new Logger('INFO');
$logInfo->pushHandler(new StreamHandler(__DIR__.'/log.info', Logger::INFO));

$logError = new Logger('ERROR');
$logError->pushHandler(new StreamHandler(__DIR__.'/log.error', Logger::ERROR));
