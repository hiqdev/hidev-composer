<?php

/*
 * Composer plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer\console;

use Yii;

/**
 * Composer.
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class ComposerController extends \hidev\base\Controller
{
    protected $_before = ['composer.json'];

    /**
     * Does `composer install`
     */
    public function actionIndex()
    {
        return $this->doInstall();
    }

    /**
     * Does `composer install`
     */
    public function actionInstall()
    {
        return $this->doInstall();
    }

    /**
     * Does `composer install`
     */
    public function actionUpdate()
    {
        return $this->doUpdate();
    }

    /**
     * Does `composer self-update`
     */
    public function actionSelfUpdate($version = null)
    {
        return $this->run('self-update', '');
    }

    public function doInstall()
    {
        $dir = Yii::getAlias('@root/vendor');

        return is_dir($dir) ? 0 : $this->run('install');
    }

    public function doUpdate()
    {
        return $this->run('update');
    }

    public function run($command, $dir = null)
    {
        if ($dir === null) {
            $dir = Yii::getAlias('@root');
        }
        $args = [$command, '--ansi'];
        if ($dir && $dir !== getcwd()) {
            $args[] = '-d';
            $args[] = $dir;
        }

        return $this->passthru('composer', $args);
    }
}
