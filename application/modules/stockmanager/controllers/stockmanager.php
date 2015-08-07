<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stockmanager extends MY_Controller {

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

        $this->load->model('stockmanager_model');
        
        parent::__construct();
          
    }

// Display the first page of the stockmanager module
    function index()
    {
        $this->log_check();

        $data['log_navbar'] = 'stockmanager/log_header';
        $data['log_content'] = 'stockmanager/v_log';
        $data['log_footer'] = 'stockmanager/log_footer';
        
        
        $this->template->call_log_template($data);
    }

   function log_check(){
      if($this->session->userdata('logged_in') == 0){

          redirect(base_url().'stockmanager/dashboard');
          //redirect(base_url().'index.php/stockmanager/dashboard');
      }else{
        return "logged_in";
      }
   }


    function logout()
    {
        $sess_log = $this->session->userdata('session_id');
        $log = $this->stockmanager_model->logoutuser($sess_log);

        $this->session->sess_destroy();
        redirect(base_url().'stockmanager/dashboard');
        //redirect(base_url().'index.php/stockmanager/dashboard');
    }

    function dashboard(){
 
        $this->log_check();

        $email = $this->session->userdata('emp_email');

        $passcheck = $this->stockmanager_model->passcheck($email);

        if($passcheck == 'e10adc3949ba59abbe56e057f20f883e'){
            $passmessage = "Remember to change your password";
        }

        
        $data['ordernumber'] = $this->getordernumber();
        $data['commentnumber'] = $this->getcommentnumber();
        $data['productnumber'] = $this->getproductnumber();
        $data['categorynumber'] = $this->getcategorynumber();

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();


        $data['all_categories'] = $this->allcategories('active','table');
        $data['all_orders'] = $this->allorders('active','table');
        $data['all_products'] = $this->allproducts('active','table');

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Overall Statistics';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/v_stockmanager';
        $data['admin_footer'] = 'stockmanager/footer';
        
        $data['passmessage'] = $passmessage;

        $this->template->call_admin_template($data);
    }

    public function getclientnumber()
    {
          $results = $this->stockmanager_model->clientnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getproductnumber()
    {
          $results = $this->stockmanager_model->productnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getcommentnumber()
    {
          $results = $this->stockmanager_model->commentnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getordernumber()
    {
          $results = $this->stockmanager_model->ordernumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getcategorynumber()
    {
          $results = $this->stockmanager_model->categorynumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getdordernumber()
    {
          $results = $this->stockmanager_model->dordernumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getdproductnumber()
    {
          $results = $this->stockmanager_model->dproductnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getdcommentnumber()
    {
          $results = $this->stockmanager_model->dcommentnumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

    public function getdcategorynumber()
    {
          $results = $this->stockmanager_model->dcategorynumber();

          return $results;

          //echo '<pre>'; print_r($results); echo '</pre>';die;
    }

 

     function orders()
    {
       $this->log_check();

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Orders';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/orders';
        $data['admin_footer'] = 'stockmanager/footer';

        $data['all_orders'] = $this->allorders('active','table');
        
        
        $this->template->call_admin_template($data);
    }

    function dorders()
    {
       $this->log_check();

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Delivered Orders';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/dorders';
        $data['admin_footer'] = 'stockmanager/footer';

        $data['all_dorders'] = $this->allorders('inactive','table');
        
        
        $this->template->call_admin_template($data);
    }

     function comments()
    {
        $this->log_check();

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Comments';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/comments';
        $data['admin_footer'] = 'stockmanager/footer';

        $data['all_comments'] = $this->allcomments('active','table');
        
        
        $this->template->call_admin_template($data);
    }

    function dcomments()
    {
        $this->log_check();

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Deactivated Comments';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/dcomments';
        $data['admin_footer'] = 'stockmanager/footer';

        $data['all_dcomments'] = $this->allcomments('inactive','table');
        
        
        $this->template->call_admin_template($data);
    }
    
    function categories()
    {
        $this->log_check();
        $data['all_categories'] = $this->allcategories('active','table'); 

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Category';
        $data['admin_navbar'] = 'stockmanager/header';//header.php file
        $data['admin_sidebar'] = 'stockmanager/sidebar';//sidebar.php file
        $data['admin_content'] = 'stockmanager/category';//category.php file
        $data['admin_footer'] = 'stockmanager/footer';//footer.php file

        
        
        $this->template->call_admin_template($data);
    }

    function dcategories()
    {
        $this->log_check();
        $data['all_dcategories'] = $this->allcategories('inactive','table'); 

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Deactivated Category';
        $data['admin_navbar'] = 'stockmanager/header';//header.php file
        $data['admin_sidebar'] = 'stockmanager/sidebar';//sidebar.php file
        $data['admin_content'] = 'stockmanager/dcategories';//category.php file
        $data['admin_footer'] = 'stockmanager/footer';//footer.php file

        
        
        $this->template->call_admin_template($data);
    }



    

      function allorders($state,$type)
    {
        $display = '';
        switch ($state) {
            case 'active':
               $orders = $this->stockmanager_model->get_all_orders();
                break;

             case 'inactive':
                $orders = $this->stockmanager_model->get_all_dorders();
                break;
            
            default:
                # code...
                break;
        }

        
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

                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'stockmanager/vieworder/'.$data['Order ID'].'"><i class="fa fa-eye black"></i></a></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/stockmanager/vieworder/'.$data['Order ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                // $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Click if Delivered" href = "'.base_url().'stockmanager/orderupdate/orderdelete/'.$data['Order ID'].'"><i class="fa fa-truck black"></i></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Click if Delivered" href = "'.base_url().'index.php/stockmanager/orderupdate/orderdelete/'.$data['Order ID'].'"><i class="fa fa-truck black"></i></td>';
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

      function allcomments($state,$type)
    {
        $display = '';

        switch ($state) {
            case 'active':
                $comments = $this->stockmanager_model->get_all_comments();
                break;

             case 'inactive':
                 $comments = $this->stockmanager_model->get_all_dcomments();
                break;
            
            default:
                # code...
                break;
        }
        
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

                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'stockmanager/viewcomment/'.$data['Comment ID'].'"><i class="fa fa-eye black"></i></a></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/stockmanager/viewcomment/'.$data['Comment ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'stockmanager/commentupdate/commentdelete/'.$data['Comment ID'].'"><i class="fa fa-trash black"></i></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'index.php/stockmanager/commentupdate/commentdelete/'.$data['Comment ID'].'"><i class="fa fa-trash black"></i></td>';
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



    function allcategories($state,$type)
    {
        $display = '';

        switch ($state) {
            case 'active':
                $categories = $this->stockmanager_model->get_all_categories();
                break;

             case 'inactive':
                 $categories = $this->stockmanager_model->get_all_dcategories();
                break;
            
            default:
                # code...
                break;
        }
        
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

                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'stockmanager/viewcategory/'.$data['Category ID'].'"><i class="fa fa-eye black"></i></a></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/stockmanager/viewcategory/'.$data['Category ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                // $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'stockmanager/catupdate/catdelete/'.$data['Category ID'].'"><i class="fa fa-trash black"></i></td>';
                //$display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'index.php/stockmanager/catupdate/catdelete/'.$data['Category ID'].'"><i class="fa fa-trash black"></i></td>';
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


    public function editemployee()
    {
        $id = $this->input->post('editemployeeid');
        $employee_name = $this->input->post('editemployeename');
        

        if($this->input->post('editemployeepassword')){
            $employee_password = md5($this->input->post('editemployeepassword'));
        }else{
            $employee_password = $this->input->post('employeepassword');
        }


        $employee_email = $this->input->post('editemployeeemail');
        $employee_occupation = $this->input->post('editemployeeoccupation');

        
        $result = $this->stockmanager_model->administrator_update($id,$employee_name, $employee_email, $employee_password, $employee_occupation);
        

        $this->employees();
        
    }




    // function that passes the id to be viewed and displays it in the viewcategory file
    function viewcategory($id)
    {
        $this->log_check();
        $userdet = array();

        // uses the id to acquire details from the stockmanager_model.php in a function called categoryprofile() with the id as the parameter
        $results = $this->stockmanager_model->categoryprofile($id);

        foreach ($results as $key => $values) {
            $details['category'][] = $values;  
        }
        
        
        $data['categorydetails'] = $details;//uses result from the foreach above to and passes it into key -> categorydetails to be used as reference


        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'View Category';
        $data['admin_navbar'] = 'stockmanager/header';//header.php file
        $data['admin_sidebar'] = 'stockmanager/sidebar';//sidebar.php file
        $data['admin_content'] = 'stockmanager/viewcategory';//viewcategory.php file
        $data['admin_footer'] = 'stockmanager/footer';//footer.php file

        
        
        $this->template->call_admin_template($data);
 
    }


    function viewemployee($id)
    {
        $this->log_check();
        $userdet = array();

        
        $results = $this->stockmanager_model->administratorprofile($id);

        foreach ($results as $key => $values) {
            $details['employees'][] = $values;  
        }
        
        
        $data['employeedetails'] = $details;

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'View Employee';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/viewadministrator';
        $data['admin_footer'] = 'stockmanager/footer';

        
        
        $this->template->call_admin_template($data);
 
    }

    function viewcomment($id)
    {
        $this->log_check();
        $userdet = array();

        
        $results = $this->stockmanager_model->commentprofile($id);

        foreach ($results as $key => $values) {
            $details['comments'][] = $values;  
        }
        
        
        $data['commentdetails'] = $details;

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'View Comment';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/viewcomment';
        $data['admin_footer'] = 'stockmanager/footer';

        
        
        $this->template->call_admin_template($data);
 
    }

    function vieworder($id)
    {
        $this->log_check();
        $userdet = array();

        
        $results = $this->stockmanager_model->orderprofile($id);

        foreach ($results as $key => $values) {
            $details['orders'][] = $values;  
        }
        
        
        $data['orderdetails'] = $details;

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'View Order';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/vieworder';
        $data['admin_footer'] = 'stockmanager/footer';

        
        
        $this->template->call_admin_template($data);
 
    }


    function commentupdate($type, $comm_id)
    {
        $update = $this->stockmanager_model->updatecomment($type, $comm_id);

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
        $update = $this->stockmanager_model->updateorder($type, $or_id);

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



    function products()
    {
        $data['all_products'] = $this->allproducts('active','table');

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Product';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/v_allproducts';
        $data['admin_footer'] = 'stockmanager/footer';
        
        
        $this->template->call_admin_template($data);

    }

    function dproducts()
    {
        $data['all_dproducts'] = $this->allproducts('inactive','table');

        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Deactivated Product';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/dproducts';
        $data['admin_footer'] = 'stockmanager/footer';
        
        
        $this->template->call_admin_template($data);

    }
    
    /* displays the  content page  of  the add product
    open the add product page
    ______________________________________________________*/

    function addproduct()
    {
        
        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title'] = 'Stock Manager';
        $data['admin_subtitle'] = 'Add Product';
        $data['admin_navbar'] = 'stockmanager/header';
        $data['admin_sidebar'] = 'stockmanager/sidebar';
        $data['admin_content'] = 'stockmanager/v_addnewproduct';
        $data['admin_footer'] = 'stockmanager/footer';

        $data['getcategories'] = $this->getcategories();
        
        $this->template->call_admin_template($data);
    }

    function getcategories(){
        $results = $this->stockmanager_model->getcategories();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
            $prodcat ='<option selected="selected" value="">Select the Category</option>';
        foreach ($results as $value) {
            $prodcat .= '<option value="' . $value['catid'] . '">' . $value['catname'] . '</option>';  
        }
        return $prodcat;
    }



    /* displays all the products from the  database
    ______________________________________________________*/

    function allproducts($state,$type)
    {
        $display = '';
        switch ($state) {
            case 'active':
                $products = $this->stockmanager_model->get_all_products();
                break;

             case 'inactive':
                 $products = $this->stockmanager_model->get_all_dproducts();
                break;
            
            default:
                # code...
                break;
        }
        
        

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

                // button below used for viewing the specific category. Goes to stockmanager controller into function called viewcategory(), passing the category id as parameter
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'stockmanager/viewproduct/'.$data['Product ID'].'"><i class="fa fa-eye black"></i></a></td>';
                // $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'index.php/stockmanager/viewproduct/'.$data['Product ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                // button below used for editing the specific category. Goes to stockmanager controller into function called catupdate(), passing the type of update and the category id as parameter
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'stockmanager/product_status/proddelete/'.$data['Product ID'].'"><i class="fa fa-trash black"></i></td>';
                // $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'index.php/stockmanager/product_status/proddelete/'.$data['Product ID'].'"><i class="fa fa-trash black"></i></td>';
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

         $categoryname = $this->input->post('productcategory');
         $pname = $this->input->post('productname');
         
         $pdescription = $this->input->post('prod_description');
         $price = $this->input->post('price');
         //$image=$this->input->post('image');
         $prodstatus=$this->input->post('productstatus');

         //echo'<pre>';print_r($categoryname);echo'</pre>';die();
         $path = base_url().'uploads/products/';
        //$path = base_url().'index.php/uploads/users/';
               $config['upload_path'] = 'uploads/products/';
               //$config['upload_path'] = 'index.php/uploads/employees/';
               $config['allowed_types'] = 'jpeg|jpg|png|gif';
               $config['encrypt_name'] = TRUE;
               $this->load->library('upload', $config);
               $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('prod_picture'))
            {
               $error = array('error' => $this->upload->display_errors());

               print_r($error);die;
            }
             else
             {
               
                $data = array('upload_data' => $this->upload->data());
                 foreach ($data as $key => $value) {
                  //print_r($data);die;
                  $path = base_url().'uploads/products/'.$value['file_name'];
                  //$path = base_url().'index.php/uploads/products/'.$value['file_name'];
                
                  }




         
         $insert = $this->stockmanager_model->add_product($categoryname,$pname,$pdescription,$path,$price,$prodstatus);

         return $insert;
     }
    }

    /* function for editing single product
    ______________________________________________________*/

    function editproduct()
    {

        $prodid=$this->input->post('editproductid');
        $prodcategory=$this->input->post('editcategoryname');
        $pname=$this->input->post('editproductname');
        $pdescription=$this->input->post('editprod_description');
        $price=$this->input->post('editprice');
        // $pimage=$this->input->post('image');
        $prodstatus=$this->input->post('editproductstatus');
        //echo'<pre>';print_r($prodid);echo'</pre>';die();

        $result = $this->stockmanager_model->update_product($prodid,$prodcategory, $pname,$pdescription,$price,$prodstatus);

        $this->products();
    }

    /* function for viweing single product
    ______________________________________________________*/

    function viewproduct($id)
    {
        $product_details=array();
        $results=$this->stockmanager_model->productprofile($id);

        foreach ($results as $key => $values) {
            $details['products'][] = $values;  
        }

        $data['productdetails'] = $details;
        $data['getcategories'] = $this->getcategories();


        $data['dordernumber'] = $this->getdordernumber();
        $data['dcategorynumber'] = $this->getdcategorynumber();
        $data['dcommentnumber'] = $this->getdcommentnumber();
        $data['dproductnumber'] = $this->getdproductnumber();

        $data['admin_title']='Stock Manager';
        $data['admin_subtitle']='View Product';
        $data['admin_navbar']='stockmanager/header';
        $data['admin_sidebar']='stockmanager/sidebar';
        $data['admin_content']='stockmanager/v_product';
        $data['admin_footer']='stockmanager/footer';

        //echo'<pre>';print_r($data);echo'</pre>';die();
        $this->template->call_admin_template($data);
    }

     /* function for updating  product state
    ______________________________________________________*/
    function  product_status($type,$prodid)
    {
        $update = $this->stockmanager_model->product_state($type,$prodid);

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