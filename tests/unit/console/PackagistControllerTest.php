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

use hidev\composer\console\PackagistController;

/**
 * Tests for PackagistController.
 */
class PackagistControllerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var PackagistController
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new PackagistController('packagist', null);
    }

    protected function tearDown()
    {
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(\hidev\base\Controller::class, $this->object);
    }
}
