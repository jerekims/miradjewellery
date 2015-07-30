<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller {
	
    public $logged_in;

	/* constructor
		______________________________________________________*/

	function __construct(){
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('product_model');

		parent::__construct();
	}


    /* Display the first page of the product module
        ______________________________________________________*/
    function index()
    {
        $data['all_products'] = $this->allproducts('table');

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Product';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'product/v_allproducts';
        $data['admin_footer'] = 'admin/footer';
        
        
        $this->template->call_admin_template($data);
    }

   

    // Display of other pages

	/* display the product page
	______________________________________________________*/

	function  products()
	{
        $data['all_products'] = $this->allproducts('table');

        $data['admin_title'] = 'Manager';
        $data['admin_subtitle'] = 'Product';
        $data['admin_navbar'] = 'admin/header';
        $data['admin_sidebar'] = 'admin/sidebar';
        $data['admin_content'] = 'product/v_allproducts';
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
        $data['admin_content'] = 'product/v_addnewproduct';
        $data['admin_footer'] = 'admin/footer';

        
        
        $this->template->call_admin_template($data);
    }


	/* displays all the products from the  database
	______________________________________________________*/

	function allproducts($type)
	{
		$display = '';
        $products = $this->product_model->get_all_products();
        //echo "<pre>";print_r($products);die();

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
            <th>category Name</th>
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

        switch ($type) {
            case 'table':
                $display .= '<tr>';
                $display .= '<td class="centered">'.$count.'</td>';
                $display .= '<td class="centered">'.$data['Product Name'].'</td>';
                $display .= '<td class="centered">'.$data['Product Description'].'</td>';
                $display .= '<td class="centered">'.$data['Product Price'].'</td>';
                $display .= '<td class="centered">'.$state.'</td>';

                // button below used for viewing the specific category. Goes to admin controller into function called viewcategory(), passing the category id as parameter
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="View Profile" href = "'.base_url().'admin/viewcategory/'.$data['Product ID'].'"><i class="fa fa-eye black"></i></a></td>';
                
                // button below used for editing the specific category. Goes to admin controller into function called catupdate(), passing the type of update and the category id as parameter
                $display .= '<td class="centered"><a data-toggle="tooltip" data-placement="bottom" title="Deactivate Profile" href = "'.base_url().'admin/catupdate/catdelete/'.$data['Product ID'].'"><i class="ion-trash-a icon black"></i></td>';
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

		 $categoryname = $this->input->post('categoryname');
         $pname=$this->input->post('productname');
         $pdescription=$this->input->post('prod_description');
         $price=$this->input->post('price');
         $image=$this->input->post('image');
         $prodstatus=$this->input->post('productstatus');

         $insert=$this->product_model->add_product($categoryname,$pname,$pdescription,$price,$image,$prodstatus);

         return $insert;
	}

    /* function for editing single product
    ______________________________________________________*/

    function editproduct()
    {
         $this->form_validation->set_rules('productcategory','trim|required|xss_clean');
         $this->form_validation->set_rules('productname','trim|required|xss_clean');
         $this->form_validation->set_rules('prod_description','trim|required|xss_clean');
         $this->form_validation->set_rules('price','trim|required|xss_clean');
         $this->form_validation->set_rules('image','trim|required|xss_clean');

        $prodcategory=$this->input->post('categoryname');
        $pname=$this->input->post('productname');
        $pdescription=$this->input->post('prod_description');
        $price=$this->input->post('price');
        $pimage=$this->input->post('image');
        $prodstatus=$this->input->post('productstatus');

        $result=$this->product_model->update_product($prodcategory, $pname,$pdescription,$price,$pimage,$prodstatus);

        $this->products();
    }

    /* function for viweing single product
    ______________________________________________________*/

    function viewproduct($id)
    {
        $product_details=array();
        $results=$this->product_model->productprofile($id);

        foreach ($results as $key => $values) {
            $details['product'][] = $values;  
        }
        $data['productdetails'] = $details;

        $data['admin_title']='Manager';
        $data['admin_subtitle']='View Product';
        $data['admin-navbar']='admin/header';
        $data['admin_sidebar']='admin/sidebar';
        $data['admin_content']='product/viewproduct';
        $data['admin_footer']='admin/footer';

        $this->template->call_admin_template($data);
    }

     /* function for updating  product state
    ______________________________________________________*/
    function  product_status($type,$prodid)
    {
        $updat->$this->product_model->product_state($type,$prodid);
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
                    $this->products();
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