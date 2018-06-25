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
     * @var bool
     */
    private $spaces;

    /**
     * StripLineFeedsStage constructor.
     *
     * @param array $unwantedSequences
     * @param bool  $spaces
     */
    public function __construct(array $unwantedSequences = ["\n", '\n'], bool $spaces = false)
    {
        $this->unwantedSequences = $unwantedSequences;
        $this->spaces            = $spaces;
    }

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        $replaceWith = $this->spaces ? ' ' : '';

        return \str_replace($this->unwantedSequences, $replaceWith, $payload);
    }
}
