<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MY_Model {

	function __construct()
    {
    	
        // Call the Model constructor
        parent::__construct();

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
  			p.proddescription	 AS 'Description',
  			p.prodprice AS 'Price',
  			p.prodimage AS 'Image'
  			FROM products p, category c
  			WHERE p.catid= c.catid AND p.prodid ='$pid' LIMIT 1";

  			$result=$this->db->query($sql);
        if($result->num_rows() > 0){
          return $result->result_array();
        }	
  		}

  		// else{

  		// 	$sql="SELECT 
  		// 	p.prodid AS 'Product ID',
  		// 	p.prodname AS 'Product Name',
  		// 	p.proddescription	 AS 'Description',
  		// 	p.prodprice AS 'Price',
  		// 	p.prodimage AS 'Image'
  		// 	FROM products p, category c
  		// 	WHERE p.catid= c.catid AND p.prodid";
  		// 	$result=$this->db->query($sql);
  		// 	return $result->result_array();
  		//}
  	}
   
}