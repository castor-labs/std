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

// Polyfill for PHP 8
if (!class_exists('ValueError')) {
    class ValueError extends Error
    {
    }
}

$paths = [
    __DIR__.'/str.php',
    __DIR__.'/arr.php',
    __DIR__.'/unicode.utf8.php',
];

// Load Utf8 functions if mbstring extension is included.
if (extension_loaded('mbstring')) {
    $path[] = __DIR__.'/unicode.utf8.php';
}

foreach ($paths as $path) {
    require_once $path;
}
