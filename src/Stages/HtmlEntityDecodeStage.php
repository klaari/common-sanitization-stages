<?php

namespace Digia\Sanitization\Stages;

use League\Pipeline\StageInterface;

/**
 * Class HtmlEntityDecodeStage
 * @package Digia\Sanitization\Stages
 */
class HtmlEntityDecodeStage implements StageInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        return \html_entity_decode($payload);
    }
}
