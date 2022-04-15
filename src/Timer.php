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
 * Class Timer
 *
 * @author Romain Cottard
 */
final class Timer
{
    /** @var Logger logger */
    private $logger;

    /** @var array<string, float> $timers */
    private static $timers = [];

    /** @var array<string, array<float>> $stats */
    private static $stats  = [];

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param string $name
     * @return void
     */
    public function start(string $name = 'global'): void
    {
        self::$timers[$name] = -microtime(true);
    }

    /**
     * @param string $name
     * @return float
     */
    public function get(string $name = 'global'): float
    {
        return (self::$timers[$name] + microtime(true));
    }

    /**
     * @param string $name
     * @return void
     */
    public function save(string $name = 'global'): void
    {
        self::$stats[$name][] = (self::$timers[$name] + microtime(true));
    }

    /**
     * @param string $name
     * @param bool $inMillisecond
     * @return void
     */
    public function displayStat(string $name = 'global', bool $inMillisecond = true): void
    {
        $nb  = count(self::$stats[$name]);
        $avg = array_sum(self::$stats[$name]) / max($nb, 1);

        $modifier = 1;
        $unit     = 's';

        if ($inMillisecond) {
            $modifier = 1000;
            $unit     = 'ms';
        }

        $this->logger->debug('Time Average[' . $name . '|' .  $nb . ' calls]: ' . round($avg * $modifier, 4) . $unit);
    }

    /**
     * @param string $name
     * @param bool $inMillisecond
     * @return void
     */
    public function display(string $name = 'global', bool $inMillisecond = true): void
    {
        $modifier = 1;
        $unit     = 's';

        if ($inMillisecond) {
            $modifier = 1000;
            $unit     = 'ms';
        }

        $this->logger->debug('Time[' . $name . ']: ' . round(self::get($name) * $modifier, 4) . $unit);
    }
}
