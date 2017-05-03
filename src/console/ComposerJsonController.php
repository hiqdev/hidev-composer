<?php
/**
 * Composer plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer\console;

/**
 * `composer.json` file generation.
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class ComposerJsonController extends \hidev\base\Controller
{
    public function actionIndex()
    {
        $this->take('composer.json')->save();
    }
}
