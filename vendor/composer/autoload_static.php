<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit039e650149838f33472f0fe8f21b28d9
{
    public static $classMap = array (
        'IXPC\\Endpoints' => __DIR__ . '/../..' . '/classes/class-endpoints.php',
        'IXPC\\Enqueue' => __DIR__ . '/../..' . '/classes/class-enqueue.php',
        'IXPC\\Front' => __DIR__ . '/../..' . '/classes/class-front.php',
        'IXPC\\Main' => __DIR__ . '/../..' . '/classes/class-main.php',
        'IXPC\\Rest' => __DIR__ . '/../..' . '/classes/class-rest.php',
        'IXPC\\Shortcodes' => __DIR__ . '/../..' . '/classes/class-shortcodes.php',
        'IXPC\\Templater' => __DIR__ . '/../..' . '/classes/class-templater.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit039e650149838f33472f0fe8f21b28d9::$classMap;

        }, null, ClassLoader::class);
    }
}
