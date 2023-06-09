<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitec3f00c03854a7ebf43a4f5f4aaa5a57
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitec3f00c03854a7ebf43a4f5f4aaa5a57::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitec3f00c03854a7ebf43a4f5f4aaa5a57::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitec3f00c03854a7ebf43a4f5f4aaa5a57::$classMap;

        }, null, ClassLoader::class);
    }
}
