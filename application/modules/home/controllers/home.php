<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public $logged_in;

	function __construct()
    {

        
        $this->load->model('home/home_model');
        

        $this->load->library('form_validation');

        parent::__construct();

        if ($this->session->userdata('logged_in')) {
          $this->logged_in = TRUE;
         } else {
          //$this->logged_in = FASLE;
         }
          
    }



    function index()
    {
        $data[''] = '';
        $data['content_page'] = 'home/v_home';
        
        

        $this->template->call_home_template($data);
    }


    

	


	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */