<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7683afa073003e6f4470e79c51ea4d24
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

        spl_autoload_register(array('ComposerAutoloaderInit7683afa073003e6f4470e79c51ea4d24', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7683afa073003e6f4470e79c51ea4d24', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7683afa073003e6f4470e79c51ea4d24::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
