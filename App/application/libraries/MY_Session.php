<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Session extends CI_Session
{
	var $_alert_key = 'alerts';

    /*
	 * Alerts
     */
	public function has_alerts()
	{
		return $this->flashdata($this->_alert_key) !== false || $this->userdata($this->flashdata_key.':new:'.$this->_alert_key) !== false;
	}

	public function output_alerts()
	{
		if ($this->has_alerts())
		{
			return $this->alerts();
		}

		return FALSE;
	}

	public function alerts()
	{
		$alerts = FALSE;

		if ($this->flashdata($this->_alert_key) !== false)
		{
			$alerts = $this->flashdata($this->_alert_key);
		} else if ($this->userdata($this->flashdata_key.':new:'.$this->_alert_key) !== false)
		{
			$alerts = $this->userdata($this->flashdata_key.':new:'.$this->_alert_key);

			// Mark all new flashdata as old
			$this->_flashdata_mark();

			// Delete 'old' flashdata
			$this->_flashdata_sweep();
		}

		return $alerts;
	}

	public function alert_notice($text = '')
	{
		$this->set_alert($text,'alert alert-info');
	}

	public function alert_success($text = '')
	{
		$this->set_alert($text,'alert alert-success');
	}

	public function alert_warning($text = '')
	{
		$this->set_alert($text,'alert alert-warning');
	}

	public function alert_error($text = '')
	{
		$this->set_alert($text,'alert alert-danger');
	}

	public function set_alert($text = '', $class = 'alert alert-info')
	{
		if (!empty($text))
		{
			$this->set_flashdata($this->_alert_key,$this->get_alert($text,$class));
		}
	}

	public function get_alert($text, $class = 'alert alert-primary')
	{
		return '<div' . (empty(trim($class)) ? '' : ' class="' . $class . '"') . ' role="alert">' . trim($text) . '</div>';
	}
}