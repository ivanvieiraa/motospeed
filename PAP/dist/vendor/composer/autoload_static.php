<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb3eef210d39f951b1842e8ec1ba599af
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb3eef210d39f951b1842e8ec1ba599af::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb3eef210d39f951b1842e8ec1ba599af::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb3eef210d39f951b1842e8ec1ba599af::$classMap;

        }, null, ClassLoader::class);
    }
}
