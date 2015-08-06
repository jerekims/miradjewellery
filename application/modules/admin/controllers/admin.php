<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	public $logged_in;

	function __construct()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('upload');

        if ($this->session->userdata('logged_in')) {
            $this->logged_in = TRUE;
         } else {
            //$this->logged_in = FASLE;
         }
        
        $this->pic_path = realpath(APPPATH . '../uploads/');
        //$this->pic_path = realpath(APPPATH . '..index.php/uploads/');

        $this->load->model('admin_model');
        
        parent::__construct();
          
    }

// Display the first page of the admin module
    function index()
    {

        $data['log_navbar'] = 'admin/log_header';
        $data['log_content'] = 'admin/v_log';
        $data['log_footer'] = 'admin/log_footer';
        
        
        $this->template->call_log_template($data);
    }

   function log_check(){
      if($this->session->userdata('logged_in') == 0){

          redirect(base_url().'admin');
          //redirect(base_url().'index.php/admin');
      }else{
        return "logged_in";
      }
   }


    function logout()
    {
        $sess_log = $this->session->userdata('session_id');
        $log = $this->admin_model->logoutuser($sess_log);

        $this->session->sess_destroy();
        redirect(base_url().'admin');
        //redirect(base_url().'index.php/admin');
    }

    function dashboard(){
 
        $this->log_check();

        $email = $this->session->userdata('emp_email');

        $passcheck = $this->admin_model->passcheck($email);

        if($passcheck == 'e10adc3949ba59abbe56e057f20f883e'){
            $passmessage = "Remember to change your password";
        }

        $data['clientnumber'] = $this->getclientnumber();
        $data['ordernumber'] = $this->getordernumber();
        $data['commentnumber'] = $this->getcommentnumber();
        $data['productnumber'] = $this->getproductnumber();


        $data['all_categories'] = $this->allcategories('table');
        $data['all_administrators'] = $this->allemployees('table');
        $data['all_products'] = $this->allproducts('table');

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Overall Statistics';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/v_admin';
        $data['admin_footer'] = 'admin/footer';
        
        $data['passmessage'] = $passmessage;

        $this->template->call_admin_template($data);
    }

    public function getclientnumber()
    {
          $results = $this->admin_model->clientnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getproductnumber()
    {
          $results = $this->admin_model->productnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getcommentnumber()
    {
          $results = $this->admin_model->commentnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getordernumber()
    {
          $results = $this->admin_model->ordernumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    function validate_member()
    {
        
            $username = $this->input->post('useremail');
            $passw1 = md5($this->input->post('userpassword'));

            $result = $this->admin_model->log_member($username,$passw1);      
            
             //echo '<pre>';print_r($result);echo'</pre>';die;
            switch($result){

                case 'logged_in':
                    
                    switch($this->session->userdata('level_id')){

                        // Level 1 Admin
                        
                        case '1':
                          echo json_encode(array(
                          'level' => 'superadmin',
                          'state' => 'success',
                          'subject' => 'Log Success',
                          'message'=> 'Logged in successfully'
                          ));
                          
                        break;

                        // Level 2 Manager

                        case '2':
                        echo json_encode(array(
                          'level' => 'manager',
                          'state' => 'success',
                          'subject' => 'Log Success',
                          'message'=> 'Logged in successfully'
                        ));
                        break;

                        // Level 3 Stock Manager

                        case '3':
                          echo json_encode(array(
                          'level' => 'stockmanager',
                          'state' => 'success',
                          'subject' => 'Log Success',
                          'message'=> 'Logged in successfully'
                          ));
                          
                        break;
                    }

                break;

                case 'incorrect_password':
                   echo json_encode(array(
                    'state' => 'error',
                    'subject' => 'Incorrect Password',
                    'message'=> 'Incorrect username or Password. Please try again...'
                   ));
                break;

                case 'not_activated':
                echo json_encode(array(
                    'state' => 'error',
                    'subject' => 'Not Activated',
                    'message'=> 'Your account is not activated'
                   ));

                    // $data['new_user'] = 'Your account is not activated';

                    // $data['log_navbar'] = 'admin/log_header';
                    // $data['log_content'] = 'admin/v_log';
                    // $data['log_footer'] = 'admin/log_footer';

                    // $this->template->call_log_template($data);
                break;

                default:
                    // echo '';
                break;
            }   
        
    }  

     

    // Display of other pages
    
    function clients()
    {
       $this->log_check();

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Clients';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/clients';
        $data['admin_footer'] = 'admin/footer';
        
        $data['all_clients'] = $this->allclients('table');
        
        $this->template->call_admin_template($data);
    }

     function orders()
    {
       $this->log_check();

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Orders';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/orders';
        $data['admin_footer'] = 'admin/footer';

        $data['all_orders'] = $this->allorders('table');
        
        
        $this->template->call_admin_template($data);
    }

     function comments()
    {
        $this->log_check();

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Comments';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/comments';
        $data['admin_footer'] = 'admin/footer';

        $data['all_comments'] = $this->allcomments('table');
        
        
        $this->template->call_admin_template($data);
    }
    
    function categories()
    {
        $this->log_check();
        $data['all_categories'] = $this->allcategories('table'); 

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Category';
        $data['admin_navbar'] = 'admin/header';//header.php file
        $data['admin_sidebar'] = 'admin/sidebar';//sidebar.php file
        $data['admin_content'] = 'admin/category';//category.php file
        $data['admin_footer'] = 'admin/footer';//footer.php file

        
        
        $this->template->call_admin_template($data);
    }


     function employees()
    {
        $this->log_check();
        $data['all_administrators'] = $this->allemployees('table'); 

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Employee';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/administrators';
        $data['admin_footer'] = 'admin/footer';

        
        
        $this->template->call_admin_template($data);
    }
 
    function addcategory()
    {
        
        $this->log_check();
        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Add Category';
        $data['admin_navbar'] = 'admin/header';//header.php file
        $data['admin_sidebar'] = 'admin/sidebar';//sidebar.php file
        $data['admin_content'] = 'admin/addcategory';//addcategory.php file
        $data['admin_footer'] = 'admin/footer';//footer.php file

        
        
        $this->template->call_admin_template($data);
    }

    function addemployee()
    {
        
        $this->log_check();
        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Add Employee';
        $data['admin_navbar'] = 'admin/header';//header.php file
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/addadministrator';
        $data['admin_footer'] = 'admin/footer';

        
        
        $this->template->call_admin_template($data);
    }

    function allclients($type)
    {
        $display = '';
        $customers = $this->admin_model->get_all_clients();
            //echo "<pre>";print_r($customers);echo "</pre>";die();
        

        $count = 0;


      // creating arrays for both pdf and excel for data storage and transfer
        $column_data = $row_data = array();

        // display used for table
        $display .= "<tbody>";

        // html_body Used for the pdf
        $html_body = '
        <table class="data-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Customer ID</th>
            <th>Title</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Date Registered</th>
            <th>Customer Status</th>
        </tr> 
        </thead>
        <tbody>
        <ol type="a">';

        foreach ($customers as $key => $data) {
            $count++;
                if ($data['Customer Status'] == 1) {
                    $state = '<span class="label label-info">Activated</span>';
                    $states = 'Activated';
                } else if ($data['Customer Status'] == 0) {
                    $state = '<span class="label label-danger">Deactivated</span>';
                    $states = 'Deactivated';
                }

        switch ($type) {
            case 'table':
                $display .= '<tr>';
                $display .= '<td class="centered">'.$count.'</td>';
                $display .= '<td class="centered">'.$data['Customer ID'].'</td>';
                $display .= '<td class="centered">'.$data['Customer Title'].'</td>';
                $display .= '<td class="centered">'.$data['Customer Name'].'</td>';
                $display .= '<td class="centered">'.$data['Customer Email'].'</td>';
                $display .= '<td class="centered">'.$data['Date Registered'].'</td>';
                $display .= '<td class="centered">'.$state.'</td>';

                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/viewclient/'.$data['Customer ID'].'"><i class="fa fa-eye black"></i></a></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/admin/viewclient/'.$data['Customer ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'admin/clientupdate/clientdelete/'.$data['Customer ID'].'"><i class="fa fa-trash black"></i></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'index.php/admin/clientupdate/clientdelete/'.$data['Customer ID'].'"><i class="fa fa-trash black"></i></td>';
                $display .= '</tr>';

                break;
            
            case 'excel':
               
                 array_push($row_data, array($data['Customer ID'], $data['Customer Title'], $data['Customer Name'], $data['Customer Email'], $data['Date Registered'], $states)); 

                break;

            case 'pdf':

            //echo'<pre>';print_r($categories);echo'</pre>';die();
           
                $html_body .= '<tr>';
                $html_body .= '<td>'.$data['Customer ID'].'</td>';
                $html_body .= '<td>'.$data['Customer Title'].'</td>';
                $html_body .= '<td>'.$data['Customer Name'].'</td>';
                $html_body .= '<td>'.$data['Customer Email'].'</td>';
                $html_body .= '<td>'.$data['Date Registered'].'</td>';
                $html_body .= '<td>'.$states.'</td>';
                $html_body .= "</tr></ol>";

                break;
               }
            }
        
        
        if($type == 'excel'){

            $excel_data = array();
            $excel_data = array('doc_creator' => 'Mirad Jewelries ', 'doc_title' => 'Clients Excel Report', 'file_name' => 'Clients Report', 'excel_topic' => 'Clients');
            $column_data = array('Customer ID','Customer Title','Customer Name','Customer Email','Date Registered','Customer Status');
            $excel_data['column_data'] = $column_data;
            $excel_data['row_data'] = $row_data;

              //echo'<pre>';print_r($excel_data);echo'</pre>';die();

            $this->export->create_excel($excel_data);

        }elseif($type == 'pdf'){
            
            $html_body .= '</tbody></table>';
            $pdf_data = array("pdf_title" => "Clients PDF Report", 'pdf_html_body' => $html_body, 'pdf_view_option' => 'download', 'file_name' => 'Clients Report', 'pdf_topic' => 'Clients');

            //echo'<pre>';print_r($pdf_data);echo'</pre>';die();

            $this->export->create_pdf($pdf_data);

        }else{

            $display .= "</tbody>";

            //echo'<pre>';print_r($display);echo'</pre>';die();

            return $display;
        }

      }

      function allorders($type)
    {
        $display = '';
        $orders = $this->admin_model->get_all_orders();
            //echo "<pre>";print_r($customers);echo "</pre>";die();
        

        $count = 0;


      // creating arrays for both pdf and excel for data storage and transfer
        $column_data = $row_data = array();

        // display used for table
        $display .= "<tbody>";

        // html_body Used for the pdf
        $html_body = '
        <table class="data-table">
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Order No</th>
            <th>Product ID</th>
            <th>Product Price</th>
            <th>Customer ID</th>
            <th>Order Status</th>
            <th>Date Ordered</th>
        </tr> 
        </thead>
        <tbody>
        <ol type="a">';

        foreach ($orders as $key => $data) {
            $count++;
                if ($data['Order Status'] == 1) {
                    $state = '<span class="label label-info">Delivered</span>';
                    $states = 'Activated';
                } else if ($data['Order Status'] == 0) {
                    $state = '<span class="label label-danger">Not Delivered</span>';
                    $states = 'Deactivated';
                }

        switch ($type) {
            case 'table':
                $display .= '<tr>';
                $display .= '<td class="centered">'.$count.'</td>';
                $display .= '<td class="centered">'.$data['Order No'].'</td>';
                $display .= '<td class="centered">'.$data['Product ID'].'</td>';
                $display .= '<td class="centered">'.$data['Product Price'].'</td>';
                $display .= '<td class="centered">'.$data['Customer ID'].'</td>';
                $display .= '<td class="centered">'.$state.'</td>';
                $display .= '<td class="centered">'.$data['Date Ordered'].'</td>';

                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/vieworder/'.$data['Order ID'].'"><i class="fa fa-eye black"></i></a></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/admin/vieworder/'.$data['Order ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Click if Delivered" href = "'.base_url().'admin/orderupdate/orderdelete/'.$data['Order ID'].'"><i class="fa fa-truck black"></i></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Click if Delivered" href = "'.base_url().'index.php/admin/orderupdate/orderdelete/'.$data['Order ID'].'"><i class="fa fa-truck black"></i></td>';
                $display .= '</tr>';

                break;
            
            case 'excel':
               
                 array_push($row_data, array($data['Order ID'], $data['Order No'], $data['Product ID'], $data['Product Price'], $data['Customer ID'], $states, $data['Date Ordered'])); 

                break;

            case 'pdf':

            //echo'<pre>';print_r($categories);echo'</pre>';die();
           
                $html_body .= '<tr>';
                $html_body .= '<td>'.$data['Order ID'].'</td>';
                $html_body .= '<td>'.$data['Order No'].'</td>';
                $html_body .= '<td>'.$data['Product ID'].'</td>';
                $html_body .= '<td>'.$data['Product Price'].'</td>';
                $html_body .= '<td>'.$data['Customer ID'].'</td>';
                $html_body .= '<td>'.$states.'</td>';
                $html_body .= '<td>'.$data['Date Ordered'].'</td>';
                $html_body .= "</tr></ol>";

                break;
               }
            }
        
        
        if($type == 'excel'){

            $excel_data = array();
            $excel_data = array('doc_creator' => 'Mirad Jewelries ', 'doc_title' => 'Orders Excel Report', 'file_name' => 'Orders Report', 'excel_topic' => 'Orders');
            $column_data = array('Order ID','Order No','Product ID','Product Price','Customer ID','Order Status','Date Ordered');
            $excel_data['column_data'] = $column_data;
            $excel_data['row_data'] = $row_data;

              //echo'<pre>';print_r($excel_data);echo'</pre>';die();

            $this->export->create_excel($excel_data);

        }elseif($type == 'pdf'){
            
            $html_body .= '</tbody></table>';
            $pdf_data = array("pdf_title" => "Orders PDF Report", 'pdf_html_body' => $html_body, 'pdf_view_option' => 'download', 'file_name' => 'Orders Report', 'pdf_topic' => 'Orders');

            //echo'<pre>';print_r($pdf_data);echo'</pre>';die();

            $this->export->create_pdf($pdf_data);

        }else{

            $display .= "</tbody>";

            //echo'<pre>';print_r($display);echo'</pre>';die();

            return $display;
        }

      }

      function allcomments($type)
    {
        $display = '';
        $comments = $this->admin_model->get_all_comments();
            //echo "<pre>";print_r($customers);echo "</pre>";die();
        

        $count = 0;


      // creating arrays for both pdf and excel for data storage and transfer
        $column_data = $row_data = array();

        // display used for table
        $display .= "<tbody>";

        // html_body Used for the pdf
        $html_body = '
        <table class="data-table">
        <thead>
        <tr>
            <th>Comment ID</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date Sent</th>
        </tr> 
        </thead>
        <tbody>
        <ol type="a">';

        foreach ($comments as $key => $data) {
            $count++;
                

        switch ($type) {
            case 'table':
                $display .= '<tr>';
                $display .= '<td class="centered">'.$count.'</td>';
                $display .= '<td class="centered">'.$data['Comment Subject'].'</td>';
                $display .= '<td class="centered">'.$data['Comment Message'].'</td>';
                $display .= '<td class="centered">'.$data['Date Sent'].'</td>';

                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/viewcomment/'.$data['Comment ID'].'"><i class="fa fa-eye black"></i></a></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/admin/viewcomment/'.$data['Comment ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'admin/commentupdate/commentdelete/'.$data['Comment ID'].'"><i class="fa fa-trash black"></i></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'index.php/admin/commentupdate/commentdelete/'.$data['Comment ID'].'"><i class="fa fa-trash black"></i></td>';
                $display .= '</tr>';

                break;
            
            case 'excel':
               
                 array_push($row_data, array($data['Comment ID'], $data['Comment Subject'], $data['Comment Message'], $data['Date Sent'])); 

                break;

            case 'pdf':

            //echo'<pre>';print_r($categories);echo'</pre>';die();
           
                $html_body .= '<tr>';
                $html_body .= '<td>'.$data['Comment ID'].'</td>';
                $html_body .= '<td>'.$data['Comment Subject'].'</td>';
                $html_body .= '<td>'.$data['Comment Message'].'</td>';
                $html_body .= '<td>'.$data['Date Sent'].'</td>';
                $html_body .= "</tr></ol>";

                break;
               }
            }
        
        
        if($type == 'excel'){

            $excel_data = array();
            $excel_data = array('doc_creator' => 'Mirad Jewelries ', 'doc_title' => 'Comments Excel Report', 'file_name' => 'Comments Report', 'excel_topic' => 'Comments');
            $column_data = array('Comment ID','Comment Subject','Comment Message','Date Sent');
            $excel_data['column_data'] = $column_data;
            $excel_data['row_data'] = $row_data;

              //echo'<pre>';print_r($excel_data);echo'</pre>';die();

            $this->export->create_excel($excel_data);

        }elseif($type == 'pdf'){
            
            $html_body .= '</tbody></table>';
            $pdf_data = array("pdf_title" => "Comments PDF Report", 'pdf_html_body' => $html_body, 'pdf_view_option' => 'download', 'file_name' => 'Comments Report', 'pdf_topic' => 'Comments');

            //echo'<pre>';print_r($pdf_data);echo'</pre>';die();

            $this->export->create_pdf($pdf_data);

        }else{

            $display .= "</tbody>";

            //echo'<pre>';print_r($display);echo'</pre>';die();

            return $display;
        }

      }



    function allcategories($type)
    {
        $display = '';
        $categories = $this->admin_model->get_all_categories();
        // echo "<pre>";print_r($active_job_groups);die();

        $count = 0;


      // creating arrays for both pdf and excel for data storage and transfer
        $column_data = $row_data = array();

        // display used for table
        $display .= "<tbody>";

        // html_body Used for the pdf
        $html_body = '
        <table class="data-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Category Status</th>
        </tr> 
        </thead>
        <tbody>
        <ol type="a">';

        foreach ($categories as $key => $data) {
            $count++;
                if ($data['Category Status'] == 1) {
                    $state = '<span class="label label-info">Activated</span>';
                    $states = 'Activated';
                } else if ($data['Category Status'] == 0) {
                    $state = '<span class="label label-danger">Deactivated</span>';
                    $states = 'Deactivated';
                }

        switch ($type) {
            case 'table':
                $display .= '<tr>';
                $display .= '<td class="centered">'.$count.'</td>';
                $display .= '<td class="centered">'.$data['Category Name'].'</td>';
                $display .= '<td class="centered">'.$state.'</td>';

                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/viewcategory/'.$data['Category ID'].'"><i class="fa fa-eye black"></i></a></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/admin/viewcategory/'.$data['Category ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'admin/catupdate/catdelete/'.$data['Category ID'].'"><i class="fa fa-trash black"></i></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'index.php/admin/catupdate/catdelete/'.$data['Category ID'].'"><i class="fa fa-trash black"></i></td>';
                $display .= '</tr>';

                break;
            
            case 'excel':
               
                 array_push($row_data, array($data['Category ID'], $data['Category Name'], $states)); 

                break;

            case 'pdf':

            //echo'<pre>';print_r($categories);echo'</pre>';die();
           
                $html_body .= '<tr>';
                $html_body .= '<td>'.$data['Category ID'].'</td>';
                $html_body .= '<td>'.$data['Category Name'].'</td>';
                $html_body .= '<td>'.$states.'</td>';
                $html_body .= "</tr></ol>";

                break;
               }
            }
        
        
        if($type == 'excel'){

            $excel_data = array();
            $excel_data = array('doc_creator' => 'Mirad Jewelries ', 'doc_title' => 'Category Excel Report', 'file_name' => 'Category Report', 'excel_topic' => 'Category');
            $column_data = array('Category ID','Category Name','Category Status');
            $excel_data['column_data'] = $column_data;
            $excel_data['row_data'] = $row_data;

              //echo'<pre>';print_r($excel_data);echo'</pre>';die();

            $this->export->create_excel($excel_data);

        }elseif($type == 'pdf'){
            
            $html_body .= '</tbody></table>';
            $pdf_data = array("pdf_title" => "Category PDF Report", 'pdf_html_body' => $html_body, 'pdf_view_option' => 'download', 'file_name' => 'Category Report', 'pdf_topic' => 'Category');

            //echo'<pre>';print_r($pdf_data);echo'</pre>';die();

            $this->export->create_pdf($pdf_data);

        }else{

            $display .= "</tbody>";

            //echo'<pre>';print_r($display);echo'</pre>';die();

            return $display;
        }

      }



      function allemployees($type)
    {
        $display = '';
        $administrators = $this->admin_model->get_all_administrators();
        // echo "<pre>";print_r($administrators);die();

        $count = 0;


      // creating arrays for both pdf and excel for data storage and transfer
        $column_data = $row_data = array();

        // display used for table
        $display .= "<tbody>";

        // html_body Used for the pdf
        $html_body = '
        <table class="data-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Occupation</th>
            <th>Date Registered</th>
            <th>Status</th>
        </tr> 
        </thead>
        <tbody>
        <ol type="a">';

        foreach ($administrators as $key => $data) {
            $count++;
                if ($data['Employee Status'] == 1) {
                    $state = '<span class="label label-info">Activated</span>';
                    $states = 'Activated';
                } else if ($data['Employee Status'] == 0) {
                    $state = '<span class="label label-danger">Deactivated</span>';
                    $states = 'Deactivated';
                }

                if ($data['Employee Level'] == 1) {
                    $level = 'System Admin';
                } else if ($data['Employee Level'] == 2) {
                    $level = 'Manager';
                } else if ($data['Employee Level'] == 3) {
                    $level = 'Stock Manager';
                } else if ($data['Employee Level'] == 4) {
                    $level = 'Consultant';
                }

        switch ($type) {
            case 'table':
                $display .= '<tr>';
                $display .= '<td class="centered">'.$count.'</td>';
                $display .= '<td class="centered">'.$data['Employee Name'].'</td>';
                $display .= '<td class="centered">'.$data['Employee Email'].'</td>';
                $display .= '<td class="centered">'.$level.'</td>';
                $display .= '<td class="centered">'.$data['Date Registered'].'</td>';
                $display .= '<td class="centered">'.$state.'</td>';

                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/viewemployee/'.$data['Employee ID'].'"><i class="fa fa-eye black"></i></a></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/admin/viewemployee/'.$data['Employee ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'admin/empupdate/empdelete/'.$data['Employee ID'].'"><i class="fa fa-trash black"></i></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'index.php/admin/empupdate/empdelete/'.$data['Employee ID'].'"><i class="fa fa-trash black"></i></td>';
                $display .= '</tr>';

                break;
            
            case 'excel':
               
                 array_push($row_data, array($data['Employee ID'], $data['Employee Name'], $data['Employee Email'], $level, $data['Date Registered'], $states)); 

                break;

            case 'pdf':

            //echo'<pre>';print_r($categories);echo'</pre>';die();
           
                $html_body .= '<tr>';
                $html_body .= '<td>'.$data['Employee ID'].'</td>';
                $html_body .= '<td>'.$data['Employee Name'].'</td>';
                $html_body .= '<td>'.$data['Employee Email'].'</td>';
                $html_body .= '<td>'.$level.'</td>';
                $html_body .= '<td>'.$data['Date Registered'].'</td>';
                $html_body .= '<td>'.$states.'</td>';
                $html_body .= "</tr></ol>";

                break;
               }
            }
        
        
        if($type == 'excel'){

            $excel_data = array();
            $excel_data = array('doc_creator' => 'Mirad Jewelries ', 'doc_title' => 'Emploee Excel Report', 'file_name' => 'Employee Report', 'excel_topic' => 'Employee');
            $column_data = array('Employee ID','Employee Name','Employee Email','Occupation','Date Registered','Employee Status');
            $excel_data['column_data'] = $column_data;
            $excel_data['row_data'] = $row_data;

              //echo'<pre>';print_r($excel_data);echo'</pre>';die();

            $this->export->create_excel($excel_data);

        }elseif($type == 'pdf'){
            
            $html_body .= '</tbody></table>';
            $pdf_data = array("pdf_title" => "Employee PDF Report", 'pdf_html_body' => $html_body, 'pdf_view_option' => 'download', 'file_name' => 'Employee Report', 'pdf_topic' => 'Employee');

            //echo'<pre>';print_r($pdf_data);echo'</pre>';die();

            $this->export->create_pdf($pdf_data);

        }else{

            $display .= "</tbody>";

            //echo'<pre>';print_r($display);echo'</pre>';die();

            return $display;
        }

      }


      // enables the registration for a new category
      function employeeregistration(){
         
        $this->form_validation->set_rules('employeeemail', 'Employee Email', 'trim|required|xss_clean|is_unique[employees.emp_email]');

        $employeename = $this->input->post('employeename');
        $employeeemail = $this->input->post('employeeemail');
        $employeeoccupation = $this->input->post('employeeoccupation');
        // $employeepass = md5($this->input->post('defpass'));
        $employeestatus = $this->input->post('employeestatus');


        $path = base_url().'uploads/users/';
        //$path = base_url().'index.php/uploads/users/';
               $config['upload_path'] = 'uploads/employees/';
               //$config['upload_path'] = 'index.php/uploads/employees/';
               $config['allowed_types'] = 'jpeg|jpg|png|gif';
               $config['encrypt_name'] = TRUE;
               $this->load->library('upload', $config);
               $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('employeepicture'))
            {
               $error = array('error' => $this->upload->display_errors());

               print_r($error);die;
            }
             else
             {
               
                $data = array('upload_data' => $this->upload->data());
                 foreach ($data as $key => $value) {
                  //print_r($data);die;
                  $path = base_url().'uploads/employees/'.$value['file_name'];
                  //$path = base_url().'index.php/uploads/employees/'.$value['file_name'];
                
                  }



        $insert = $this->admin_model->register_employee($employeename, $employeeemail, $employeeoccupation, $path, $employeestatus);

        return $insert;
        }
    
      }


      function categoryregistration(){
         //echo"reaching";exit;
        $this->form_validation->set_rules('categoryname', 'Category Name', 'trim|required|xss_clean|is_unique[category.catname]');
        
        $categoryname = $this->input->post('categoryname');
        $categorystatus = $this->input->post('categorystatus');


        // transfers data into the admin_model.php in the models for admin module into a function called reigister_category() with parameters
        $insert = $this->admin_model->register_category($categoryname, $categorystatus);

        return $insert;
        
    
      }
      


      // enables the editing of the selected category
      public function editcategory()
    {
        $id = $this->input->post('editcategoryid');
        $category_name = $this->input->post('editcategoryname');
        $category_status = $this->input->post('editcategorystatus');

        // transfers data into the admin_model.php in the models for admin module into a function called category_update() with parameters
        $result = $this->admin_model->category_update($id,$category_name,$category_status);
        

        $this->categories();
        
    }

    public function editemployee()
    {
        $id = $this->input->post('editemployeeid');
        $employee_name = $this->input->post('editemployeename');
        $employee_status = $this->input->post('editemployeestatus');

        if($this->input->post('editemployeepassword')){
            $employee_password = md5($this->input->post('editemployeepassword'));
        }else{
            $employee_password = $this->input->post('employeepassword');
        }


        $employee_email = $this->input->post('editemployeeemail');
        $employee_occupation = $this->input->post('editemployeeoccupation');

        
        $result = $this->admin_model->administrator_update($id,$employee_name, $employee_email, $employee_password, $employee_occupation, $employee_status);
        

        $this->employees();
        
    }


    public function editorder()
    {
        $id = $this->input->post('editorderid');      
        $order_status = $this->input->post('editorderstatus');
        
        $result = $this->admin_model->order_update($id, $order_status);
        

        $this->orders();
        
    }

    public function editcomment()
    {
        $id = $this->input->post('editcommentid');      
        $comment_status = $this->input->post('editcommentstatus');
        
        $result = $this->admin_model->comment_update($id, $comment_status);
        

        $this->comments();
        
    }

     public function editclient()
    {
        $id = $this->input->post('editcustomerid');      
        $customer_status = $this->input->post('editclientstatus');
        
        $result = $this->admin_model->client_update($id, $customer_status);
        

        $this->clients();
        
    }


    // function that passes the id to be viewed and displays it in the viewcategory file
    function viewcategory($id)
    {
        $this->log_check();
        $userdet = array();

        // uses the id to acquire details from the admin_model.php in a function called categoryprofile() with the id as the parameter
        $results = $this->admin_model->categoryprofile($id);

        foreach ($results as $key => $values) {
            $details['category'][] = $values;  
        }
        
        
        $data['categorydetails'] = $details;//uses result from the foreach above to and passes it into key -> categorydetails to be used as reference


        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'View Category';
        $data['admin_navbar'] = 'admin/header';//header.php file
        $data['admin_sidebar'] = 'admin/sidebar';//sidebar.php file
        $data['admin_content'] = 'admin/viewcategory';//viewcategory.php file
        $data['admin_footer'] = 'admin/footer';//footer.php file

        
        
        $this->template->call_admin_template($data);
 
    }


    function viewemployee($id)
    {
        $this->log_check();
        $userdet = array();

        
        $results = $this->admin_model->administratorprofile($id);

        foreach ($results as $key => $values) {
            $details['employees'][] = $values;  
        }
        
        
        $data['employeedetails'] = $details;


        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'View Employee';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/viewadministrator';
        $data['admin_footer'] = 'admin/footer';

        
        
        $this->template->call_admin_template($data);
 
    }

    function viewcomment($id)
    {
        $this->log_check();
        $userdet = array();

        
        $results = $this->admin_model->commentprofile($id);

        foreach ($results as $key => $values) {
            $details['comments'][] = $values;  
        }
        
        
        $data['commentdetails'] = $details;


        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'View Comment';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/viewcomment';
        $data['admin_footer'] = 'admin/footer';

        
        
        $this->template->call_admin_template($data);
 
    }

    function vieworder($id)
    {
        $this->log_check();
        $userdet = array();

        
        $results = $this->admin_model->orderprofile($id);

        foreach ($results as $key => $values) {
            $details['orders'][] = $values;  
        }
        
        
        $data['orderdetails'] = $details;


        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'View Order';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/vieworder';
        $data['admin_footer'] = 'admin/footer';

        
        
        $this->template->call_admin_template($data);
 
    }

    function viewclient($id)
    {
        $this->log_check();
        $userdet = array();

        
        $results = $this->admin_model->clientprofile($id);

        foreach ($results as $key => $values) {
            $details['customers'][] = $values;  
        }
        
        
        $data['customerdetails'] = $details;


        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'View Client';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/viewclient';
        $data['admin_footer'] = 'admin/footer';

        
        
        $this->template->call_admin_template($data);
 
    }

     //function that allows other updates for specific category with $cat_id
      function catupdate($type, $cat_id)
    {
        $update = $this->admin_model->updatecat($type, $cat_id);

        if($update)
        {
            switch ($type) {

                case 'catdelete':
                    $this->categories();
                    break;

                case 'catrestore':
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    function clientupdate($type, $client_id)
    {
        $update = $this->admin_model->updateclient($type, $client_id);

        if($update)
        {
            switch ($type) {

                case 'clientdelete':
                    $this->clients();
                    break;

                case 'clientrestore':
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    function commentupdate($type, $comm_id)
    {
        $update = $this->admin_model->updatecomment($type, $comm_id);

        if($update)
        {
            switch ($type) {

                case 'commentdelete':
                    $this->comments();
                    break;

                case 'commentrestore':
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

    function orderupdate($type, $or_id)
    {
        $update = $this->admin_model->updateorder($type, $or_id);

        if($update)
        {
            switch ($type) {

                case 'orderdelete':
                    $this->orders();
                    break;

                case 'orderrestore':
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }


    function empupdate($type, $emp_id)
    {
        $update = $this->admin_model->updateemp($type, $emp_id);

        if($update)
        {
            switch ($type) {

                case 'empdelete':
                    $this->administrators();
                    break;

                case 'emprestore':
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }




    function products()
    {
        $data['all_products'] = $this->allproducts('table');

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Product';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/v_allproducts';
        $data['admin_footer'] = 'admin/footer';
        
        
        $this->template->call_admin_template($data);

    }
    
    /* displays the  content page  of  the add product
    open the add product page
    ______________________________________________________*/

    function addproduct()
    {
        

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Add Product';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/v_addnewproduct';
        $data['admin_footer'] = 'admin/footer';

        
        
        $this->template->call_admin_template($data);
    }


    /* displays all the products from the  database
    ______________________________________________________*/

    function allproducts($type)
    {
        $display = '';
        $products = $this->admin_model->get_all_products();
        

        $count = 0;


      // creating arrays for both pdf and excel for data storage and transfer
        $column_data = $row_data = array();

        // display used for table
        $display .= "<tbody>";

        // html_body Used for the pdf
        $html_body = '
        <table class="data-table">
        <thead>
        <tr>
            <th>Category Name</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Product Status</th>
        </tr> 
        </thead>
        <tbody>
        <ol type="a">';

        foreach ($products as $key => $data) {
            $count++;
                if ($data['Product Status'] == 1) {
                    $state = '<span class="label label-info">Activated</span>';
                    $states = 'Activated';
                } else if ($data['Product Status'] == 0) {
                    $state = '<span class="label label-danger">Deactivated</span>';
                    $states = 'Deactivated';
                }
                //echo "<pre>";print_r($products);die();

        switch ($type) {
            case 'table':
                $display .= '<tr>';
                //echo'<pre>';print_r($display);echo'</pre>';die();
                $display .= '<td class="centered">'.$count.'</td>';
                $display .= '<td class="centered">'.$data['Product Name'].'</td>';
                $display .= '<td class="centered">'.$data['Product Description'].'</td>';
                $display .= '<td class="centered">'.$data['Product Price'].'</td>';
                $display .= '<td class="centered">'.$state.'</td>';

                // button below used for viewing the specific category. Goes to admin controller into function called viewcategory(), passing the category id as parameter
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/viewproduct/'.$data['Product ID'].'"><i class="fa fa-eye black"></i></a></td>';
                // $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/admin/viewproduct/'.$data['Product ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                // button below used for editing the specific category. Goes to admin controller into function called catupdate(), passing the type of update and the category id as parameter
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'admin/product_status/proddelete/'.$data['Product ID'].'"><i class="fa fa-trash black"></i></td>';
                // $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'index.php/admin/product_status/proddelete/'.$data['Product ID'].'"><i class="fa fa-trash black"></i></td>';
                $display .= '</tr>';
                

                break;
            
            case 'excel':
               
                 array_push($row_data, array($data['Category ID'], $data['Category Name'], $states)); 

                break;

            case 'pdf':

            //echo'<pre>';print_r($categories);echo'</pre>';die();
           
                $html_body .= '<tr>';
                $html_body .= '<td>'.$data['Category ID'].'</td>';
                $html_body .= '<td>'.$data['Category Name'].'</td>';
                $html_body .= '<td>'.$states.'</td>';
                $html_body .= "</tr></ol>";

                break;
               }
            }
        
        
        if($type == 'excel'){

            $excel_data = array();
            $excel_data = array('doc_creator' => 'Mirad Jewelries ', 'doc_title' => 'Category Excel Report', 'file_name' => 'Category Report', 'excel_topic' => 'Category');
            $column_data = array('Category ID','Category Name','Category Status');
            $excel_data['column_data'] = $column_data;
            $excel_data['row_data'] = $row_data;

              //echo'<pre>';print_r($excel_data);echo'</pre>';die();

            $this->export->create_excel($excel_data);

        }elseif($type == 'pdf'){
            
            $html_body .= '</tbody></table>';
            $pdf_data = array("pdf_title" => "Category PDF Report", 'pdf_html_body' => $html_body, 'pdf_view_option' => 'download', 'file_name' => 'Category Report', 'pdf_topic' => 'Category');

            //echo'<pre>';print_r($pdf_data);echo'</pre>';die();

            $this->export->create_pdf($pdf_data);

        }else{            

             //echo'<pre>';print_r($display);echo'</pre>';die();

        //    return $display;
        // }
            $display .= "</tbody>";

            //echo'<pre>';print_r($display);echo'</pre>';die();

            //return $display;
        }
            return $display;
    }

    /* functionadding new  product
    ______________________________________________________*/

    function addnewproduct()
    {
         // $this->form_validation->set_rules('categoryname','trim|required|xss_clean');
         // $this->form_validation->set_rules('productname','trim|required|xss_clean');
         // $this->form_validation->set_rules('prod_description','trim|required|xss_clean');
         // $this->form_validation->set_rules('price','trim|required|xss_clean');
         // $this->form_validation->set_rules('image','trim|required|xss_clean');

         $categoryname = $this->input->post('productcategory');
         $pname = $this->input->post('productname');
         $pdescription = $this->input->post('prod_description');
         $price = $this->input->post('price');
         //$image=$this->input->post('image');
         $prodstatus=$this->input->post('productstatus');
         //echo'<pre>';print_r($categoryname);echo'</pre>';die();
         $insert = $this->admin_model->add_product($categoryname,$pname,$pdescription,$price,$prodstatus);

         $this->products();
    }

    /* function for editing single product
    ______________________________________________________*/

    function editproduct()
    {
         // $this->form_validation->set_rules('productcategory','trim|required|xss_clean');
         // $this->form_validation->set_rules('productname','trim|required|xss_clean');
         // $this->form_validation->set_rules('prod_description','trim|required|xss_clean');
         // $this->form_validation->set_rules('price','trim|required|xss_clean');
         // $this->form_validation->set_rules('image','trim|required|xss_clean');

        $prodid=$this->input->post('editproductid');
        $prodcategory=$this->input->post('editcategoryname');
        $pname=$this->input->post('editproductname');
        $pdescription=$this->input->post('editprod_description');
        $price=$this->input->post('editprice');
        // $pimage=$this->input->post('image');
        $prodstatus=$this->input->post('editproductstatus');
        //echo'<pre>';print_r($prodid);echo'</pre>';die();

        $result = $this->admin_model->update_product($prodid,$prodcategory, $pname,$pdescription,$price,$prodstatus);

        $this->products();
    }

    /* function for viweing single product
    ______________________________________________________*/

    function viewproduct($id)
    {
        $product_details=array();
        $results=$this->admin_model->productprofile($id);

        foreach ($results as $key => $values) {
            $details['products'][] = $values;  
        }
        $data['productdetails'] = $details;

        $data['admin_title']='Manager';
        $data['admin_subtitle']='View Product';
        $data['admin_navbar']='admin/header';
        $data['admin_sidebar']='admin/sidebar';
        $data['admin_content']='admin/v_product';
        $data['admin_footer']='admin/footer';

        //echo'<pre>';print_r($data);echo'</pre>';die();
        $this->template->call_admin_template($data);
    }

     /* function for updating  product state
    ______________________________________________________*/
    function  product_status($type,$prodid)
    {
        $update = $this->admin_model->product_state($type,$prodid);

                if($update){

            switch ($type) {

                case 'prodview':
                    
                    break;

                case 'prodactivate':
                    
                    break;

                case 'prodedit':
                    
                    break;

                case 'proddelete':
                    $this->products();
                    break;

                case 'prodrestore':
                    $this->products();
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }



	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */