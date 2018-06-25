<?php

namespace Digia\Sanitization\Tests\Stages;

use Digia\Sanitization\Stages\ConvertEmptyStringToNullStage;
use PHPUnit\Framework\TestCase;

/**
 * Class ConvertEmptyStringToNullStageTest
 * @package Digia\Sanitization\Tests\Stages
 */
class ConvertEmptyStringToNullStageTest extends TestCase
{

    public function testStage()
    {
        $stage = new ConvertEmptyStringToNullStage();

        $this->assertNull($stage(''));
        $this->assertNull($stage(null));
        $this->assertNotNull($stage('foo'));
    }
}
