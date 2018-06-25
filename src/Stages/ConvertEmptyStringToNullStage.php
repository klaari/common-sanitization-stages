<?php

namespace Digia\Sanitization\Stages;

use League\Pipeline\StageInterface;

/**
 * Class ConvertEmptyStringToNullStage
 * @package Digia\Sanitization\Stages
 */
class ConvertEmptyStringToNullStage implements StageInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        return !empty($payload) ? $payload : null;
    }
}
