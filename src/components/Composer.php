<?php
/**
 * HiDev plugin for Composer.
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer\components;

/**
 * `composer`.
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class Composer extends \hidev\base\Component
{
    public function getJson()
    {
        return $this->getConfiguration();
    }

    public function getConfiguration()
    {
        return $this->take('composer.json');
    }

    public function getFullName()
    {
        return $this->getConfiguration()->getFullName();
    }
}
