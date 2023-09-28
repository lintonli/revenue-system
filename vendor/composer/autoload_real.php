<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit8041a92d33ce5c612fd1a8b0993dfed4
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit8041a92d33ce5c612fd1a8b0993dfed4', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit8041a92d33ce5c612fd1a8b0993dfed4', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit8041a92d33ce5c612fd1a8b0993dfed4::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}