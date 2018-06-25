<?php

namespace Digia\Sanitization\Tests\Stages;

use Digia\Sanitization\Stages\Base64DecodeStage;
use PHPUnit\Framework\TestCase;

/**
 * Class Base64DecodeStageTest
 * @package Digia\Sanitization\Tests\Stages
 */
class Base64DecodeStageTest extends TestCase
{

    public function testStage()
    {
        $stage = new Base64DecodeStage();

        $this->assertEquals('foobar', $stage('Zm9vYmFy'));

        $stage = new Base64DecodeStage(true);

        $this->assertFalse($stage('åäö'));
    }
}
