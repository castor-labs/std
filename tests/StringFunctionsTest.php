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

/**
 * Class StringFunctionsTest.
 *
 * @internal
 * @coversNothing
 */
class StringFunctionsTest extends TestCase
{
    public function testLength(): void
    {
        self::assertSame(5, Str\len('Hello'));
        self::assertSame(6, Str\len('世界'));
    }

    public function testItSplits(): void
    {
        $split = Str\split('hello world', ' ');
        self::assertCount(2, $split);
        self::assertSame('hello', $split[0]);
        self::assertSame('world', $split[1]);
    }

    public function testItSplitsWithLimit(): void
    {
        $split = Str\split('hello world my dear friend', ' ', 2);
        self::assertCount(2, $split);
        self::assertSame('hello', $split[0]);
        self::assertSame('world my dear friend', $split[1]);
    }

    public function testItSplitsWithNegativeLimit(): void
    {
        $split = Str\split('hello world my dear friend', ' ', -2);
        self::assertCount(3, $split);
        self::assertSame('hello', $split[0]);
        self::assertSame('world', $split[1]);
        self::assertSame('my', $split[2]);
    }
}
