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
 * Class Utf8FunctionsTest.
 *
 * @internal
 * @coversNothing
 */
class Utf8FunctionsTest extends TestCase
{
    public function testItCountsRunes(): void
    {
        self::assertSame(1, Unicode\Utf8\runeCount('😀'));
        self::assertSame(2, Unicode\Utf8\runeCount('世界'));
        self::assertSame(5, Unicode\Utf8\runeCount('Hello'));
    }

    public function testItGetsRune(): void
    {
        $emoji = Unicode\Utf8\rune(0x01F600);
        self::assertSame('😀', $emoji);
    }
}
