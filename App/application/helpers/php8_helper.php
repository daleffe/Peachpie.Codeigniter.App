<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PHP 8
 *
 * Support to PHP 8 functions.
 *
 */
if (!function_exists('str_starts_with')) {
    function str_starts_with($haystack, $needle) {
        return (string)$needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0;
    }
}

if (!function_exists('str_ends_with')) {
    function str_ends_with($haystack, $needle) {
        return $needle !== '' && substr($haystack, -strlen($needle)) === (string)$needle;
    }
}

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

if (!function_exists('array_key_first')) {
    function array_key_first(array $array) {
        foreach ($array as $key => $value) {
            return $key;
        }
    }
}

if (!function_exists('array_key_last')) {
    function array_key_last(array $array) {
        end($array);
        return key($array);
    }
}

if (!function_exists('safe_intval')) {
    function safe_intval($value, $default = 0) {
        $value = is_numeric($value) ? intval($value) : $default;
        return is_int($value) ? $value : $default;
    }
}
/* End of file */
