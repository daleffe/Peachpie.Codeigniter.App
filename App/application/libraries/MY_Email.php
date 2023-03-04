<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Email extends CI_Email
{

  public function clear_debugger_messages()
  {
    $this->_debug_msg = array();
  }

  public function get_debugger_messages()
  {
    return $this->_debug_msg;
  }
}