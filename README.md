# common-sanitization-stages

[![Build Status](https://travis-ci.org/digiaonline/common-sanitization-stages.svg?branch=master)](https://travis-ci.org/digiaonline/common-sanitization-stages)
[![Coverage Status](https://coveralls.io/repos/github/digiaonline/common-sanitization-stages/badge.svg?branch=master)](https://coveralls.io/github/digiaonline/common-sanitization-stages?branch=master)

A collection pipeline stages that are commonly needed when sanitizing data

## Requirements

* PHP >= 7.1

## Installation

```bash
composer require digiaonline/common-sanitization-stages
```

## Usage

Let's say you're importing some legacy data into a new system. The original data is user generated content, so it 
cannot be trusted. Additionally, it contains some simple HTML that you want to strip. On top of all this, the legacy 
data must be possible to store in a CSV file, so you need to encode it somehow so the CSV delimiter is guaranteed not 
to occur in the text value.

To accomplish this, just combine the stages you need into a pipeline, then run the pipeline against your data:

```php
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
```

## License 

MIT
