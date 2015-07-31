<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MY_Model {
	function __construct(){
		//call of the parent constructor
		parent::__construct();
	}

	/* function getting all the products from the database
	______________________________________________________*/

		function get_all_products()
		{
			$sql="SELECT 
				prodid AS 'Product ID',
				prodname AS 'Product Name',
				proddescription AS 'Product Description',
				prodprice AS 'Product Price',
				prodimage AS 'Product Image',
				prodstatus AS 'Product Status'
				FROM  
					`products`";
			$result=$this->db->query($sql);
			return $result->result_array();
		}

	/* adding new  product  to the database
	______________________________________________________*/	
	
		function add_product($product_category,$productname,$description,$price,$pstatus)
		{
			$product=array(
						'catid'=>$product_category,
						'prodname'=>$productname,
						'proddescription'=>$description,
						'prodprice'=>$price,
						'prodimage'=>"image",
						'prodstatus'=>$pstatus

				);
			$insert=$this->db->insert('products',$product);
			return $insert;
		}

	/* function  for updating product
	______________________________________________________*/

		function update_product($product_id,$product_category,$productname,$description,$price,$image)
		{
			$product=array(
						'catid'=>$product_category,
						'prodname'=>$productname,
						'proddescription'=>$description,
						'prodprice'=>$price,
						'prodimage'=>$image
				);
			$this->db->where('prodid',$product_id);

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

	function product_status($type,$productid)
	{
		$data=array();
		switch($type)
		{
			case 'productdelete':
				$data['prodstate']=0;

				break;

				case 'productrestore':
				$data['prodstate']=1;

				break;

				case 'prodedit':
				$data=$this->input->post();
				break;

		}

		$this->db->where('prodid',$id);
		$update=$this->db->update('products',$data);
		if($update){
			return true;
		}
		else{
			return false;
		}

	}
}