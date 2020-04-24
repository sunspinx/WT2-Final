<?php


class Asset
{
    private static $rootDir = "";

    /**
     * @param string $rootDir
     */
    public static function setRootDir($rootDir)
    {
        self::$rootDir = $rootDir;
    }

    public static function get($path) {
        return self::$rootDir . '/' . $path;
    }
}