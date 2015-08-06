<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stockmanager_model extends MY_Model {


	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function passcheck($email){
       $sql = "SELECT emp_password FROM employees WHERE emp_email = '".$email."' ";

       $result = $this->db->query($sql);
       return $result->result_array();
    }

    function get_all_products()
    {
      $sql="SELECT 
        prodid AS 'Product ID',
        prodname AS 'Product Name',
        proddescription AS 'Product Description',
        prodprice AS 'Product Price',
        prodimage AS 'Product Image',
        product_status AS 'Product Status'
        FROM  
          `products`";
      $result=$this->db->query($sql);
      return $result->result_array();
    }

  /* adding new  product  to the database
  ______________________________________________________*/  
  
    function add_product($categoryname,$pname,$pdescription,$path,$price,$prodstatus)
    {
      $product=array(
            'catid'=>$categoryname,
            'prodname'=>$pname,
            'proddescription'=>$pdescription,
            'prodprice'=>$price,
            'prodimage'=>$path,
            'product_status'=>$prodstatus

        );
      $insert=$this->db->insert('products',$product);
      return $insert;
    }

  /* function  for updating product
  ______________________________________________________*/

    function update_product($prodid,$prodcategory, $pname,$pdescription,$price,$prodstatus)
    {
      $product=array(
            'catid'=>$prodcategory,
            'prodname'=>$pname,
            'proddescription'=>$pdescription,
            'prodprice'=>$price,
            'product_status'=>$prodstatus
        );
      $this->db->where('prodid',$prodid);

      $update=$this->db->update('products',$product);

      return $update;
    }

    /* individual viewing of products based  on $id
  ______________________________________________________*/

    function productprofile($productid)
    {
      $profile=array();
      $query=$this->db->get_where('products',array('prodid'=>$productid));
      $result=$query->result_array();
      if($result)
      {
        foreach ($result as $key => $value) {
          $profile[$value['prodid']]=$value;
        }
      }
      return $profile;
    }

    /* updating the product status
  ______________________________________________________*/

  function product_state($type,$productid)
  {
    $data=array();
    switch($type)
    {
      case 'proddelete':
        $data['product_status']=0;

        break;

        case 'prodrestore':
        $data['product_status']=1;

        break;

        case 'prodedit':
        $data=$this->input->post();
        break;

    }

    $this->db->where('prodid',$productid);
    $update=$this->db->update('products',$data);
    if($update){
      return true;
    }
    else{
      return false;
    }

  }

    public function clientnumber(){
    $sql = "SELECT COUNT(`cust_id`) as clients FROM customers WHERE cust_status = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->clients;die();

        return $data->clients;
   }

   public function productnumber(){
    $sql = "SELECT COUNT(`prodid`) as product FROM products WHERE product_status = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->product;die();

        return $data->product;
   }

   public function ordernumber(){
    $sql = "SELECT COUNT(`order_id`) as orders FROM orders WHERE order_status = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->order;die();

        return $data->orders;
   }

   public function categorynumber(){
    $sql = "SELECT COUNT(`catid`) as categories FROM category WHERE catstatus = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->order;die();

        return $data->categories;
   }

   public function commentnumber(){
    $sql = "SELECT COUNT(`comm_id`) as comment FROM comments WHERE comm_status = 1";

        $result = $this->db->query($sql);
        $data = $result->row();
        //echo $data->comment;die();

        return $data->comment;
   }



     public function log_member($username,$passw1)
    {
        

         //echo '<pre>';print_r($passw1);echo'</pre>';die;
        $sql = "SELECT * FROM employees WHERE emp_email = '". $username ."' AND emp_password = '". $passw1 ."' LIMIT 1";




        $result = $this->db->query($sql);
        
        $row = $result->row();
         // echo '<pre>';print_r($result);echo'</pre>';die;
        $sql2 = "SELECT * FROM employees WHERE emp_email = '". $username ."' AND emp_status = 0 ";

        $result2 = $this->db->query($sql2);
        $row2 = $result->row();

        if($result->num_rows() == 1){
           if($row2->emp_status){
             if ($row->emp_password === $passw1) {
               $session_data = array(
                   'emp_id'       => $row ->emp_id , 
                   'emp_name'    => $row ->emp_name , 
                   'emp_email'      => $row ->emp_email ,
                   'level_id'      => $row ->level_id 
                   
                );

                $this -> set_session($session_data);
                return 'logged_in';
             } else {
               return "session_fail";
             }
           }else{
             return "not_activated";
           }
         }else{
          return "incorrect_password";
         }


       
       //print_r($this->session->all_userdata());
    }

    private function set_session($session_data){
      $sql = "SELECT emp_id , emp_name, emp_email, level_id FROM employees WHERE emp_email = '". $session_data['emp_email'] ."' LIMIT 1";
      $result = $this->db->query($sql);
      $row = $result->row();
       //echo "<pre>";print_r($result);die();
       //echo $session_data['emp_id'];die();
      $setting_session = array(
                   'emp_id'       => $session_data['emp_id'] , 
                   'emp_name'    => $session_data['emp_name'] ,
                   'emp_email'       => $session_data['emp_email'] ,
                   'level_id'       => $session_data['level_id'] ,
                   'logged_in'   => 1
      ); 

      $this->session->set_userdata($setting_session);

      //echo "<pre>";print_r($setting_session);die();
      
      $details = $this->session->all_userdata();
       $sql = "INSERT INTO ci_sessions (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`,`emp_id`,`emp_name`,`emp_email`,`level_id`,`logged_in`)
               VALUES ('".$details['session_id']."', '".$details['ip_address']."','".$details['user_agent']."', '".$details['last_activity']."', 
                       '1','".$details['emp_id']."', '".$details['emp_name']."', '".$details['emp_email']."', '".$details['level_id']."', '".$details['logged_in']."') ";

    $results = $this->db->query($sql);
      //$this->db->insert_batch('ci_sessions',$session_details);
       // $details = $this->session->all_userdata();
        
    }

    function get_all_stockmanageristrators()

	{
		$sql = "SELECT 
					emp_id as 'Employee ID',
					emp_name as 'Employee Name',
          emp_email as 'Employee Email',
					level_id as 'Employee Level',
          date_registered as 'Date Registered',
          emp_status as 'Employee Status'
				FROM
					`employees`";
		$result = $this->db->query($sql);
		return $result->result_array();
	}


// function that allows the acquiring of all category data from table category
  function get_all_clients()

  {
    $sql = "SELECT 
          c.cust_id as 'Customer ID',
          c.cust_name as 'Customer Name',
          t.title_name as 'Customer Title',
          c.cust_email as 'Customer Email',
          c.date_registered as 'Date Registered',
          c.cust_status as 'Customer Status'
        FROM
          customers c,title t WHERE
          c.title_id = t.title_id";
    $result = $this->db->query($sql);
    return $result->result_array();
  }

  function get_all_orders()

  {
    $sql = "SELECT 
          order_id as 'Order ID',
          order_no as 'Order No',
          prodid as 'Product ID',
          prodprice as 'Product Price',
          cust_id as 'Customer ID',
          order_status as 'Order Status',
          order_date as 'Date Ordered'
        FROM
          orders";
    $result = $this->db->query($sql);
    return $result->result_array();
  }

  function get_all_comments()

  {
    $sql = "SELECT 
          comm_id as 'Comment ID',
          comm_subject as 'Comment Subject',
          comm_message as 'Comment Message',
          comm_status as 'Comment Status',
          date_sent as 'Date Sent'
        FROM
          comments
        WHERE
          comm_status = 1";
    $result = $this->db->query($sql);
    return $result->result_array();
  }

   function get_all_categories()

  {
    $sql = "SELECT 
          catid as 'Category ID',
          catname as 'Category Name',
          catstatus as 'Category Status'
        FROM
          `category`";
    $result = $this->db->query($sql);
    return $result->result_array();
  }



  // function that allows the adding of new category into the database

	function register_category($categoryname, $categorystatus)
	{
		$category = array(
         // column name => data entered by user
						'catname' 	=> $categoryname,
						'catstatus' => $categorystatus
						);
  // category is the name of the table, which acquires $category which is the array with new data
		$insert = $this->db->insert('category', $category);
		return $insert;

	}

  function register_employee($employeename, $employeeemail, $employeeoccupation, $path, $employeestatus)
  {
    
    $employee = array(
        
            'emp_name'   => $employeename,
            'emp_email' => $employeeemail,
            'level_id'   => $employeeoccupation,
            'emp_picture' => $path,
            'emp_password' => $employeepass,
            'emp_status' => $employeestatus
            );
  
    $insert = $this->db->insert('employees', $employee);
    return $insert;

  }
  

  //function the update of a category that is contained in the $id
	function category_update($id,$category_name,$category_status)
	{
		$category = array(
						'catname' 	=> $category_name,
						'catstatus' => $category_status
						);

		$this->db->where('catid', $id);//uses id to get the specifics


        $insert = $this->db->update('category', $category);
		return $insert;

	}




  function administrator_update($id,$employee_name, $employee_email, $employee_password, $employee_occupation)
  {
    $employee = array(
            'emp_name'   => $employee_name,
            'emp_email' => $employee_email,
            'emp_password'   => $employee_password,
            'emp_status' => $employee_status
            );

    $ci_sess = array();
      $sessions = array(
          'emp_name'   => $employee_name,
            'emp_email' => $employee_email
        );

    $this->db->where('emp_id', $id);

    
        $insert = $this->db->update('employees', $employee);

        

      array_push($ci_sess, $sessions);

      $this->db->insert_batch('ci_sessions',$ci_sess);

        
    return $insert;

  }

    function client_update($id, $customer_status)
  {
    $customer = array(
            'cust_status' => $customer_status
            );

    $this->db->where('cust_id', $id);


        $insert = $this->db->update('customers', $customer);
    return $insert;

  }

   function order_update($id, $order_status)
  {
    $order = array(
            'order_status' => $order_status
            );

    $this->db->where('order_id', $id);


        $insert = $this->db->update('orders', $order);
    return $insert;

  }

  function comment_update($id, $comment_status)
  {
    $comment = array(
            'comm_status' => $comment_status
            );

    $this->db->where('comm_id', $id);


        $insert = $this->db->update('comments', $comment);
    return $insert;

  }

  public function getcategories(){
    $query = "SELECT * FROM category WHERE catstatus = 1";
            try {
                $this->dataSet = $this->db->query($query);
                $this->dataSet = $this->dataSet->result_array();
            }
            catch(exception $ex) {
            }
            
            return $this->dataSet;
  }


// function that allows us to view details of the category selected using the $id
	public function categoryprofile($id)

    {
         $profile = array();
         
         $query = $this->db->get_where('category', array('catid' => $id));//uses id to get the specifics
         
         $result = $query->result_array();

      if ($result) {
          foreach ($result as $key => $value) {
             $profile[$value['catid']] = $value;
          }
      //echo '<pre>';print_r($profile[$value['catid']]);echo '</pre>';die();
      return $profile;

    }
    
    return $profile;
    }


    public function administratorprofile($id)

    {
         $profile = array();
         
         $query = $this->db->get_where('employees', array('emp_id' => $id));
         
         $result = $query->result_array();

      if ($result) {
          foreach ($result as $key => $value) {
             $profile[$value['emp_id']] = $value;
          }
      return $profile;

    }
    
    return $profile;
    }

    public function clientprofile($id)

    {
         $profile = array();
         
         $query = $this->db->get_where('customers', array('cust_id' => $id));
         
         $result = $query->result_array();

      if ($result) {
          foreach ($result as $key => $value) {
             $profile[$value['cust_id']] = $value;
          }
      return $profile;

    }
    
    return $profile;
    }


    public function commentprofile($id)

    {
         $profile = array();
         
         $query = $this->db->get_where('comments', array('comm_id' => $id));
         
         $result = $query->result_array();

      if ($result) {
          foreach ($result as $key => $value) {
             $profile[$value['comm_id']] = $value;
          }
      return $profile;

    }
    
    return $profile;
    }

    public function orderprofile($id)

    {
         $profile = array();
         
         $query = $this->db->get_where('orders', array('order_id' => $id));
         
         $result = $query->result_array();

      if ($result) {
          foreach ($result as $key => $value) {
             $profile[$value['order_id']] = $value;
          }
      return $profile;

    }
    
    return $profile;
    }


     public function logoutuser($sess_log){
         $data['logged_in'] = 0;

         $this->db->where('session_id', $sess_log);
         $update = $this->db->update('ci_sessions', $data);
     }

   

	public function updatecat($type, $cat_id)
    {
          $data = array();

        switch ($type) {
          case 'catdelete':
            $data['catstatus'] = 0; 
            
            break;

          case 'catrestore':
            $data['catstatus'] = 1; 
        
            break;
      
          case 'catedit':
            $data = $this->input->post();
            break;
      
    }


    $this->db->where('catid', $cat_id);
    $update = $this->db->update('category', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }




  public function updateemp($type, $emp_id)
    {
          $data = array();

        switch ($type) {
          case 'empdelete':
            $data['emp_status'] = 0; 
            
            break;

          case 'emprestore':
            $data['emp_status'] = 1; 
        
            break;      
    }

    $this->db->where('emp_id', $client_id);
    $update = $this->db->update('employees', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }

    public function updatecomment($type, $comm_id)
    {
          $data = array();

        switch ($type) {
          case 'commentdelete':
            $data['comm_status'] = 0; 
            
            break;

          case 'commentrestore':
            $data['comm_status'] = 1; 
        
            break;      
    }

    $this->db->where('comm_id', $comm_id);
    $update = $this->db->update('comments', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }


    public function updateorder($type, $or_id)
    {
          $data = array();

        switch ($type) {
          case 'orderdelete':
            $data['order_status'] = 1; 
            
            break;

          case 'orderrestore':
            $data['order_status'] = 0; 
        
            break;      
    }


    $this->db->where('order_id', $or_id);
    $update = $this->db->update('orders', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }

    


  public function updateclient($type, $client_id)
    {
          $data = array();

        switch ($type) {
          case 'clientdelete':
            $data['cust_status'] = 0; 
            
            break;

          case 'clientrestore':
            $data['cust_status'] = 1; 
        
            break;
      
        
      
    }


    $this->db->where('cust_id', $client_id);
    $update = $this->db->update('customers', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }

    

	




  
   
}