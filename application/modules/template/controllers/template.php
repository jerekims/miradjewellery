<?php 
if (!defined("BASEPATH")) exit("No direct access to the script allowed");

/**
* 
*/

class Template extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
	}


	function call_home_template($data = NULL)

	{
		// echo "You have gained access to the template controller";
		// echo "<pre>";print_r($data);die();
		$this->load->view('template_view', $data);
	}

	function call_log_template($data = NULL)
	{
		// echo "You have gained access to the template controller";
		// echo "<pre>";print_r($data);die();
		$this->load->view('template_view1', $data);
	}


	function call_admin_template($data = NULL)
	{
		// echo "You have gained access to the template controller";
		// echo "<pre>";print_r($data);die();
		$this->load->view('template_view2', $data);
	}

	

}
?>