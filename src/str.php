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

namespace Castor\Str;

const TRIM_BOTH = 0;
const TRIM_LEFT = 1;
const TRIM_RIGHT = 2;

/**
 * Returns the position of $searched in $subject.
 *
 * If $searched is not found, then -1 is returned.
 */
function index(string $subject, string $searched): int
{
    $pos = \strpos($subject, $searched);
    if (!is_int($pos)) {
        return -1;
    }

    return $pos;
}

function contains(string $subject, string $containing): bool
{
    return \str_contains($subject, $containing);
}

function startsWith(string $subject, string $starting): bool
{
    return \str_starts_with($subject, $starting);
}

function endsWith(string $subject, string $ending): bool
{
    return \str_ends_with($subject, $ending);
}

function trim(string $subject, string $chars, int $mode = TRIM_BOTH): string
{
    if (TRIM_BOTH === $mode) {
        return \trim($subject, $chars);
    }
    if (TRIM_LEFT === $mode) {
        return \ltrim($subject, $chars);
    }
    if (TRIM_RIGHT === $mode) {
        return \rtrim($subject, $chars);
    }

    return $subject;
}

/**
 * @return string[]
 */
function matches(string $subject, string $pattern): array
{
    $matches = [];
    preg_match($pattern, $subject, $matches);

    return $matches;
}

function toCapital(string $subject, string $separators = " \t\r\n\f\v"): string
{
    return \ucwords($subject, $separators);
}

function toUpper(string $subject): string
{
    return \strtoupper($subject);
}

function toLower(string $subject): string
{
    return \strtolower($subject);
}

/**
 * Replaces $search with $replacement on the $subject.
 */
function replace(string $subject, string $search, string $replacement): string
{
    return \str_replace($search, $replacement, $subject);
}

/**
 * Slices a string.
 */
function slice(string $subject, int $offset, int $length = null): string
{
    $sub = \substr($subject, $offset, $length ?? 0);
    if (!is_string($sub)) {
        return '';
    }

    return $sub;
}

/**
 * Returns the length in bytes of a string.
 *
 * This function will count the bytes of multibyte strings. If you need to count
 * the characters of a string, use `Castor\Unicode\Utf8\runeCount`.
 *
 * @deprecated To be removed in 1.0.0. Use Str\len instead.
 */
function length(string $subject): int
{
    return \strlen($subject);
}

/**
 * Returns the length in bytes of a string.
 *
 * This function will count the bytes of multibyte strings. If you need to count
 * the characters of a string, use `Castor\Unicode\Utf8\runeCount`.
 */
function len(string $subject): int
{
    return \strlen($subject);
}

/**
 * Splits the $subject string in all $separator occurrences.
 *
 * An optional $limit argument can be provided to specify the maximum parts to
 * split.
 *
 * If $limit is negative, then all parts are returned except those minus $limit
 * size.
 *
 * If $limit is zero, it means there is no limit. This is the default behaviour.
 *
 * @return string[] The split parts
 */
function split(string $subject, string $separator, int $limit = 0): array
{
    if (0 === $limit) {
        return \explode($separator, $subject);
    }

    return \explode($separator, $subject, $limit);
}

/**
 * Joins a collection of $strings using a $separator.
 *
 * @param string ...$strings
 */
function join(string $separator, string ...$strings): string
{
    return \implode($separator, $strings);
}

/**
 * Creates a string out of a $template passing some $parts.
 *
 * Syntax for the $template placeholders can be found in the PHP sprintf function
 * documentation.
 *
 * @see https://www.php.net/manual/en/function.sprintf.php
 *
 * @param mixed ...$parts
 */
function printf(string $template, ...$parts): string
{
    return \sprintf($template, ...$parts);
}
