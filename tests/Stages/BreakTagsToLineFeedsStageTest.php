<?php

namespace Digia\Sanitization\Tests\Stages;

use Digia\Sanitization\Stages\BreakTagsToLineFeedsStage;
use PHPUnit\Framework\TestCase;

/**
 * Class BreakTagsToLineFeedsStageTest
 * @package Digia\Sanitization\Tests\Stages
 */
class BreakTagsToLineFeedsStageTest extends TestCase
{

    public function testStage()
    {
        $input  = 'This string has<br />some<br> break <BR  /> TAGS';
        $output = (new BreakTagsToLineFeedsStage())($input);

        $this->assertEquals("This string has\nsome\n break \n TAGS", $output);
    }
}
