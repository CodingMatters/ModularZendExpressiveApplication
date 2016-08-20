<?php

use Zend\Expressive\ConfigManager\ConfigManager;

/**
 * Use Fully Qualified Namespace to enable the expressive configuration
 */
$modules = [
    Zend\Expressive\ConfigProvider::class, //Application Settings
    App\ConfigProvider::class, //Application Settings
    //Append module namespace here
];
return (new ConfigManager($modules))->getMergedConfig();
