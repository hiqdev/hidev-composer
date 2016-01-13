<?php

/*
 * Composer plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer\controllers;

/**
 * Goal for composer.json.
 */
class ComposerJsonController extends \hidev\controllers\FileController
{
    protected $_file = 'composer.json';

    public function actionLoad()
    {
        parent::actionLoad();
        $sets = [
            'name'        => $this->fullName,
            'type'        => $this->type,
            'description' => $this->takePackage()->title,
            'keywords'    => $this->takePackage()->keywords,
            'homepage'    => $this->takePackage()->homepage,
            'license'     => $this->takePackage()->license,
            'support'     => $this->support,
            'authors'     => $this->authors,
            'require'     => $this->require,
            'require-dev' => $this->get('require-dev'),
            'autoload'    => $this->autoload,
        ];
        $this->setItems($sets, 'first');
        foreach (['require', 'require-dev'] as $k) {
            if (!$this->get($k)) {
                $this->delete($k);
            }
        }
    }

    /**
     * Converts hidev type to composer type.
     * TODO package type can be different from composer type.
     */
    public function getType()
    {
        return $this->rawItem('type') ?: $this->takePackage()->type;
    }

    public function getFullName()
    {
        return $this->getItem('name') ?: $this->takePackage()->fullName;
    }

    public function getSupport()
    {
        return array_merge(array_filter([
            'email'  => $this->takeVendor()->email,
            'source' => $this->takePackage()->source,
            'issues' => $this->takePackage()->issues,
            'wiki'   => $this->takePackage()->wiki,
            'forum'  => $this->takePackage()->forum,
        ]), (array) $this->getItem('support'));
    }

    public function getAuthors()
    {
        $res = [];
        if ($this->takePackage()->authors) {
            foreach ($this->takePackage()->authors as $nick => $all_data) {
                $data = [];
                foreach (['name', 'role', 'email', 'homepage'] as $k) {
                    if ($all_data[$k]) {
                        $data[$k] = $all_data[$k];
                    }
                }
                $res[] = $data;
            }
        }

        return $res;
    }

    public function getAutoload()
    {
        $autoload   = $this->rawItem('autoload');
        $psr4       = $autoload['psr-4'] ?: [];
        $namespace  = $this->takePackage()->namespace;
        if (!array_key_exists($namespace, $psr4)) {
            $psr4 = [$namespace . '\\' => $this->takePackage()->src] + $psr4;
            $autoload['psr-4'] = $psr4;
            $this->setItem('autoload', $autoload);
        }

        return $autoload;
    }

    /**
     * @return array
     */
    public function getRequire()
    {
        return $this->getItem('require') ?: [];
    }

    /**
     * @return array
     */
    public function getRequireDev()
    {
        return $this->getItem('require-dev') ?: [];
    }
}
