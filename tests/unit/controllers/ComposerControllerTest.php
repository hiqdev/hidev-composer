<?php

/*
 * Composer plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer\tests\unit\controllers;

use hidev\composer\controllers\ComposerController;

/**
 * Tests for ComposerController.
 */
class ComposerControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ComposerController
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new ComposerController('composer', null);
    }

    protected function tearDown()
    {
    }

    public function testConstructor()
    {
        $this->assertInstanceOf('hidev\base\Controller', $this->object);
    }
}
