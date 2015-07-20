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
        $data['top_navbar1'] = 'home/navbar_view1';
        $data['content_page'] = 'home/v_admin';
        $data['main_footer'] = 'home/footer_view1';
        
        
        $this->template->call_admin_template($data);
    }


    

	

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */