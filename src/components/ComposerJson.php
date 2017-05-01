<?php

/*
 * Composer plugin for HiDev
 *
 * @link      https://github.com/hiqdev/hidev-composer
 * @package   hidev-composer
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2016, HiQDev (http://hiqdev.com/)
 */

namespace hidev\composer\components;

/**
 * `composer.json` config file.
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class ComposerJson extends \hidev\base\ConfigFile
{
    protected $_file = 'composer.json';

    public function load()
    {
        parent::load();
        $sets = [
            'name'        => $this->getName(),
            'type'        => $this->getType(),
            'description' => $this->take('package')->title,
            'keywords'    => $this->take('package')->keywords,
            'homepage'    => $this->take('package')->homepage,
            'license'     => $this->take('package')->license,
            'support'     => $this->getSupport(),
            'authors'     => $this->getAuthors(),
            'require'     => $this->getRequire(),
            'require-dev' => $this->getRequireDev(),
            'autoload'    => $this->getAutoload(),
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
     * TODO composer type can be different from package type.
     * @return string
     */
    public function getType()
    {
        return $this->take('package')->type;
    }

    /**
     * Converts hidev full name to composer name.
     * TODO composer name can be different from package full name.
     * @return string
     */
    public function getName()
    {
        return $this->take('package')->fullName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->getName();
    }

    public function getSupport()
    {
        return array_merge(array_filter([
            'email'  => $this->take('vendor')->email,
            'source' => $this->take('package')->source,
            'issues' => $this->take('package')->issues,
            'wiki'   => $this->take('package')->wiki,
            'forum'  => $this->take('package')->forum,
        ]), (array) $this->getItem('support'));
    }

    public function getAuthors()
    {
        if ($this->take('package')->authors) {
            foreach ($this->take('package')->authors as $all_data) {
                $data = [];
                foreach (['name', 'role', 'email', 'homepage'] as $k) {
                    if (!empty($all_data[$k])) {
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
        $namespace  = $this->take('package')->namespace;
        if (!array_key_exists($namespace, $psr4)) {
            $psr4 = [$namespace . '\\' => $this->take('package')->src] + $psr4;
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
