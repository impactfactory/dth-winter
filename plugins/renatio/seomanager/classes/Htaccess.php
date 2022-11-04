<?php

namespace Renatio\SeoManager\Classes;

/**
 * Class Htaccess
 * @package Renatio\SeoManager\Classes
 */
class Htaccess
{

    /**
     * @var string
     */
    protected $path = '.htaccess';

    /**
     * @return string
     */
    public function get()
    {
        if (file_exists($this->path)) {
            return file_get_contents($this->path);
        }

        return '';
    }

    /**
     * @param $content
     */
    public function set($content)
    {
        file_put_contents($this->path, $content);
    }
}
