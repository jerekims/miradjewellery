<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends MY_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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

    
	



  
   
}