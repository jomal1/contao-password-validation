terminal42/contao-password-validation
=====================================

a Contao 4 bundle that validates user passwords against created password policy.


## Features

- Validate a password against your organization policies
- Create multiple policy with specyfic rules
- Force members to do a password-change


## Installation

Choose the installation method that matches your workflow!


### Installation via Contao Manager

Search for `terminal42/contao-password-validation` in the Contao Manager and add it to your installation. Finally,
update the packages.

### Manual installation

add a composer dependency for this bundle. Therefore, change in the project root and run the following:

```bash
composer require terminal42/contao-password-validation
```

Depending on your environment, the command can differ, i.e. starting with `php composer.phar …` if you do not have 
composer installed globally.

Then, update the database via the Contao install tool.


## Configuration

### Password validation

create policy via backend module and assign them to front-end/back-end user

## add your own password validator

You can add your own validation rule, e.g. a dictionary check.

Create a class that implements `PasswordValidatorInterface`. Then, create and tag a corresponding service.

```
  app.password_validation.validator.dictionary:
    class: app\PasswordValidation\Validator\Dictionary
    tags:
      - { name: terminal42_password_validation.validator, alias: dictionary }
```


## License

This bundle is released under the [MIT license](LICENSE)
