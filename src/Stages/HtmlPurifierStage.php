<?php

namespace Digia\Sanitization\Stages;

use HTMLPurifier;
use HTMLPurifier_Config;
use League\Pipeline\StageInterface;

/**
 * Class HtmlPurifierStage
 * @package Digia\Sanitization\Stages
 */
class HtmlPurifierStage implements StageInterface
{

    /**
     * @var HTMLPurifier_Config
     */
    private $config;

    /**
     * HtmlPurifierStage constructor.
     *
     * @param HTMLPurifier_Config|null $config
     */
    public function __construct(?HTMLPurifier_Config $config = null)
    {
        // Make a default config
        if ($config === null) {
            $this->config = HTMLPurifier_Config::createDefault();
            $this->config->set('HTML.Allowed', '');
        }
    }

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        return (new HTMLPurifier($this->config))->purify($payload);
    }
}
