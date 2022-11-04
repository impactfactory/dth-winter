<?php

namespace Liip\Util\Classes;


class TwigFilters
{
    public static function nl2p($value)
    {
        $array = explode("\n", $value);
        $paras = array_map(function($item) {
            return sprintf('<p>%s</p>', $item);
        }, $array);
        return implode('', $paras);
    }

    /**
     * convert value to star icons. if the fraction is greater or equal 0.5 a half star is rendered.
     * @param $value
     * @param int $max
     * @return string
     */
    public static function rating($value, $max = 6)
    {
        // skip null values
        if($value == null) return $value;

        $stars = [];
        $int = floor($value);
        $frac = fmod($value, 1);

        for($i = 0; $i < $max; $i++) {
            $class = ($i < $int) ? 'fa-star' : 'fa-star-o';
            if($i == $int) {
                $class = ($frac >= 0.5) ? 'fa-star-half-o' : $class;
            }
            array_push($stars, sprintf('<i class="fa %s"></i>', $class));
        }
        return implode('', $stars);
    }

    /**
     * true if a storage file path exists (file, dir), false otherwise
     * @param $path
     * @return bool
     */
    public static function is_file($path) {
        return is_file(base_path(config('cms.storage.media.path') . $path));
    }

    public static function query($path, $query=[]) {
        $q = request()->query();
        $query = array_merge($q, $query);
        $str = http_build_query($query);
        return empty($str) ? $path : $path . '?' . $str;
    }
}