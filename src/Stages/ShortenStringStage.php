<?php

namespace Digia\Sanitization\Stages;

use League\Pipeline\StageInterface;

/**
 * Class ShortenStringStage
 * @package Digia\Sanitization\Stages
 */
class ShortenStringStage implements StageInterface
{

    /**
     * @var int
     */
    private $maxLength;

    /**
     * ShortenStringStage constructor.
     *
     * @param int $desiredMaxLength the desired maximum length of the string (may be slightly longer due to word breaks)
     */
    public function __construct(int $desiredMaxLength)
    {
        $this->maxLength = $desiredMaxLength;
    }

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        // Don't do anything if the maximum length is longer than the string
        if (strlen($payload) < $this->maxLength) {
            return $payload;
        }

        // Don't chop off a word at the end, make the string slightly longer instead
        $dirty = substr($payload, 0, $this->maxLength);
        $clean = substr($dirty, 0, strrpos($dirty, ' '));

        return $clean ?: $payload;
    }
}
