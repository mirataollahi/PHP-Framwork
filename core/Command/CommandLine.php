<?php

namespace Core\Command;

class CommandLine
{

    /**
     * Show successful text message in command line
     *
     * @param string $text
     * @param bool $showLineBorder
     * @return void
     */
    public static function success(string $text = '' , bool $showLineBorder = false): void
    {
        $successMessage = "\033[32m {$text}\033[0m\n";
        self::message($successMessage , $showLineBorder);
    }

    /**
     * Show error message in command line mode
     * @param string $text
     * @param bool $showLineBorder
     * @return void
     */
    public static function error(string $text = '' , bool $showLineBorder = false ): void
    {
        $errorMessage = "\033[31m {$text}\033[0m\n";
        self::message($errorMessage , $showLineBorder);
    }

    /**
     * Print info text message in command line
     *
     * @param string $text
     * @param bool $showLineBorder
     * @return void
     */
    public static function info(string $text = '' , bool $showLineBorder = false): void
    {
        $errorMessage = "\033[34m {$text}\033[0m\n";
        self::message($errorMessage , $showLineBorder);
    }

    /**
     * Show warning message in command line
     *
     * @param string $text String text to print in cli mode
     * @param bool $showLineBorder
     * @return void
     */
    public static function warning(string $text = '' , bool $showLineBorder = false): void
    {
        $errorMessage = "\033[33m {$text}\033[0m\n";
        self::message($errorMessage , $showLineBorder);
    }

    /**
     * Show line border in command line
     *
     * @param int $length
     * @param string $borderChar
     * @return void
     */
    public static function showLineBorder(int $length = 50, string $borderChar = "-"): void
    {
        $border = str_repeat($borderChar, $length);
        echo $border . PHP_EOL;
    }

    /**
     * Print a message in command line mode
     *
     * @param string $message
     * @param bool $showLineBorder
     * @return void
     */
    public static function message(string $message , bool $showLineBorder = false): void
    {
        echo $message . PHP_EOL;
        if ($showLineBorder)
            self::showLineBorder();
        echo PHP_EOL;
    }

    /**
     * Pass lines and go to new line command line
     *
     * @param int $lineNumber
     * @return void
     */
    public static function passLines(int $lineNumber = 1): void
    {
        foreach (range(1 , $lineNumber) as $line)
            echo PHP_EOL;
    }

}