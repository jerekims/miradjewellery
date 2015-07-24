<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	public $logged_in;

	function __construct()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        
        parent::__construct();
          
    }

// Display the first page of the admin module
    function index()
    {
        $data['all_categories'] = $this->allcategories('table');

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Overall Statistics';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'admin/v_admin';
        $data['admin_footer'] = 'admin/footer';
        
        
        $this->template->call_admin_template($data);
    }

    // Display of other pages
    
    
    
    // Displays the contents page of the categories, in this case opens the category.php file
    function categories()
    {
        
        //Transfer result to category.php from a function within the admin controller called allcategories()
        $data['all_categories'] = $this->allcategories('table'); 

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Category';
        $data['admin_navbar'] = 'admin/header';//header.php file
        $data['admin_sidebar'] = 'admin/sidebar';//sidebar.php file
        $data['admin_content'] = 'admin/category';//category.php file
        $data['admin_footer'] = 'admin/footer';//footer.php file

        
        
        $this->template->call_admin_template($data);
    }
 
    // Displays the contents page of the addcategory, in this case opens the addcategory.php file
    function addcategory()
    {
        

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Add Category';
        $data['admin_navbar'] = 'admin/header';//header.php file
        $data['admin_sidebar'] = 'admin/sidebar';//sidebar.php file
        $data['admin_content'] = 'admin/addcategory';//addcategory.php file
        $data['admin_footer'] = 'admin/footer';//footer.php file

        
        
        $this->template->call_admin_template($data);
    }



    // Display of tables for categories and exporting of data
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

                // button below used for viewing the specific category. Goes to admin controller into function called viewcategory(), passing the category id as parameter
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/viewcategory/'.$data['Category ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                // button below used for editing the specific category. Goes to admin controller into function called catupdate(), passing the type of update and the category id as parameter
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'admin/catupdate/catdelete/'.$data['Category ID'].'"><i class="ion-trash-a icon black"></i></td>';
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


      // enables the registration for a new category
      function categoryregistration(){
         
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


    // function that passes the id to be viewed and displays it in the viewcategory file
    function viewcategory($id)
    {
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

     //function that allows other updates for specific category with $cat_id
      function catupdate($type, $cat_id)
    {
        $update = $this->admin_model->updatecat($type, $cat_id);

        if($update)
        {
            switch ($type) {

                case 'catview':
                    
                    break;

                case 'catactivate':
                    
                    break;

                case 'catedit':
                    
                    break;

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








	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */