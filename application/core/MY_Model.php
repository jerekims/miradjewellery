<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        date_default_timezone_set('Africa/Nairobi');
    }


    public function checkusernameexists($username)
    {
        $query = $this->db->query("SELECT count(user_id) as users FROM users WHERE username = '" . $username . "'");
        $count = $query->row();

        if($count->users > 0)
        {
          return true;
        }
        else
        {
          return false;
        }
    }

    public function register_user($username, $utype)
    {
      $defult_password = md5('123456');
      $query = $this->db->query("INSERT INTO users VALUES(NULL, '".$username."', '".$defult_password."','".$utype."', NULL, 1)");

      if($query)
      {
        return mysql_insert_id();
      }
      else
      {
        return false;
      }
    }

   
}