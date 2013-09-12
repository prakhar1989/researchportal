<?PHP

class Conf_FacultyReviseApp extends CI_Controller {
	
	function index()
		{
			
		$data['myClass']=$this;
		$data['action']=0;
		session_start();
		if($_SESSION['usertype']==4){
		$this->load->view('layoutFaculty',$data);
		} 
		else{
		header("location:login");
		}
		}
	function explode_dn($dn, $with_attributes=0)
						{
							ini_set( "display_errors", 0); 
							$result = ldap_explode_dn($dn, $with_attributes);
							foreach($result as $key=>$value){
							  $result[$key] = preg_replace("/\\\([0-9A-Fa-f]{2})/e", "''.chr(hexdec('\\1')).''", $value);
							}
							return $result;
						}	
	function load_php()
				{
				error_reporting(E_ERROR | E_PARSE);
				ini_set( "display_errors", 0);  
					
				$ConferenceID = $_SESSION['ConferenceID'];
				echo '<INPUT TYPE="HIDDEN" NAME="ConferenceSelected" VALUE="'.$ConferenceID.'">	';
				$this->load->model('conference_model');
				$result= $this->conference_model->conferenceSearchByID($ConferenceID);
				foreach ($result->result() as $row){
				$status= "app_admin";
				echo '
					<p>Please use the form below to edit the details of the new conference</p>
					<form name="application" method=POST action="Conf_FacultyReviseApp/insert"  enctype="multipart/form-data"><table class="table table-bordered">
					<thead>
						<tr>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Username</td>
							<td><b>'.$_SESSION['username'].'</b></td>
						</tr>
						<tr>
							<td>Name of Conference</td>
							<td><input type="text" class = "large" placeholder = "'.$row->ConferenceTitle.'" name="conf_title"></input></td>
						</tr>
						
						<tr>
							<td>Venue of Conference</td>
							<td><input type="text" class = "large" placeholder = "'.$row->Venue.'" name="conf_venue"></input></td>
						</tr>
						
						<tr>
						 	<td>Conference Date (YYYY-MM-DD)</td>
						 	<td><input type="text" class="large" placeholder = "'.$row->App_Date.'" name="conf_date"></input></td>
						</tr>
						<tr>
							<td>Title of Paper</td>
							<td><input type="text" class="large" placeholder = "'.$row->PaperTitle.'" name="paper_title"></input></td>
						</tr>
						<tr>
							<td>Co-author (if any) [Name; Institute]</td>
							<td><input type="text" class="large" placeholder = "'.$row->Researcher2.'" name="co_author"></input></td>
						</tr>
						<tr>
							<td>Conference Category</td>
							<td>
							<select name="category">
							  <option>International</option>
							</select>
						</td>
						</tr>
						<td>
						Funding from
						</td><td><select name = "funding"><option>IIMC</option><option>External</option>
						</td>
						</tr>
						<tr>
						<td>Financial support sought for : 
						(Please Select, if applicable as per rules)</TD>
						<td><table>
						<tr><td>Air Fare</td><td><select name="airfare"><option>No</option><option>Yes</option></select></td></tr>
						<tr><td>Registration Fees</td><td><select name="regfees"><option>No</option><option>Yes</option></select></td></tr>
						<tr><td>Per Diem</td><td><select name="perdiem"><option>No</option><option>Yes</option></select></td></tr>
						<tr><td>Visa</td><td><select name="visa"><option>No</option><option>Yes</option></select></td></tr>
						<tr><td>Medical Insurance</td><td><select name="medical"><option>No</option><option>Yes</option></select></td></tr>
						<tr><td>Local Travel</td><td><select name="localtravel"><option>No</option><option>Yes</option></select></td></tr>
						</table></td>
						</tr>
						<tr><td>Upload Full Paper</td><td><input type="file" name="file_title" id="file_title" /></td><td><p><a href="downloadfile?file=upload_conf/'.$ConferenceID.'_title">Conference Paper</a></p></td></tr>
						<tr><td>Upload Website Registration Fees Page</td><td><input type="file" name="file_fees" id="file_fees" /></td><TD><a href="downloadfile?file=upload_conf/'.$ConferenceID.'_fees">Conference Registration Fees Details</a></TD></tr>
						';
						//<tr><td>Upload Budget Declaration Page</td><td><input type="file" name="file_budget" id="file_budget" /></td><TD><a href="downloadfile?file=upload_conf/'.$ConferenceID.'_budget">Conference Budget Details</a><br><br></TD></tr>
						echo '<tr><td>Upload Acceptance Letter</td><td><input type="file" name="file_acceptance" id="file_acceptance" /></td><TD><a href="downloadfile?file=upload_conf/'.$ConferenceID.'_acceptance">Acceptance Letter</a><br><br></TD></tr>
						';
						echo $row->FacultyCategory;
						if($row->FacultyCategory == "2"){
							echo '<tr><td>Upload Group Recommendation</td><td><input type="file" name="file_grouprecommendation" id="file_grouprecommendation" /></td><TD><a href="downloadfile?file=upload_conf/'.$ConferenceID.'_grouprecommendation">Group Recommendation</a><br><br></TD></tr>';
						}
						
						echo '
						<tr>
							<td>Extra comments</td>
							
							<td><textarea name="comment" ></textarea></td>
						
						</tr>
					</tbody>
					</table>

					<input type="submit" value="Apply" class="btn btn-large btn-primary"></input><input type="hidden" name=conferenceID value="'.$ConferenceID.' " ></input><input type="hidden" name=status value="'.$status.' " ></input>
					<input type="hidden" name=faculty_category value="'.$row->FacultyCategory.' " ></input></form>
				
					
					
					';	
					
					//<a href="downloadfile?file=researchportal%283%29.txt">Download file</a>
					
					
			
                }
				
				}
function insert()
			{
			session_start();
			$ConferenceID = $_SESSION['ConferenceID'];
			$data['category']=$_POST['category'];
			$data['title']=$_POST['conf_title'];	
			$data['venue']=$_POST['conf_venue'];
			$data['conf_date']=$_POST['conf_date'];
			$data['papertitle']=$_POST['paper_title'];
			$data['researcher2']=$_POST['co_author'];
			$data['category']=$_POST['category'];
			$data['funding']=$_POST['funding'];
			
			$this->load->model('conference_model');
			
		    //Uploading the file code... Can be modified to check the file extension if required
			//$ext=end(explode('/', $_FILES['file_desc']['type']));
			//move_uploaded_file($_FILES['file_desc']["tmp_name"],"upload/" . $ProjectID.'_description.'.$ext);
			
			if($_FILES['file_title']['size'] > 0)
			 {
				$ext=end(explode('/', $_FILES['file_title']['type']));
				move_uploaded_file($_FILES['file_title']["tmp_name"],"upload_conf/" . $ConferenceID.'_title.'.$ext);
			 }
			 else
			 {
			 }
			 
			 if($_FILES['file_fees']['size'] > 0)
			 {
				$ext=end(explode('/', $_FILES['file_fees']['type']));
				move_uploaded_file($_FILES['file_fees']["tmp_name"],"upload_conf/" . $ConferenceID.'_fees.'.$ext);
			 }
			 else
			 {
			 }
			 
			 /*if($_FILES['file_budget']['size'] > 0)
			 {
				$ext=end(explode('/', $_FILES['file_budget']['type']));
				move_uploaded_file($_FILES['file_budget']["tmp_name"],"upload_conf/" . $ConferenceID.'_budget.'.$ext);
			 }
			 else
			 {
			 }*/
			 
			 if($_FILES['file_acceptance']['size'] > 0)
			 {
				$ext=end(explode('/', $_FILES['file_acceptance']['type']));
				move_uploaded_file($_FILES['file_acceptance']["tmp_name"],"upload_conf/" . $ConferenceID.'_acceptance.'.$ext);
			 }
			 else
			 {
			 }
			if($_POST['faculty_category'] == 2)
			{
			if($_FILES['file_grouprecommendation']['size'] > 0)
			 {
				$ext=end(explode('/', $_FILES['file_grouprecommendation']['type']));
				move_uploaded_file($_FILES['file_grouprecommendation']["tmp_name"],"upload_conf/" . $ConferenceID.'_grouprecommendation.'.$ext);
			 }
			 else
			 {
			 }
			}
			if(!isset($_POST['comment']) || strlen(trim($_POST['comment'])) == 0)
			{
			}
			else
			{
				$this->load->model('conference_model');
				$this->conference_model->insertComment($_SESSION['username'],$_SESSION['usertype'],$ConferenceID,addslashes(trim($_POST['comment'])),"faculty_application_revision");
			}
			$this->conference_model->insertConferenceRevision($_SESSION['username'],$data,$_POST['status'],$ConferenceID);
			
			
			//}
			
			 $msg='The Project has been sent for approval ';
			 require('showMsg.php');
			 $showMsg=new showMsg();
			 $showMsg->index($msg,'faculty');
			}				
	}


?>