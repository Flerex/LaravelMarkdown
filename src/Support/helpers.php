<?php

use Flerex\LaravelMarkdown\Markdown;

/**
 * @param string $text
 * @return string
 */
function parsedown($text)
{
    /**
     * @var Parsedown $parser
     */
    $parser = resolve(Markdown::class);

    return $parser->text($text);
}
