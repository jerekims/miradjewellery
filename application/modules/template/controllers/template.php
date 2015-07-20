<?php 
if (!defined("BASEPATH")) exit("No direct access to the script allowed");

/**
* 
*/
<<<<<<< HEAD
class Template extends MY_Controller
=======
class template extends MY_Controller
>>>>>>> 7bf0a834e3fa36eb58cb4040694c248799fa105a
{
	
	function __construct()
	{
		parent:: __construct();
	}

<<<<<<< HEAD
	function call_home_template($data = NULL)
=======
	function call_template($data = NULL)
>>>>>>> 7bf0a834e3fa36eb58cb4040694c248799fa105a
	{
		// echo "You have gained access to the template controller";
		// echo "<pre>";print_r($data);die();
		$this->load->view('template_view', $data);
	}

<<<<<<< HEAD
	function call_admin_template($data = NULL)
	{
		// echo "You have gained access to the template controller";
		// echo "<pre>";print_r($data);die();
		$this->load->view('template_view2', $data);
	}

=======
>>>>>>> 7bf0a834e3fa36eb58cb4040694c248799fa105a
}
?>