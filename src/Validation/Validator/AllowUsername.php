<?php

declare(strict_types=1);

/*
 * Password Validation Bundle for Contao Open Source CMS.
 *
 * @author     Krzysztof Bochenek
 * @license    MIT
 * @link       http://github.com/terminal42/contao-password-validation
 */

namespace Terminal42\PasswordValidationBundle\Validation\Validator;

use Contao\System;
use Terminal42\PasswordValidationBundle\Exception\PasswordValidatorException;
use Terminal42\PasswordValidationBundle\Validation\PasswordValidatorInterface;
use Terminal42\PasswordValidationBundle\Validation\ValidationConfiguration;
use Terminal42\PasswordValidationBundle\Validation\ValidationContext;

final class AllowUsername implements PasswordValidatorInterface
{
    private $configuration;

    public function __construct(ValidationConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function validate(ValidationContext $context): bool
    {

        if (false === $this->configuration->hasConfiguration($context->getUserEntity())) {
            return true;
        }

        $configuration = $this->configuration->getConfiguration($context->getUserEntity());
        $allowUsername = $configuration['all_username'];
        $password = $context->getPassword()->getString();
        $username = $context->getUsername();

        if ($allowUsername) {
            return true;
        }
        if (strpos(' '.$password, $username) !== false) {
            $nip = true;
        }
        else{
            $nip = false;
        }
        $file = fopen('/var/www/html/web/testss.txt','w+');
        $debug = var_export($context, true);
        fwrite($file,$debug);
        fwrite($file,var_export([$nip, $password, $username, $allowUsername],true));
        fclose($file);
        if ($nip) {

            throw new PasswordValidatorException($this->translate('allowUName'));

        }

        return true;
 
    }

    private function translate(string $key)
    {
        System::loadLanguageFile('exception');

        return $GLOBALS['TL_LANG']['XPT']['passwordValidation'][$key];
    }
}
