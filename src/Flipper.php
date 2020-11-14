<?php

class Flipper
{
    public static function flipTheWords($string): string
    {
        $arr = explode(' ', $string);
        foreach ($arr as &$item) {
            $array_word = preg_split('//u', $item, -1, PREG_SPLIT_NO_EMPTY);
            $upperCaseExists = false;
            foreach ($array_word as $key => $symbol) {
                if (!mb_ereg_match('[^а-яА-Яa-zA-z]', $symbol)) {
                    if (!mb_ereg_match('[^А-ЯA-Z]', $symbol)) {
                        $upperCaseExists = true;
                    }
                    static::moveToTop($array_word, $key);
                }
            }
            if ($upperCaseExists) {
                $item = static::mb_ucfirst(mb_strtolower(implode($array_word)));
            } else {
                $item = implode($array_word);
            }

        }
        return implode(' ', $arr);
    }

    public static function moveToTop(&$array, $key)
    {
        $temp = array($key => $array[$key]);
        unset($array[$key]);
        $array = $temp + $array;
    }
    public static function mb_ucfirst($string)
    {
        return mb_strtoupper(mb_substr($string, 0, 1)).mb_substr($string, 1);
    }
}