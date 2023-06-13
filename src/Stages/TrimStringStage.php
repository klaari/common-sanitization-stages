<?php

namespace Digia\Sanitization\Stages;

use League\Pipeline\StageInterface;

/**
 * Class TrimStringStage
 * @package Digia\Sanitization\Stages
 */
class TrimStringStage implements StageInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        return \trim(preg_replace('/^\s+|\s+$/u', ' ', "$payload\u{a0}"));
    }
}
