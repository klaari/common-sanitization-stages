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
        $actualLineFeeds = "This sentence has\ntwo lines";
        $this->assertEquals('This sentence hastwo lines', (new StripLineFeedsStage())($actualLineFeeds));

        $literalLineFeeds = 'This sentence\nis just weird\nokay';
        $this->assertEquals('This sentence is just weird okay',
            (new StripLineFeedsStage(["\n", '\n'], true))($literalLineFeeds));
    }
}
