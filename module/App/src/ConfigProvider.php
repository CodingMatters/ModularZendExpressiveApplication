<?php

/**
 * The MIT License
 *
 * Copyright (c) 2016, Coding Matters, Inc. (Gab Amba <gamba@gabbydgab.com>)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace App;

final class ConfigProvider
{
    public function __invoke()
    {
        return [
            "routes"                => $this->getRouteConfig(),
            "dependencies"          => $this->getServiceConfig(),
            "templates"             => $this->getViewConfig(),

            // Additional Configuration
            "view_helpers"          => $this->getViewHelperConfig(),
            "navigation"            => $this->getNavigationConfig()
        ];
    }

    /**
     * Return routes mapping for this module.
     *
     * @return array
     */
    public function getRouteConfig()
    {
        return [
            [
                'name' => 'home',
                'path' => '/',
                'middleware' => Action\HomePageAction::class,
                'allowed_methods' => ['GET'],
            ],
            [
                'name' => 'api.ping',
                'path' => '/api/ping',
                'middleware' => Action\PingAction::class,
                'allowed_methods' => ['GET'],
            ]
        ];
    }

    /**
     * Return dependencies mapping for this module.
     * We recommend using fully-qualified class names whenever possible as service names.
     *
     * @return array
     */
    public function getServiceConfig()
    {
        return [
            // Use 'invokables' for constructor-less services,
            // or services that do not require arguments to the constructor.
            //
            // Map a service name to the class name.
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            'invokables'    => [
                // Sample Middleware Action
                App\Action\PingAction::class => App\Action\PingAction::class,
            ],

            // Use 'factories' for services provided by callbacks/factory classes.
            'factories'     => [
                // Sample Middleware Pages
                Action\HomePageAction::class => Action\HomePageFactory::class,
            ]
        ];
    }

    /**
     * Return templates mapping for this module.
     *
     * @return array
     */
    public function getViewConfig()
    {
        return [
            'layout' => 'layout/default',
            'map' => [
                'layout/default' => __DIR__ . '/../templates/layout/default.phtml',
                'error/error'    => __DIR__ . '/../templates/error/error.phtml',
                'error/404'      => __DIR__ . '/../templates/error/404.phtml',
            ],
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'layout' => [__DIR__ . '/../templates/layout'],
                'error'  => [__DIR__ . '/../templates/error'],
            ]
        ];
    }

    /**
     * Return view helpers configuration for this module.
     *
     * @return array
     */
    public function getViewHelperConfig()
    {
        return [
            'invokables'    => [],
            'factories'     => []
        ];
    }

    /**
     * Return navigation mapping for this module.
     *
     * @return array
     */
    public function getNavigationConfig()
    {
        return [
            'default' => []
        ];
    }
}
