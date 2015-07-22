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

	public function updatecat($type, $cat_id)
  {
    $data = array();

    switch ($type) {
      case 'delete':
        $data['catstatus'] = 0; 
        
        break;

      case 'restore':
        $data['catstatus'] = 1; 
        
        break;
      
      case 'update':
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

    
	



  
   
}