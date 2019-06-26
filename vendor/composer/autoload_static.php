<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb4459af951c2913ae329bf70d31e741c
{
    public static $files = array (
        '971e0d6a54c5e2f4e20f8f6c0bacfd7f' => __DIR__ . '/../..' . '/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sunlong\\CaptchaLumen\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sunlong\\CaptchaLumen\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb4459af951c2913ae329bf70d31e741c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb4459af951c2913ae329bf70d31e741c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
