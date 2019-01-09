<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1f84310a4e31fe1d064878bded0311f4
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Obs\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Obs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1f84310a4e31fe1d064878bded0311f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1f84310a4e31fe1d064878bded0311f4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
