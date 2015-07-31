<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public $logged_in;

     /* class constructor
    ____________________________________________________________*/

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

    /* index function
    ____________________________________________________________*/


    function index()
    {
        $data['content_page'] = 'home/v_home';
        $data['top_navbar1']='home/navbar_view1';
        $data['main_footer']='home/footer_view1';
        

        $this->template->call_home_template($data);
    }

    /* login function
    ____________________________________________________________*/

    function login(){
        $data['']='';
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_login';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);
    }

     /* contact function
    ____________________________________________________________*/

    function contact(){
        $data['']='';
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_contact';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);
    }

    /* register function
    ____________________________________________________________*/
	
    function register(){
        $data['']='';
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_register';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);
    }

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */