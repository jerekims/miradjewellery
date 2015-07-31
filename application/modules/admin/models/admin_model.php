<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends MY_Model {


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

    function get_all_administrators()

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


  function administrator_update($id,$employee_name, $employee_email, $employee_password, $employee_occupation, $employee_status)
  {
    $employee = array(
            'emp_name'   => $employee_name,
            'emp_email' => $employee_email,
            'level_id'   => $employee_occupation,
            'emp_password'   => $employee_password,
            'emp_status' => $employee_status
            );

    $this->db->where('emp_id', $id);


        $insert = $this->db->update('employees', $employee);
    return $insert;

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
            $data['catstatus'] = 0; 
            
            break;

          case 'emprestore':
            $data['catstatus'] = 1; 
        
            break;
      
        
      
    }


    $this->db->where('emp_id', $cat_id);
    $update = $this->db->update('employees', $data);

    if ($update) {
      return true;
    }
    else
    {
      return false;
    }
  }

    

	




  
   
}