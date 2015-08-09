<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model {

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

    public function category_product($catid=NULL){

            if(!empty($catid)){
            $sql="SELECT 
            p.prodid AS 'Product ID',
            p.prodname AS 'Product Name',
            p.proddescription    AS 'Description',
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
}