<?php

namespace Config;

// use \CodeIgniter\Validation\CreditCardRules;
// use \CodeIgniter\Validation\FileRules;
// use \CodeIgniter\Validation\FormatRules;
// use \CodeIgniter\Validation\Rules;
// use \Myth\Auth\Authentication\Passwords;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        \CodeIgniter\Validation\CreditCardRules::class,
        \CodeIgniter\Validation\FileRules::class,
        \CodeIgniter\Validation\FormatRules::class,
        \CodeIgniter\Validation\Rules::class,
        \Myth\Auth\Authentication\Passwords\ValidationRules::class,

        // Rules::class,
        // FormatRules::class,
        // FileRules::class,
        // CreditCardRules::class,
        // ValidationRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
