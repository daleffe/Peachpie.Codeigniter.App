<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Extended Language helpers
 *
 * Requires deprecated lang helper
 */

 // Lower translated text
if (!function_exists('llang')) {
    function llang($text) {
        return strtolower(lang($text));
    }
}

// Upper translated text
if (!function_exists('ulang')) {
    function ulang($text) {
        return strtoupper(lang($text));
    }
}

// First-letter uppercase translated text
if (!function_exists('fulang')) {
    function fulang($text) {
        return ucfirst(strtolower(lang($text)));
    }
}

// First-letter of each word uppercase translated text
if (!function_exists('wulang')) {
    function wulang($text) {
        return ucwords(strtolower(lang($text)));
    }
}