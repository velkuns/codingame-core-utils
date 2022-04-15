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
 * Class Number
 *
 * @author Romain Cottard
 */
final class Number
{
    public function format(float $number, int $precision = 4, string $padChar = '0'): string
    {
        $number = (string) round($number, $precision);

        if (strpos($number, '.') === false) {
            $number .= '.0';
        }

        return str_pad($number, $precision + 2, $padChar);
    }
}
