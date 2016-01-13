<?php

/*
 * Composer plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer\controllers;

/**
 * Goal for Composer.
 */
class ComposerController extends \hidev\controllers\CommonController
{
    protected $_before = ['composer.json'];

    public function getNamespace()
    {
        return @trim(key($this->getConfiguration()->getFile()->get('autoload')['psr-4']), '\\');
    }

    public function getFullName()
    {
        return $this->getConfiguration()->getFullName();
    }

    public function getConfiguration()
    {
        $conf = $this->takeGoal('composer.json');
        $conf->runAction('load');
        return $conf;
    }
}
