<?php

namespace Digia\Sanitization\Stages;

use League\Pipeline\StageInterface;

/**
 * Class StripLineFeedsStage
 * @package Digia\Sanitization\Stages
 */
class StripLineFeedsStage implements StageInterface
{

    /**
     * @var array
     */
    private $unwantedSequences;

    /**
     * StripLineFeedsStage constructor.
     *
     * @param array $unwantedSequences
     */
    public function __construct(array $unwantedSequences = ["\n", '\n'])
    {
        $this->unwantedSequences = $unwantedSequences;
    }

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        return \str_replace($this->unwantedSequences, '', $payload);
    }
}
