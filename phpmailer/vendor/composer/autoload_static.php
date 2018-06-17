<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4efa8bd3fd9367971001b46336c7e15
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4efa8bd3fd9367971001b46336c7e15::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4efa8bd3fd9367971001b46336c7e15::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}