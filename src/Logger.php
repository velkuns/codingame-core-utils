<?php

/*
 * Copyright (c) Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Velkuns\Codingame\Core\Utils;

/**
 * Class Logger
 *
 * @author Romain Cottard
 */
final class Logger
{
    /**
     * @param string $string
     * @param mixed $context
     * @return void
     */
    public function debug(string $string, $context = null): void
    {
        $this->write(__FUNCTION__, $string, $context);
    }

    /**
     * @param string $string
     * @param mixed $context
     * @return void
     */
    public function info(string $string, $context = null): void
    {
        $this->write(__FUNCTION__, $string, $context);
    }

    /**
     * @param string $string
     * @param mixed $context
     * @return void
     */
    public function error(string $string, $context = null): void
    {
        $this->write(__FUNCTION__, $string, $context);
    }

    /**
     * @param string $string
     * @return void
     */
    public function log(string $string): void
    {
        error_log($string);
    }

    /**
     * @param string $type
     * @param string $string
     * @param mixed $context
     * @return void
     */
    private function write(string $type, string $string, $context = null): void
    {
        $log = '[' . strtoupper($type) . '] ' . $string;

        if (!empty($context)) {
            $log .= "\nContext: " . var_export($context, true) . "\n";
        }

        $this->log($log);
    }
}
