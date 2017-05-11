<?php
/**
 * HiDev plugin for Composer.
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

return [
    'controllerMap' => [
        'composer' => [
            'class' => \hidev\composer\console\ComposerController::class,
        ],
        'composer.json' => [
            'class' => \hidev\composer\console\ComposerJsonController::class,
        ],
        'packagist' => [
            'class' => \hidev\composer\console\PackagistController::class,
        ],
        'deploy' => [
            'before' => [
                'composer/dump-autoload',
            ],
        ],
    ],
    'components' => [
        'vcsignore' => [
            '/vendor'        => 'composer internals',
            '/composer.lock' => 'composer internals',
        ],
        'composer' => [
            'class' => \hidev\composer\components\Composer::class,
        ],
        'composer.json' => [
            'class' => \hidev\composer\components\ComposerJson::class,
        ],
        'readme' => [
            'knownBadges' => [
                'packagist.stable'    => '[![Latest Stable Version](https://poser.pugx.org/{{ app.composer.fullName }}/v/stable)](https://packagist.org/packages/{{ app.composer.fullName }})',
                'packagist.unstable'  => '[![Latest Unstable Version](https://poser.pugx.org/{{ app.composer.fullName }}/v/unstable)](https://packagist.org/packages/{{ app.composer.fullName }})',
                'packagist.license'   => '[![License](https://poser.pugx.org/{{ app.composer.fullName }}/v/license)](https://packagist.org/packages/{{ app.composer.fullName }})',
                'packagist.downloads' => '[![Total Downloads](https://poser.pugx.org/{{ app.composer.fullName }}/downloads)](https://packagist.org/packages/{{ app.composer.fullName }})',
            ],
        ],
    ],
];
