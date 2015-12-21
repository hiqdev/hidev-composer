<?php

/*
 * Composer plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer\goals;

/**
 * Goal for Composer.
 */
class ComposerGoal extends DefaultGoal
{
    public function init()
    {
        parent::init();
        $this->setDeps('composer.json');
        $this->vcs->setIgnore([
            'vendor'        => 'vendor dirs',
            'composer.lock' => 'composer lock files',
        ], 'first');
    }

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
        $conf = parent::getConfig()->get('composer.json');
        $conf->runAction('load');
        return $conf;
    }

    public function getConfigFile()
    {
        $conf = parent::getConfig()->get('composer.json');
        $conf->runAction('load');
        return $conf;
    }
}
