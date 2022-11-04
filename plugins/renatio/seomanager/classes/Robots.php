<?php

namespace Renatio\SeoManager\Classes;

/**
 * Class Robots
 * @package Renatio\SeoManager\Classes
 */
class Robots
{

    /**
     * @var string
     */
    protected $path = 'robots.txt';

    /**
     * @return string
     */
    public function get()
    {
        if (file_exists($this->path)) {
            return file_get_contents($this->path);
        }

        return $this->setDefaultContent();
    }

    /**
     * @param $content
     */
    public function set($content)
    {
        file_put_contents($this->path, $content);
    }

    /**
     * @return string
     */
    protected function setDefaultContent()
    {
        $content = "User-agent: *\r\nAllow: /";

        file_put_contents($this->path, $content);

        return $content;
    }
}
