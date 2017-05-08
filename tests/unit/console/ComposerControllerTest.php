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

use hidev\composer\console\ComposerController;

/**
 * Tests for ComposerController.
 */
class ComposerControllerTest extends \PHPUnit\Framework\TestCase
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
        $this->assertInstanceOf(\hidev\base\Controller::class, $this->object);
    }
}
