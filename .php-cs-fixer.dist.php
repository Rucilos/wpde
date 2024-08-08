<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true, 
        '@PHP82Migration' => true,
    ])
    ->setFinder($finder)
    ->setIndent("\t")
    ->setLineEnding("\r\n");
