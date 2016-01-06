<?php

/*
 * Composer plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
 */

return [
    'components' => [
        'config' => [
            'composer' => [
                'class' => 'hidev\composer\goals\ComposerGoal',
            ],
            'composer.json' => [
                'class' => 'hidev\composer\goals\ComposerJsonGoal',
            ],
            'packagist' => [
                'class' => 'hidev\composer\goals\PackagistGoal',
            ],
            'readme' => [
                'markdownBadges' => [
                    'packagist.stable'    => '[![Latest Stable Version](https://poser.pugx.org/{{ config.composer.fullName }}/v/stable)](https://packagist.org/packages/{{ config.composer.fullName }})',
                    'packagist.unstable'  => '[![Latest Unstable Version](https://poser.pugx.org/{{ config.composer.fullName }}/v/unstable)](https://packagist.org/packages/{{ config.composer.fullName }})',
                    'packagist.license'   => '[![License](https://poser.pugx.org/{{ config.composer.fullName }}/v/license)](https://packagist.org/packages/{{ config.composer.fullName }})',
                    'packagist.downloads' => '[![Total Downloads](https://poser.pugx.org/{{ config.composer.fullName }}/downloads)](https://packagist.org/packages/{{ config.composer.fullName }})',
                ],
            ],
        ],
    ],
];
