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

use Yii;

/**
 * Goal for Composer.
 */
class ComposerController extends \hidev\controllers\CommonController
{
    protected $_before = ['composer.json'];

    public function actionInstall()
    {
        return $this->runActions(['before', 'do-install', 'after']);
    }

    public function actionUpdate()
    {
        return $this->runActions(['before', 'do-update', 'after']);
    }

    public function actionDoInstall()
    {
        $dir = Yii::getAlias('@prjdir/vendor');
        return is_dir($dir) ? 0 : $this->run('install');
    }

    public function actionDoUpdate()
    {
        return $this->run('update');
    }

    public function run($command, $dir = null)
    {
        if ($dir === null) {
            $dir = Yii::getAlias('@prjdir');
        }
        $args = [$command, '--ansi'];
        if ($dir) {
            $args[] = '-d';
            $args[] = $dir;
        }
        return $this->passthru('composer', $args);
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
        $conf = $this->takeGoal('composer.json');
        $conf->runAction('load');
        return $conf;
    }
}
