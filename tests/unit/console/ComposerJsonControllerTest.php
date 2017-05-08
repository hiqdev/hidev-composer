<?php
/**
 * HiDev plugin for Composer.
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer\tests\unit\console;

use hidev\composer\console\ComposerJsonController;

/**
 * Tests for ComposerJsonController.
 */
class ComposerJsonControllerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var ComposerJsonController
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new ComposerJsonController('composer.json', null);
    }

    protected function tearDown()
    {
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(\hidev\base\Controller::class, $this->object);
    }
}
