<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbbb2151390bec06491f53201cd9a6df0
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Core\\' => 5,
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Models',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbbb2151390bec06491f53201cd9a6df0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbbb2151390bec06491f53201cd9a6df0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
