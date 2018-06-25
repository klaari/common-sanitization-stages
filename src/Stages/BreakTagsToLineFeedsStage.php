<?php

namespace Digia\Sanitization\Stages;

use League\Pipeline\StageInterface;

/**
 * Class BreakTagsToLineFeedsStage
 * @package Digia\Sanitization\Stages
 */
class BreakTagsToLineFeedsStage implements StageInterface
{
    
    /**
     * @inheritdoc
     */
    public function __invoke($payload)
    {
        return preg_replace('/<br(\s+)?\/?>/i', "\n", $payload);
    }
}
