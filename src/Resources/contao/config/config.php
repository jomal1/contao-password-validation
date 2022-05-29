<?php

declare(strict_types=1);

/*
 * Password Validation Bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2021, terminal42 gmbh
 * @author     terminal42 <https://terminal42.ch>
 * @license    MIT
 * @link       http://github.com/terminal42/contao-password-validation
 */

use Terminal42\PasswordValidationBundle\Model\PasswordHistory;
use Terminal42\PasswordValidationBundle\Model\PasswordPolicy;
$GLOBALS['BE_MOD']['accounts']['password_policy'] = [
    'tables' => ['tl_password_policy'],
];

$GLOBALS['TL_MODELS']['tl_password_history'] = PasswordHistory::class;

$GLOBALS['TL_MODELS']['tl_password_policy'] = PasswordPolicy::class;



