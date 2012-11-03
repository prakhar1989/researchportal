
<?PHP

// Connect to the database. To tweak the database settings goto applciation/config/database.php 

class User_model extends CI_Model {
     
		
	function check_login($userdata)
		{
		$this->load->database();
		$myusername = $userdata['myusername'];
		$mypassword = $userdata['mypassword'];
		// and Password="SHA('$mypassword')"
		$queryStr='SELECT * FROM users WHERE Username = "'.$myusername.'" and Password = "'.$mypassword.'";';
		//echo $queryStr;
		$query = $this->db->query($queryStr);
		return $query;
		}
}
?>