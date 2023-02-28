<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require_once APPPATH . 'libraries/REST.php';

class Pub extends REST {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();       
    }

    public function index_get()
    {
        $this->response([
            'status' => TRUE,
            'message' => 'Public OK'
        ], REST::HTTP_OK);
    }
}