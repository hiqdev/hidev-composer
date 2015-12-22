<?php

/*
 * Composer plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer;

class Plugin extends \hiqdev\pluginmanager\Plugin
{
    protected $_items = [
        'goals' => [
            'composer'       => 'hidev\composer\goals\ComposerGoal',
            'composer.json'  => 'hidev\composer\goals\ComposerJsonGoal',
            'packagist'      => 'hidev\composer\goals\PackagistGoal',
        ],
    ];
}
