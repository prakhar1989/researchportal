<?PHP

class login extends CI_Controller {
	
	function index()
		{
			$data['myClass']=$this;
			//$data['msg']= $msg;
			$this->load->view('layoutLogin',$data);
		}
	function load_php()
				{
					echo '';
				}
				
	
	function chklogin()
				{
				session_start();
				//Load the user model
                $this->load->model('user_model');
				$username = $_POST['username']; //Set UserName
				$password = $_POST['password']; //Set Password
				echo '<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
					 ';
				$msg ='';
				if(isset($username, $password)) {
				ob_start();
				//include(DOC_ROOT.'/config.php'); //Initiate the MySQL connection
				// To protect MySQL injection (more detail about MySQL injection)
				$myusername = stripslashes($username);
				$mypassword = stripslashes($password);
				//$myusername = mysqli_real_escape_string($dbC, $myusername);
				//$mypassword = mysqli_real_escape_string($dbC, $mypassword);
				$userdata['myusername']=$myusername;
				$userdata['mypassword']=$mypassword;
				$Query= $this->user_model->check_login($userdata);
				
				
    // Mysql_num_row is counting table row
    //$count=mysqli_num_rows($Query);
	$count = $Query->num_rows;
	//echo '*****"'.$count.'"*******';

    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){
        //Register $myusername, $mypassword and redirect to file "admin.php"
        session_register("admin");
        session_register("password");
        $_SESSION['username']= $myusername;
		foreach($Query->result() as $row){
		$_SESSION['usertype']= $row->user_type;
		}
		if($_SESSION['usertype']==1){
		    header("location:../homeAdmin");
		}
		else if($_SESSION['usertype']==4){
		    header("location:../homeFaculty");
		}
		else if($_SESSION['usertype']==3){
		    header("location:../homeChairman");
		}
		else if($_SESSION['usertype']==2){
		    header("location:../homeComm");
		}
		else if($_SESSION['usertype']==5){
		    header("location:../homeStudent");
		}
    }
    else {
        $msg = "Wrong Username or Password. Please retry";
        header("location:../login?msg=$msg");
    }
    ob_end_flush();
}
else {
		header("location:login.php?msg=Please enter some username and password");
}
	 
					 
				echo '</TABLE>';
		}
	
	}


?>
