<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public $logged_in;

     /* class constructor
    ____________________________________________________________*/

	function __construct()
    {

        
        
        $this->load->model('home_model');
       // $this->load->model('product_model');

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
        $products=$this->home_model->category_product($catid=Null);
       //echo "<pre>";print_r($products);echo "</pre>";die();
        if( !empty( $products)){
            foreach ($products as $key => $product) {
            $prod_cat['prod_category'][]=$product;
            // echo "<pre>";print_r($product);echo "</pre>";die();
            }
         
           $data['all_product_category']=$prod_cat;
           //echo "<pre>";print_r($prod_cat);echo "</pre>";die();
        }
        $data['navbarcategory'] = $this->create_category_nav();

        //$data['products']=$this->allproduct();

        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_home';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);

    }
    

    /*
    function for displaying the navigation bar
    ________________________________________________________________*/

    function create_category_nav(){
        $categories=$this->home_model->get_categories();
        $data ='';
        $data.='<li class="categories">';
        $data.='<a href="'.base_url().'index.php/home">View All Products</a></li>';
        if( !empty($categories)){
            foreach ($categories as $key => $category) {
               $data.='<li><a href="'.base_url().'index.php/home/product_category/'.$category['Category id'].'">'.$category['Category Name'].'</a></li>';
                 //$data.='<li><a href="'.base_url().'index.php/home/product_category/'.$category['Category id'].'">'.$category['Category Name'].'</a></li>';

            }
        }
        return $data;
    }

    function get_titles(){
        $titles=$this->home_model->get_titles();
       $data="";
            foreach ($titles as $key => $title) {
               $data.='<option value="'.$title['Title_id'].'">';
               $data.=$title['Title_name'];
               $data.='</option>';
            }
        
        return $data;
    }

    /*dispaly of product based on the category
    _______________________________________________________*/

    function product_category($catid){

        $products=$this->home_model->category_product($catid);
       //echo "<pre>";print_r($products);echo "</pre>";die();
        if( !empty( $products)){
            foreach ($products as $key => $product) {
            $prod_cat['prod_category'][]=$product;
            // echo "<pre>";print_r($product);echo "</pre>";die();
            }
         
           $data['all_product_category']=$prod_cat;
           //echo "<pre>";print_r($prod_cat);echo "</pre>";die();
        }
    
        $data['navbarcategory'] = $this->create_category_nav();
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_product_category';
        $data['main_footer']='home/footer_view1';
        //echo "<pre>";print_r($data);echo "</pre>";die();

        $this->template->call_home_template($data);
         
    }


    /*displaying individual products from the database
    ___________________________________________________________*/

    function individual_product($pid=NULL){

        $sproduct=$this->home_model->getproduct($pid);
        //echo "<pre>";print_r($sproduct);echo "</pre>";die();
        $data['single_product']=$sproduct;
        //echo "<pre>";print_r($sproduct);echo "</pre>";die();
        $data['navbarcategory'] = $this->create_category_nav();
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_product';
        $data['main_footer']='home/footer_view1';
        //echo "<pre>";print_r($data);echo "</pre>";die();
        $this->template->call_home_template($data);
    }

   

    function addcart($prodid){
        if($this->session->userdata('logged_in')){
        $custid = $this->session->userdata('cust_id');
        $result = $this->home_model->addtocart($custid, $prodid);

           if($result){
              redirect(base_url().'home/shopcart');
           }else{
              redirect(base_url());
           }

        }else{
            redirect(base_url().'home/login');
        }
    }

    function shopcart(){
        if ($this->session->userdata('logged_in')) {
            $custid = $this->session->userdata('cust_id');

            $result = $this->home_model->opencart($custid);

            if( !empty( $result)){
            foreach ($result as $key => $product) {
            $prod_cat['prod_category'][]=$product;
            // echo "<pre>";print_r($product);echo "</pre>";die();
            }
         
           $data['cart_products']=$prod_cat;
           //echo "<pre>";print_r($prod_cat);echo "</pre>";die();
        }

        $data['navbarcategory'] = $this->create_category_nav();
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/cartpage';
        $data['main_footer']='home/footer_view1';
        //echo "<pre>";print_r($data);echo "</pre>";die();
        $this->template->call_home_template($data);
         } else {
          //$this->logged_in = FASLE;
         }
    }


   
    /* login function
    ____________________________________________________________*/

    function login(){
         $products=$this->home_model->category_product($catid=Null);
       //echo "<pre>";print_r($products);echo "</pre>";die();
        if( !empty( $products)){
            foreach ($products as $key => $product) {
            $prod_cat['prod_category'][]=$product;
            // echo "<pre>";print_r($product);echo "</pre>";die();
            }
         
           $data['all_product_category']=$prod_cat;
           //echo "<pre>";print_r($prod_cat);echo "</pre>";die();
        }

        $data['titles'] = $this->get_titles();

        $data['navbarcategory'] = $this->create_category_nav();

        //$data['products']=$this->allproduct();
        $data['top_navbar1']='home/navbar_view1';
        $data['content_page']='home/v_login';
        $data['main_footer']='home/footer_view1';

        $this->template->call_home_template($data);
    }

    function logout()
    {
        $sess_log = $this->session->userdata('session_id');
        $log = $this->home_model->logoutuser($sess_log);

        $this->session->sess_destroy();
        redirect(base_url().'home');
        //redirect(base_url().'index.php/admin');
    }

    function log_check(){
      if($this->session->userdata('logged_in') == 0){

          redirect(base_url().'home');
          //redirect(base_url().'index.php/admin');
      }else{
        return "logged_in";
      }
   }

    /* user login
    ____________________________________________________________*/
    function user_login(){
         $cname = $this->input->post('customer_email');
         $cpass = $this->input->post('customer_pass');
         $insert = $this->home_model->user_login($cname,$cpass);

         switch($insert){

                case 'logged_in':
                    
                   redirect(base_url());

                break;

                case 'incorrect_password':
                   echo "<pre>";print_r("Incorrect Username or Password");echo "</pre>";die();
                break;

                case 'not_activated':
                echo "<pre>";print_r("Your Account had been deactivated");echo "</pre>";die();
                break;

                default:
                    // echo '';
                break;
            }   

    }

    /* registering new login
    ____________________________________________________________*/

    function addcustomer(){

         $cname = $this->input->post('customername');
         $ctitle = $this->input->post('customertitle');
         $cemail = $this->input->post('customeremail');
         $cpass = $this->input->post('customerpassword');
         //$image=$this->input->post('image');
         //echo'<pre>';print_r($categoryname);echo'</pre>';die();
         $insert = $this->home_model->add_customer($cname,$ctitle,$cemail,$cpass);

         redirect(base_url().'admin/login');
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

    
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */