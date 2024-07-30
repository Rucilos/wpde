<?php

declare(strict_types=1); // Zajišťuje, že se typy argumentů a návratových hodnot budou dodržovat

use PhpCsFixer\Config; // Importuje třídu Config z PHP CS Fixer
use PhpCsFixer\Finder; // Importuje třídu Finder pro vyhledávání souborů

// Vytvoření instance Config
$config = Config::create()
    ->setRules([
        '@PSR2' => true, // Použij pravidla PSR-2
        'indentation_type' => true, // Nastav typ odsazení (tab/space)
        'binary_operator_spaces' => [ // Nastav pravidla pro mezery kolem binárních operátorů
            'default' => 'single_space',
            'operators' => [
                '=>' => 'align_single_space_minimal', // Zarovnej '=>' na minimální prostor
            ],
        ],
        'braces' => [ // Nastavení pro složené závorky
            'positions' => [
                'class' => 'next',
                'method' => 'next',
                'namespace' => 'same',
                'function' => 'next',
            ],
        ],
        'no_trailing_whitespace' => true, // Odstraň trailing whitespace
        'no_whitespace_in_blank_line' => true, // Odstraň prázdné řádky s bílými znaky
        'return_type_declaration' => ['space_before' => 'one'], // Přidej mezeru před deklarací návratového typu
    ])
    ->setFinder(Finder::create() // Vytvoření Finderu pro vyhledávání souborů
        ->in(__DIR__) // Prohledává aktuální adresář
        ->name('*.php') // Hledá soubory s koncovkou .php
        ->notName('*.blade.php') // Vyloučí Blade šablony
        ->exclude('vendor') // Vyloučí složku vendor
    );

// Vrátí konfigurační instanci
return $config;
