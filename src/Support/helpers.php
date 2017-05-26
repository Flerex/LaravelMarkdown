<?php

use Flerex\LaravelMarkdown\Parsedown;

/**
 * @param string $text
 * @return string
 */
function parsedown($text)
{
    /**
     * @var Parsedown $parser
     */
    $parser = resolve(Parsedown::class);

    return $parser->text($text);
}
