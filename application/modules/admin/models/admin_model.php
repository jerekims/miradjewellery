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

	function register_category($categoryname, $categorystatus)
	{
		$category = array(
						'catname' 	=> $categoryname,
						'catstatus' => $categorystatus
						);

		$insert = $this->db->insert('category', $category);
		return $insert;

	}

	function category_update($id,$category_name,$category_status)
	{
		$category = array(
						'catname' 	=> $category_name,
						'catstatus' => $category_status
						);

		$this->db->where('catid', $id);
        $insert = $this->db->update('category', $category);
		return $insert;

	}

	public function categoryprofile($id)
    {
         $profile = array();
         
         $query = $this->db->get_where('category', array('catid' => $id));
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

    
	



  
   
}