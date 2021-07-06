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

namespace Castor;

use PHPUnit\Framework\TestCase;
use ValueError;

/**
 * Class ArrayFunctionsTest.
 *
 * @internal
 * @coversNothing
 */
class ArrayFunctionsTest extends TestCase
{
    public function testItChunks(): void
    {
        $chunked = Arr\chunk(['Tommy', 'Bobby', 'Pete', 'Laura', 'Lydia'], 2);
        self::assertCount(3, $chunked);
        self::assertCount(2, $chunked[0]);
        self::assertCount(2, $chunked[1]);
        self::assertCount(1, $chunked[2]);
    }

    public function testItCombines(): void
    {
        $combined = Arr\combine(['name', 'email'], ['Pete', 'pete@example.com']);
        self::assertArrayHasKey('name', $combined);
        self::assertArrayHasKey('email', $combined);
        self::assertSame('Pete', $combined['name']);
        self::assertSame('pete@example.com', $combined['email']);
    }

    public function testItFailsToCombine(): void
    {
        $this->expectException(ValueError::class);
        Arr\combine(['name'], ['Pete', 'pete@example.com']);
    }

    public function testItSorts(): void
    {
        $sorted = Arr\sort([4, 2, 1, 5, 3]);
        self::assertSame(1, $sorted[0]);
        self::assertSame(2, $sorted[1]);
        self::assertSame(3, $sorted[2]);
        self::assertSame(4, $sorted[3]);
        self::assertSame(5, $sorted[4]);
    }

    public function testItGetsKeys(): void
    {
        $keys = Arr\keys(['name' => 'Peter', 'email' => 'pete@example.com']);
        self::assertCount(2, $keys);
        self::assertSame('name', $keys[0]);
        self::assertSame('email', $keys[1]);
    }

    public function testItGetsValues(): void
    {
        $values = Arr\values(['name' => 'Peter', 'email' => 'pete@example.com']);
        self::assertCount(2, $values);
        self::assertSame('Peter', $values[0]);
        self::assertSame('pete@example.com', $values[1]);
    }

    public function testItCountsTheLength(): void
    {
        $len = Arr\len(['Apple', 'Banana', 'Grape', 'Lemon']);
        self::assertSame(4, $len);
    }
}
