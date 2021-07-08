<?php

declare(strict_types=1);

/**
 * @project Castor Std
 * @link https://github.com/castor-labs/std
 * @package castor/std
 * @author Matias Navarro-Carter mnavarrocarter@gmail.com
 * @license MIT
 * @copyright 2021 CastorLabs Ltd
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Castor\Unicode\Utf8;

const ENCODING = 'UTF-8';

/**
 * Counts the characters (runes) in a UTF-8 string.
 */
function runeCount(string $string): int
{
    return mb_strlen($string, ENCODING);
}

/**
 * Creates a rune based on the specific code point.
 */
function rune(int $codePoint): string
{
    return mb_chr($codePoint, ENCODING);
}
