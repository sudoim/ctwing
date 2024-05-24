<?php

namespace Sudoim\CTWing;

/**
 * @method static \Sudoim\CTWing\Aep\Application Aep(array $config)
 * @method static \Sudoim\CTWing\IoT\Application IoT(array $config)
 */
class Factory
{
    public static function make($name, array $config)
    {
        $application = "\\Sudoim\\CTWing\\{$name}\\Application";

        return new $application($config);
    }
    
    public static function __callStatic(string $name, array $arguments)
    {
        return self::make($name, ...$arguments);
    }
}