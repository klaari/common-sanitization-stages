<?php

namespace Digia\Sanitization\Tests\Stages;

use Digia\Sanitization\Stages\ShortenStringStage;
use PHPUnit\Framework\TestCase;

/**
 * Class ShortenStringStageTest
 * @package Digia\Sanitization\Tests\Stages
 */
class ShortenStringStageTest extends TestCase
{

    /**
     * @param string $originalText
     * @param string $expectedShortenedText
     * @param int    $length
     *
     * @dataProvider shortenDataProvider
     */
    public function testStage(string $originalText, string $expectedShortenedText, int $length): void
    {
        $stage               = new ShortenStringStage($length);
        $actualShortenedText = $stage($originalText);

        $this->assertEquals($expectedShortenedText, $actualShortenedText);
    }

    /**
     * @return array
     */
    public function shortenDataProvider(): array
    {
        return [
            ['this is a long string', 'this is a', 10],
            ['this is a long string', 'this is', 9],
            ['this is a long string', 'this', 5],
            // The last word is always chopped off, so if we are left with one word the whole string should be returned 
            ['this is a long string', 'this is a long string', 4],
            ['this is a long string', 'this is a long string', 3],
        ];
    }
}
