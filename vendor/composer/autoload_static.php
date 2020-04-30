<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcef34f8293572aff3637efc87b800909
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phpml\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phpml\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcef34f8293572aff3637efc87b800909::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcef34f8293572aff3637efc87b800909::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}