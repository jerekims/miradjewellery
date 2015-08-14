<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends MY_Model {

	function __construct()
    {
    	
        // Call the Model constructor
        parent::__construct();

    }
    
    /* get all active  categories from  the  database
    _______________________________________________________*/


    public function get_categories(){

        $data=array();
            $stmt="SELECT 
            catid AS 'Category id',
            catname AS 'Category Name'
            FROM 
            `category`
            WHERE catstatus=1 ORDER BY catname";

            $result = $this->db->query($stmt);
            if($result->num_rows > 0){
                $data=$result;
            }
        
    	return $data->result_array();
    }

    public function get_titles(){

        $data=array();
            $stmt="SELECT 
            title_id AS 'Title_id',
            title_name AS 'Title_name'
            FROM 
            `title`";

            $result = $this->db->query($stmt);
            if($result->num_rows > 0){
                $data=$result;
            }
        
        return $data->result_array();
    }

    public function category_product($catid=NULL){

            if(!empty($catid)){
            $sql="SELECT 
            p.prodid AS 'Product ID',
            p.prodname AS 'Product Name',
            p.proddescription AS 'Description',
            p.prodprice AS 'Price',
            p.prodimage AS 'Image'
            FROM products p, category c
            WHERE p.catid= c.catid AND c.catid ='$catid'";

            $result=$this->db->query($sql);
            if($result->num_rows()>0){
                return $result->result_array();
            }
            else{
                $result="Product for that category are currently out of  stock";
                return $result;
            }

            //echo "<pre>";print_r($result);echo "</pre>";die();
            
            }

            else if(empty($catid)){
             $sql="SELECT 
            p.prodid AS 'Product ID',
            p.prodname AS 'Product Name',
            p.proddescription    AS 'Description',
            p.prodprice AS 'Price',
            p.prodimage AS 'Image'
            FROM products p, category c
            WHERE p.catid= c.catid";

            $result=$this->db->query($sql);

            //echo "<pre>";print_r($result);echo "</pre>";die();
            return $result->result_array();
            }    
    
    }
    
    /*getting all the products  from the database
    ______________________________________________________*/

    public function getproduct($pid=NULL){

        //$data=array();

        if( !empty($pid)){
            //get specific product
            $sql="SELECT 
            p.prodid AS 'Product ID',
            p.prodname AS 'Product Name',
            p.proddescription    AS 'Description',
            p.prodprice AS 'Price',
            p.prodimage AS 'Image'
            FROM products p, category c
            WHERE p.catid= c.catid AND p.prodid ='$pid' LIMIT 1";

            $result=$this->db->query($sql);
            if($result->num_rows() > 0){
              return $result->result_array();
            }   
            else{
                //return true;
                }
        }
        else{
            $this->category_product();
        }
    }


    /*function for adding new customer
    ___________________________________________________*/

    public function add_customer($cname,$ctitle,$cemail,$cpass){
        $customer=array(
            'cust_name'=>$cname,
            'title_id'=>$ctitle,
            'cust_email'=>$cemail,
            'cust_password'=>$cpass,
        );

    $insert=$this->db->insert('customers', $customer);
    return $insert;
    }

    /*login function to user account
    _______________________________________________________*/
    public function user_login($cname,$cpass){
        
         //echo '<pre>';print_r($passw1);echo'</pre>';die;
        $sql = "SELECT * FROM customers WHERE cust_email = '". $cname ."' AND cust_password = '". $cpass ."' LIMIT 1";




        $result = $this->db->query($sql);
        
        $row = $result->row();
         // echo '<pre>';print_r($result);echo'</pre>';die;
        $sql2 = "SELECT * FROM customers WHERE cust_email = '". $cname ."' AND cust_status = 0 ";

        $result2 = $this->db->query($sql2);
        $row2 = $result->row();

        if($result->num_rows() == 1){
           if($row2->cust_status){
             if ($row->cust_password === $cpass) {
               $session_data = array(
                   'cust_id'       => $row ->cust_id , 
                   'cust_name'    => $row ->cust_name , 
                   'cust_email'      => $row ->cust_email ,
                   'title_id'      => $row ->title_id 
                   
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
     }



     private function set_session($session_data){
      $sql = "SELECT cust_id , cust_name, cust_email, title_id FROM customers WHERE cust_email = '". $session_data['cust_email'] ."' LIMIT 1";
      $result = $this->db->query($sql);
      $row = $result->row();
       //echo "<pre>";print_r($result);die();
       //echo $session_data['emp_id'];die();
      $setting_session = array(
                   'cust_id'       => $session_data['cust_id'] , 
                   'cust_name'    => $session_data['cust_name'] ,
                   'cust_email'       => $session_data['cust_email'] ,
                   'title_id'       => $session_data['title_id'] ,
                   'logged_in'   => 1
      ); 

      $this->session->set_userdata($setting_session);

      //echo "<pre>";print_r($setting_session);die();
      
      $details = $this->session->all_userdata();
       $sql = "INSERT INTO customer_session (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`,`cust_id`,`cust_name`,`cust_email`,`title_id`,`logged_in`)
               VALUES ('".$details['session_id']."', '".$details['ip_address']."','".$details['user_agent']."', '".$details['last_activity']."', 
                       '1','".$details['cust_id']."', '".$details['cust_name']."', '".$details['cust_email']."', '".$details['title_id']."', '".$details['logged_in']."') ";

    $results = $this->db->query($sql);
      //$this->db->insert_batch('ci_sessions',$session_details);
       // $details = $this->session->all_userdata();
        
    }

    public function logoutuser($sess_log){
         $data['logged_in'] = 0;

         $this->db->where('session_id', $sess_log);
         $update = $this->db->update('customer_session', $data);
     }


    public function addtocart($custid, $prodid){
           $cart=array(
            'cust_id'=>$custid,
            'prod_id'=>$prodid
        );

    $insert=$this->db->insert('cart', $cart);
    return $insert;

       
    }

    public function opencart($custid){
        $sql="SELECT cu.cust_id as Customer_id,
       p.prodid as Product_id,
       p.catid as Category_id,
       p.prodname as Product_name,
       p.proddescription as Product_description,
       p.prodprice as Product_price,
       p.prodimage as Product_image
FROM customers cu, products p
JOIN cart c ON p.prodid = c.prod_id 
WHERE cu.cust_id = 4";
      $result=$this->db->query($sql);
      return $result->result_array();
    }


}