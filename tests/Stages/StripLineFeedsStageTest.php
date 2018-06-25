<?php

namespace Digia\Sanitization\Tests\Stages;

use Digia\Sanitization\Stages\StripLineFeedsStage;
use PHPUnit\Framework\TestCase;

/**
 * Class StripLineFeedsStageTest
 * @package Digia\Sanitization\Tests\Stages
 */
class StripLineFeedsStageTest extends TestCase
{

    public function testStage()
    {
        $actualLineFeeds  = "This sentence has\ntwo lines";
        $literalLineFeeds = 'This sentence\n\n is just weird';

        $stage = new StripLineFeedsStage();

        $this->assertEquals('This sentence hastwo lines', $stage($actualLineFeeds));
        $this->assertEquals('This sentence is just weird', $stage($literalLineFeeds));
    }
}
