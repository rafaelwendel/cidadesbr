<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc4fa1b8287ce919b9bef2a0dd4032ae6
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Slim\\' => 5,
        ),
        'R' => 
        array (
            'Respect\\' => 8,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Server\\' => 16,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/Slim',
        ),
        'Respect\\' => 
        array (
            0 => __DIR__ . '/..' . '/respect/relational/library/Respect',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Server\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-server-handler/src',
            1 => __DIR__ . '/..' . '/psr/http-server-middleware/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-factory/src',
            1 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'Respect\\Data' => 
            array (
                0 => __DIR__ . '/..' . '/respect/data/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc4fa1b8287ce919b9bef2a0dd4032ae6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc4fa1b8287ce919b9bef2a0dd4032ae6::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitc4fa1b8287ce919b9bef2a0dd4032ae6::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}