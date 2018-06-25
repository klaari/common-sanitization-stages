<?php

namespace Digia\Sanitization\Stages;

use League\Pipeline\StageInterface;

/**
 * Class Base64DecodeStage
 * @package Digia\Sanitization\Stages
 */
class Base64DecodeStage implements StageInterface
{

    /**
     * @var bool
     */
    private $strict;

    /**
     * Base64DecodeStage constructor.
     *
     * @param bool $strict
     */
    public function __construct(bool $strict = false)
    {
        $this->strict = $strict;
    }

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        return \base64_decode($payload, $this->strict);
    }
}
