<?php

require_once(__DIR__.'/vendor/autoload.php');

$rawInputData = <<<EOT
  The quick brown fox<br />
jumped over the <i>incredibly lazy dog</i> &amp; it
ran away.

EOT;

$encodedInputData = \base64_encode($rawInputData);

/** @var \League\Pipeline\Pipeline $pipeline */
$pipeline = (new \League\Pipeline\Pipeline())
    ->pipe(new \Digia\Sanitization\Stages\Base64DecodeStage())
    ->pipe(new \Digia\Sanitization\Stages\HtmlPurifierStage())
    ->pipe(new \Digia\Sanitization\Stages\HtmlEntityDecodeStage())
    ->pipe(new \Digia\Sanitization\Stages\StripLineFeedsStage(["\n"], true))
    ->pipe(new \Digia\Sanitization\Stages\TrimStringStage());

$outputData = $pipeline->process($encodedInputData);

var_dump($outputData); // string(70) "The quick brown fox jumped over the incredibly lazy dog & it ran away."
