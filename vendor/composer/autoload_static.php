<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit039e650149838f33472f0fe8f21b28d9
{
    public static $classMap = array (
        'IXPC\\main' => __DIR__ . '/../..' . '/classes/class-main.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit039e650149838f33472f0fe8f21b28d9::$classMap;

        }, null, ClassLoader::class);
    }
}
