<?php

namespace Core\Config;

class Config
{
    /**
     * The default configuration folder path
     *
     * @var string
     */
    private string $configFolder = __DIR__ . "/../../configs/" ;

    /**
     * @param string|null $configFolder
     */
    public function __construct(?string $configFolder = null)
    {
        $this->configFolder = $configFolder ?: $this->configFolder;
    }

    /**
     * Find config file base on config index and return file contents
     *
     * @param string $configIndex
     * @return array|string
     */
    public function get(string $configIndex): array|string
    {
        $explodedIndex = explode('.' , $configIndex);

        $configArray = $this->getConfigArray($explodedIndex[0]);
        return str_contains($configIndex , '.')
            ? (array_key_exists($explodedIndex[1] , $configArray) ? $configArray[$explodedIndex[1]] : [] )
            : $configArray;
    }

    /**
     * Get config array with file name in default or selected directory
     *
     * @param string $fileName
     * @return array
     */
    private function getConfigArray(string $fileName): array
    {
        $filePath = $this->configFolder . $fileName . '.php';
        $arrayConfig =  file_exists($filePath)
            ? include($filePath)
            : [];
        return is_array($arrayConfig) ? $arrayConfig : [];
    }

    /**
     * Find config file and return array statically
     *
     * @param string $configIndex
     * @return array|string
     */
    public static function find(string $configIndex): array|string
    {
        $instance = new self();
        return $instance->get($configIndex);
    }

}
