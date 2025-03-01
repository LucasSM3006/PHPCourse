<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit979516dc547d11013a107b4b09ec7083
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Framework\\' => 10,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Framework',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit979516dc547d11013a107b4b09ec7083::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit979516dc547d11013a107b4b09ec7083::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit979516dc547d11013a107b4b09ec7083::$classMap;

        }, null, ClassLoader::class);
    }
}
