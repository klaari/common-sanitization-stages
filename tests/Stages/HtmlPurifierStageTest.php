<?php

namespace Digia\Sanitization\Tests\Stages;

use Digia\Sanitization\Stages\HtmlPurifierStage;
use PHPUnit\Framework\TestCase;

/**
 * Class HtmlPurifierStageTest
 * @package Digia\Sanitization\Tests\Stages
 */
class HtmlPurifierStageTest extends TestCase
{

    public function testStage()
    {
        $input = '<p>This is a paragraph</p>';

        $stage = new HtmlPurifierStage();
        $this->assertEquals('This is a paragraph', $stage($input));

        $config = \HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'p');

        $stage = new HtmlPurifierStage($config);
        $this->assertEquals($input, $stage($input));
    }
}
