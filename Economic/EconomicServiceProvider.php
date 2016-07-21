<?php
/**
 * This file is part of Lenius xxx, a PHP
 * package to provide a Service Provider and Facade for
 * the Lenius\laravel-economic package.
 *
 * Copyright (c) 2016 Lenius.
 * http://github.com/lenius/laravel-economic
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package lenius/laravel-economic
 * @author Carsten <carsten@lenius.dk>
 * @copyright 2016 Lenius.
 * @version dev
 * @link http://github.com/lenius/laravel-economic
 *
 */
namespace Economic;

use Economic\API\Client;
use Economic\API\Request;
use Illuminate\Foundation\AliasLoader;

class EconomicServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('economic', function () {
            $client = new Client('demo', 'demo');
            return new Request($client);
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting(function () {
        
            $loader = AliasLoader::getInstance();
            $loader->alias('Economic', 'Economic\Facade');
        });
    }
}
