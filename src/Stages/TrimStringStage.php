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
     * @var string
     */
    private $characterMask;

    /**
     * TrimStringStage constructor.
     *
     * @param string $characterMask
     */
    public function __construct(string $characterMask = " \t\n\r\0\x0B\xC2\xA0")
    {
        $this->characterMask = $characterMask;
    }

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        return \trim($payload, $this->characterMask);
    }
}
