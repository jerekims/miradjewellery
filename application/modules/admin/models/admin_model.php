<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends MY_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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