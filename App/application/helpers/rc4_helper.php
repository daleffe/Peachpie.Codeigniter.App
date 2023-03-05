<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * RC4 helper
 */

 require_once APPPATH . 'third_party/rc4.php';

 if (!function_exists('_rc4')) {
     function _rc4($data, $key = '') {
         if (empty(trim($key)))
         {
             $CI = & get_instance();
             $key = $CI->config->item('encryption_key');
         }

         if (empty(trim($key)))
         {
             show_error('In order to use the RC4 helper you are required to set an encryption key in your config file.');
         }

         return rc4($key,$data);
     }
 }

 if (!function_exists('rc4_encrypt')) {
     function rc4_encrypt($plain_text, $key = '') {
         return bin2hex(_rc4(base64_encode($plain_text),$key));
     }
 }

 if (!function_exists('rc4_decrypt')) {
     function rc4_decrypt($encrypted_text, $key = '') {
         return base64_decode(_rc4(hex2bin($encrypted_text), $key));
     }
 }

/* End of file */