<?php


namespace Sammy1992\Haina;

use Sammy1992\Haina\Core\ServiceContainer;

/**
 * Class Application
 *
 * @property Auth\AccessToken $access_token
 */
class Application extends ServiceContainer
{
    protected $providers = [
        Auth\ServiceProvider::class,

        Base\ServiceProvider::class
    ];

    protected $defaultConfig = [
        'http' => [
            'timeout'  => 15.0,
            'base_uri' => 'https://api.haina.com'
        ]
    ];

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this['base'], $name], $arguments);
    }
}