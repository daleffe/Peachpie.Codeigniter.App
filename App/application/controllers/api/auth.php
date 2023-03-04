<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require_once APPPATH . 'libraries/REST.php';

class Auth extends REST {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function index_post()
    {
        if (empty($this->post()))
        {
            $this->response([
                'status' => FALSE,
                'message' => 'No body data received'
            ], REST::HTTP_LENGTH_REQUIRED);
        }
        else
        {
            $this->response(['data' => $this->post()], REST::HTTP_OK);
        }
    }
}