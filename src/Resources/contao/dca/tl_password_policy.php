<?php


$GLOBALS['TL_DCA']['tl_password_policy'] =
    [
        // Config
        'config' =>
            [
                'dataContainer' => 'Table',
                'switchToEdit' => true,
                'enableVersioning' => false,
                'markAsCopy' => 'title',
                'sql' =>
                    [
                        'keys' =>
                            [
                                'id' => 'primary',
                            ]
                    ]
            ],

        // List
        'list' =>
            [
                'sorting' =>
                    [
                        'mode' => 2,
                        'fields' => ['title'],
                        'flag' => 1,
                        'headerFields' => ['title'],
                        'panelLayout' => 'search,limit',
                    ],
                'label' =>
                    [
                        'fields' => ['title'],
                        'format' => '%s'
                    ],
                'global_operations' =>
                    [
                        'all' =>
                            [
                                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                                'href' => 'act=select',
                                'class' => 'header_edit_all',
                                'attributes' => 'onclick="Backend.getScrollOffset();"'
                            ]
                    ],
                'operations' =>
                    [
                        'edit' =>
                            [
                                'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['edit'],
                                'href' => 'act=edit',
                                'icon' => 'edit.svg'
                            ],
                        'copy' =>
                            [
                                'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['copy'],
                                'href' => 'act=copy',
                                'icon' => 'copy.svg'
                            ],
                        'delete' =>
                            [
                                'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['delete'],
                                'href' => 'act=delete',
                                'icon' => 'delete.svg',
                                'attributes' => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
                            ]

                    ]
            ],

        // Palettes
        'palettes' =>
            [
                '__selector__' => ['specialChar','passwordExpire','passwordCharAdvance','passwordUppercase','passwordLowercase','passwordNumbers'],
                'default' => '{simple},title,minLength,maxLength;{advance},specialChar,excludeUserName,passwordExpire,',
            ],
        'subpalettes' =>
        [
            'specialChar' => 'specialCharList,passwordCharAdvance',
            'passwordExpire' => 'passwordExpireDays,',
            'passwordCharAdvance' => 'passwordSpecialNumbers,passwordUppercase,passwordLowercase,passwordNumbers',
            'passwordUppercase' => 'passwordUppercaseNumber',
            'passwordLowercase' => 'passwordLowercaseNumber',
            'passwordNumbers' => 'passwordNumbersNumber',
        ],
        // Fields
        'fields' =>
            [
                'id' =>
                    [
                        'sql' => "int(10) unsigned NOT NULL auto_increment"
                    ],
                'tstamp' =>
                    [
                        'sql' => "int(10) unsigned NOT NULL default '0'"
                    ],
                'title' =>
                    [
                        'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['title'],
                        'inputType' => 'text',
                        'search' => false,
                        'eval' => ['mandatory' => true, 'maxlength' => 64, 'minlength' => 3, 'tl_class' => 'long'],
                        'sql' => "varchar(255) NOT NULL default ''"
                    ],
                'minLength' =>
                    [
                        'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['minLength'],
                        'inputType' => 'text',
                        'search' => false,
                        'eval' => ['mandatory' => true, 'digit' => true, 'natural' => true, 'minval' => 8, 'tl_class' => 'w50'],
                        'sql' => "int(8) NOT NULL default 8"
                    ],
                'maxLength' =>
                    [
                        'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['maxLength'],
                        'inputType' => 'text',
                        'search' => false,
                        'eval' => ['mandatory' => true, 'digit' => true, 'natural' => true, 'minval' => 8, 'tl_class' => 'w50'],
                        'sql' => "int(8) NOT NULL default 64"
                    ],
                'specialChar' =>
                    [
                        'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['specialChar'],
                        'inputType' => 'checkbox',
                        'search' => false,
                        'eval' => ['mandatory' => false, 'digit' => true, 'maxval' => 1, 'tl_class' => 'w50','submitOnChange'=>true],
                        'sql' => "int(1) NOT NULL default 0"
                    ],
                'specialCharList' =>
                    [
                        'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['specialCharList'],
                        'inputType' => 'text',
                        'search' => false,
                        'eval' => ['mandatory' => true,  'maxval' => 32, 'tl_class' => 'w50'],
                        'sql' => "varchar(32) NOT NULL default '!@#$%^&*()_+{}:|?[]."
                    ],
                'excludeUserName' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['excludeUserName'],
                    'inputType' => 'checkbox',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'tl_class' => 'clr'],
                    'sql' => "int(1) NOT NULL default 0"
                ],
                'passwordHistory' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordExpire'],
                    'inputType' => 'checkbox',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'digit' => true, 'maxval' => 1, 'tl_class' => 'w50','submitOnChange'=>true],
                    'sql' => "int(1) NOT NULL default 0"
                ],
                 'passwordHistoryDays' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordExpireDays'],
                    'inputType' => 'text',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'digit' => true, 'min' => 8,'max' => 1095, 'tl_class' => 'w50'],
                    'sql' => "int(8) NOT NULL default 0"
                ],
                'passwordCharAdvance' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordCharAdvance'],
                    'inputType' => 'checkbox',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'tl_class' => 'clr','submitOnChange'=>true],
                    'sql' => "int(1) NOT NULL default 0"
                ],
                'passwordSpecialNumbers' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordSpecialNumbers'],
                    'inputType' => 'text',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'digit' => true, 'natural' => true, 'tl_class' => 'clr'],
                    'sql' => "int(9) NOT NULL default 0"
                ],
                'passwordUppercase' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordUppercase'],
                    'inputType' => 'checkbox',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'tl_class' => 'clr','submitOnChange'=>true],
                    'sql' => "int(1) NOT NULL default 0"
                ],
                 'passwordUppercaseNumber' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordUppercaseNumber'],
                    'inputType' => 'text',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'digit' => true, 'natural' => true, 'tl_class' => 'clr'],
                    'sql' => "int(9) NOT NULL default 1"
                ],
                'passwordLowercase' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordLowercase'],
                    'inputType' => 'checkbox',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'tl_class' => 'clr','submitOnChange'=>true],
                    'sql' => "int(1) NOT NULL default 0"
                ],
                 'passwordLowercaseNumber' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordLowercaseNumber'],
                    'inputType' => 'text',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'digit' => true, 'natural' => true, 'tl_class' => 'clr'],
                    'sql' => "int(8) NOT NULL default 1"
                ],
                'passwordNumbers' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordNumbers'],
                    'inputType' => 'checkbox',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'tl_class' => 'clr','submitOnChange'=>true],
                    'sql' => "int(1) NOT NULL default 0"
                ],
                 'passwordNumbersNumber' =>
                [
                    'label' => &$GLOBALS['TL_LANG']['tl_password_policy']['passwordNumbersNumber'],
                    'inputType' => 'text',
                    'search' => false,
                    'eval' => ['mandatory' => false, 'digit' => true, 'natural' => true, 'tl_class' => 'clr'],
                    'sql' => "int(8) NOT NULL default 1"
                ],
                
            ]
    ];