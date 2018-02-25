<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit104183c04fa232809810d0e3680367a1
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit104183c04fa232809810d0e3680367a1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit104183c04fa232809810d0e3680367a1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
