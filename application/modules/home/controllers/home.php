<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public $logged_in;

	function __construct()
    {

        
        $this->load->model('home/home_model');
        
<<<<<<< HEAD
        parent::__construct();
          
    }

=======
        $this->load->library('form_validation');

        parent::__construct();

        if ($this->session->userdata('logged_in')) {
          $this->logged_in = TRUE;
         } else {
          //$this->logged_in = FASLE;
         }
          
    }

	// public function index()
	// {
 //     $this->load->view('v_home');
	// }
>>>>>>> 7bf0a834e3fa36eb58cb4040694c248799fa105a

    function index()
    {
        $data[''] = '';
        $data['top_navbar1'] = 'home/navbar_view1';
        $data['content_page'] = 'home/v_home';
        $data['main_footer'] = 'home/footer_view1';
        
        
<<<<<<< HEAD
        $this->template->call_home_template($data);
    }


    

	
=======
        $this->template->call_template($data);
    }

	




>>>>>>> 7bf0a834e3fa36eb58cb4040694c248799fa105a

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */