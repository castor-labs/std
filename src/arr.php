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

namespace Castor\Arr;

use InvalidArgumentException;
use Traversable;

/**
 * Splits an array into chunks.
 *
 * @param array $array The array to split
 * @param int   $size  The size of the chunk
 *
 * @return list<array<int|string,mixed>>
 */
function chunk(array $array, int $size): array
{
    return \array_chunk($array, $size);
}

/**
 * Creates an array by using one array for keys and another for its values.
 *
 * Illegal values for keys will be casted to string.
 *
 * @throws InvalidArgumentException if the array lengths aren't equal
 */
function combine(array $keys, array $values): array
{
    $result = @\array_combine($keys, $values);
    if (is_array($result)) {
        return $result;
    }

    throw new InvalidArgumentException('Array for $keys and $values must be of the same length');
}

/**
 * Sorts an array by their element values.
 *
 * Optionally you can pass a comparator function.
 *
 * @param null|callable(mixed):int $comparator
 */
function sort(array $array, callable $comparator = null): array
{
    $array = values($array);
    if (null !== $comparator) {
        \usort($array, $comparator);
    } else {
        \sort($array);
    }

    return $array;
}

/**
 * @param array<int|string,mixed> $array
 *
 * @return list<mixed>
 */
function values(array $array): array
{
    return \array_values($array);
}

/**
 * @param array<int|string,mixed> $array
 *
 * @return list<mixed>
 */
function keys(array $array): array
{
    return \array_keys($array);
}

/**
 * Merges two or more arrays into one.
 *
 * @param array ...$arrays
 */
function merge(array ...$arrays): array
{
    return \array_merge(...$arrays);
}

/**
 * Returns the number of elements in an array.
 */
function len(array $array): int
{
    return \count($array);
}

/**
 * @param array<int,mixed> $array
 * @param mixed            $element
 */
function has(array $array, $element): bool
{
    return \in_array($element, $array, true);
}

/**
 * @param array<int,mixed> $array
 */
function hasIndex(array $array, int $index): bool
{
    return \array_key_exists($index, $array);
}

/**
 * Returns the last index of an array.
 *
 * @param array<int,mixed> $array
 *
 * @throws InvalidArgumentException if the array is not an indexed array
 */
function lastIndex(array $array): int
{
    $key = \array_key_last($array);
    if (is_int($key)) {
        return $key;
    }

    throw new InvalidArgumentException('The $array must be an indexed array');
}

/**
 * Returns the uniques values from an array.
 *
 * @param array<int,mixed> $array
 *
 * @return array<int,mixed>
 */
function unique(array $array): array
{
    return \array_unique($array);
}

/**
 * @template T
 *
 * @param array<int,T> $array
 *
 * @return array<int,T>
 */
function reverse(array $array): array
{
    return \array_reverse($array);
}

/**
 * @psalm-template T
 *
 * @param list<T>                   $array
 * @param callable(T, integer):bool $callback
 *
 * @return list<T>
 */
function filter(array $array, callable $callback): array
{
    $filtered = [];
    foreach ($array as $key => $value) {
        if (true === $callback($value, $key)) {
            $filtered[] = $value;
        }
    }

    return $filtered;
}

/**
 * @psalm-template T
 * @psalm-param array<int,T> $array
 * @psalm-param callable(T, int):mixed $callback
 *
 * @return array<int,mixed>
 */
function map(array $array, callable $callback): array
{
    $mapped = [];
    foreach ($array as $key => $value) {
        $mapped[] = $callback($value, $key);
    }

    return $mapped;
}

/**
 * @template T
 *
 * @param array<int,mixed>     $array
 * @param callable(T, mixed):T $reducer
 * @param mixed                $initial
 *
 * @return T
 */
function reduce(array $array, callable $reducer, $initial = null)
{
    return \array_reduce($array, $reducer, $initial);
}

function fromIter(Traversable $iter): array
{
    return \iterator_to_array($iter);
}
