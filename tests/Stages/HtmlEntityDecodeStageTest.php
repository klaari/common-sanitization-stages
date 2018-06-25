<?php

namespace Digia\Sanitization\Tests\Stages;

use Digia\Sanitization\Stages\HtmlEntityDecodeStage;
use PHPUnit\Framework\TestCase;

/**
 * Class HtmlEntityDecodeStageTest
 * @package Digia\Sanitization\Tests\Stages
 */
class HtmlEntityDecodeStageTest extends TestCase
{

    public function testStage()
    {
        $stage = new HtmlEntityDecodeStage();

        $input  = 'Some text &amp; more "text"';
        $output = $stage($input);

        $this->assertEquals('Some text & more "text"', $output);
    }
}
