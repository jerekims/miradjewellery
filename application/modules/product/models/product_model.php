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
				id AS 'Product ID',
				name AS 'Product Name',
				description AS 'Product Description',
				price AS 'Product Price',
				image AS 'Product Image',
				product_status AS 'Product Status'
				FROM  
					`products`";
			$result=$this->db->query($sql);
			return $result->result_array();
		}

	/* adding new  product  to the database
	______________________________________________________*/	
	
		function add_product($product_category,$productname,$description,$price,$image,$pstatus)
		{
			$product=array(
						'category_id'=>$product_category,
						'name'=>$productname,
						'description'=>$description,
						'price'=>$price,
						'image'=>$image,
						'product_status'=>$pstatus
				);
			$insert=$this->db->insert('products',$product);
			return $insert;
		}

	/* function  for updating product
	______________________________________________________*/

		function update_product($product_id,$product_category,$productname,$description,$price,$image)
		{
			$product=array(
						'category_id'=>$product_category,
						'name'=>$productname,
						'description'=>$description,
						'price'=>$price,
						'image'=>$image
				);
			$this->db->where('id',$product_id);

			$update=$this->db->update('products',$product);

			return $update;
		}

		/* individual viewing of products based  on $id
	______________________________________________________*/

		function productprofile($productid)
		{
			$profile=array();
			$query=$this->db->get_where('products',array('id'=>$productid));
			$result=$query->result_array();
			if($result)
			{
				foreach ($result as $key => $value) {
					$profile[$value['id']]=$value;
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

		$this->db->where('id',$id);
		$update=$this->db->update('products',$data);
		if($update){
			return true;
		}
		else{
			return false;
		}

	}
}