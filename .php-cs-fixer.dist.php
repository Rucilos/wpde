<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true, // Přidání PSR2 setu
        '@PHP82Migration' => true,
        
    ])
    ->setFinder($finder)
;
