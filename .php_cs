<?php

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_after_namespace' => true,
        'blank_line_before_statement' => [
            'statements' => [
                'return',  'throw', 'try'
            ],
        ],
        'cast_spaces' => ['space' => 'single'],
        'ordered_imports' => ['sort_algorithm' => 'length'],
        'braces' => ['allow_single_line_closure' => true],
        'compact_nullable_typehint' => true,
        'concat_space' => ['spacing' => 'one'],
        'declare_equal_normalize' => ['space' => 'none'],
        'function_typehint_space' => true,
        'new_with_braces' => true,
        'no_empty_statement' => true,
        'no_leading_import_slash' => true,
        'no_leading_namespace_whitespace' => true,
        'no_whitespace_in_blank_line' => true,
        'return_type_declaration' => ['space_before' => 'none'],
        'single_trait_insert_per_statement' => false,
        'standardize_not_equals' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('vendor')
            ->in([
                __DIR__.'/src/'
            ])
        );
