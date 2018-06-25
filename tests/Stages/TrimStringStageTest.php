<?php

namespace Digia\Sanitization\Tests\Stages;

use Digia\Sanitization\Stages\TrimStringStage;
use PHPUnit\Framework\TestCase;

/**
 * Class TrimStringStageTest
 * @package Digia\Sanitization\Tests\Stages
 */
class TrimStringStageTest extends TestCase
{

    public function testStage()
    {
        $stage = new TrimStringStage();

        $input = "  A string with extra whitespace     \xA0  ";
        $this->assertEquals('A string with extra whitespace', $stage($input));

        $stage = new TrimStringStage(' a');
        $input = 'a string';

        $this->assertEquals('string', $stage($input));
    }
}
