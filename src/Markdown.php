<?php

namespace Flerex\LaravelMarkdown;

use Parsedown;

class Markdown extends Parsedown {
	
	function __construct()
	{
		$this->BlockTypes['^'][]= 'DropCap';
	}

	public function blockDropCap($line)
    {

        if (preg_match('/^\^(\w)/', $line['text'], $matches)) {
            return [
                'element' => [
                    'name' => 'p',
                    'handler' => 'elements',
                    'text' => [
                        [
                            'name' => 'span',
                            'text' => $matches[1],
                            'attributes' => [
                                'class' => 'drop-cap',
                            ],
                        ],
                        [
                            'name' => 'span',
                            'handler' => 'line',
                            'text' => substr($line['text'], 2),
                        ]
                    ],
                ],
            ];
        }
    }

    public function blockDropCapContinue($line, $Block)
    {
        if (!isset($Block['interrupted'])) {
            $Block['element']['text'][1]['text'][] = $line['text'];
            return $Block;
        }
    }

}