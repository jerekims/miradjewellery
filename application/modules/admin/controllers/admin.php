<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	public $logged_in;

	function __construct()
    {

        
        $this->load->model('home/home_model');
        
        parent::__construct();
          
    }


    function index()
    {
        $data[''] = '';
        $data['admin_title'] = 'Dashboard';
        $data['admin_subtitle'] = 'Overall Statistics';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/v_admin';
        $data['admin_footer'] = 'admin/footer';
        
        
        $this->template->call_admin_template($data);
    }


    

	

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */