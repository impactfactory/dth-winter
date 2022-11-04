<?php namespace Excodus\TranslateExtended\Classes;

/**
 * Util functions for language detection from the client browser
 */
class BrowserMatching{

    // browser language parser based on Gumbo's answer
    // http://stackoverflow.com/a/3771447/3704886

    // parse list of comma separated language tags and sort it by the quality value
    public static function parseLanguageList($languageList) {
        if (is_null($languageList)) {
            if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
                return array();
            }
            $languageList = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        }
        $languages = array();
        $languageRanges = explode(',', trim($languageList));
        foreach ($languageRanges as $languageRange) {
            if (preg_match('/(\*|[a-zA-Z0-9]{1,8}(?:-[a-zA-Z0-9]{1,8})*)(?:\s*;\s*q\s*=\s*(0(?:\.\d{0,3})|1(?:\.0{0,3})))?/', trim($languageRange), $match)) {
                if (!isset($match[2])) {
                    $match[2] = '1.0';
                } else {
                    $match[2] = (string) floatval($match[2]);
                }
                if (!isset($languages[$match[2]])) {
                    $languages[$match[2]] = strtolower($match[1]);
                }
            }
        }
        krsort($languages);
        return $languages;
    }

    // compare two parsed arrays of language tags and find the matches
    public static function findMatches($accepted, $available) {
        $matches = array();
        $any = false;
        foreach ($available as $availableLocale => $availableName) {
            foreach ($accepted as $acceptedQuality => $acceptedLocale) {
            $acceptedQuality = floatval($acceptedQuality);
            if ($acceptedQuality === 0.0) continue;
                if ($acceptedLocale === '*') {
                    $any = true;
                }
                $matchingGrade = self::matchLanguage($acceptedLocale, $availableLocale);
                if ($matchingGrade > 0) {
                    $q = ($acceptedQuality * $matchingGrade);
                    if (!array_key_exists($availableLocale, $matches) || $matches[$availableLocale] < $q) {
                        $matches[$availableLocale] = $q;
                    }
                }
            }
        }
        if (count($matches) === 0 && $any) {
            $matches = $available;
        }
        arsort($matches);
        return $matches;
    }


    /**
     * compare two language tags and distinguish the degree of matching
     * edit: actually matching "en-us" with "en" will always return "1"
     * @param $a [] user-accepted
     * @param $b [] backend-available
     * @return float|int
     */
    public static function matchLanguage($a, $b) {
        // convert 'en-US' to 'en-us'
        $b = strtolower($b);
        $a = explode('-', $a);
        $b = explode('-', $b);
        $perfect_match = false;
        for ($i=0, $n=min(count($a), count($b)); $i<$n; $i++) {
            if ($a[$i] !== $b[$i]) break;
            if (count($a) == count($b) && $i == $n-1) {
                $perfect_match = true;
            }
        }

        $val = $i === 0 ? 0 : (float) $i / count($a);
        return $perfect_match ? 2 : $val;
    }

}