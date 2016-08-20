<?php

use Zend\Expressive\ConfigManager\ConfigManager;

/**
 * Use Fully Qualified Namespace to enable the expressive configuration
 */
$modules = [
    Zend\Expressive\ConfigProvider::class, // Minimal Components
    Zend\Component\ConfigProvider::class, // Zend Components
    App\ConfigProvider::class, //Application Settings
    //Append module namespace here
];
return (new ConfigManager($modules))->getMergedConfig();
