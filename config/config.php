<?php

use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

$config = new ConfigAggregator(
    [
        \Zend\Router\ConfigProvider::class,
        \Zend\Validator\ConfigProvider::class,
        \Zend\Navigation\ConfigProvider::class,
        \Zend\Expressive\ConfigProvider::class,
        \Zend\Component\ConfigProvider::class,
        \CodingMatters\ExpressiveWebHelper\ConfigProvider::class,
        \CodingMatters\ExpressiveErrorHandler\ConfigProvider::class,
        new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),
        new PhpFileProvider('config/development.config.php') // only override if development mode is ENABLED
    ],
    __DIR__ . '/../data/cache/application.config.php'
);

return $config->getMergedConfig();
