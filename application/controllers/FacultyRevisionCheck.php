<?PHP

class FacultyRevisionCheck extends CI_Controller 
{
	function index()
		{			
		$data['myClass']=$this;
		$data['action']=0;
		$this->load->view('layoutfaculty',$data);
		}
	function load_php()
				{
				echo '<FORM METHOD=POST action="FacultyRevisionCheck/insert" enctype="multipart/form-data">';
				$this->load->model('project_model');
				session_start();
				$_SESSION['ProjectID'] = $_POST['ProjectSelected'];
				$ProjectID = $_POST['ProjectSelected'];
				//echo $ProjectID;
				echo'
					<TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
							';
					if ($_POST['RequestType'] == 'Edit New Application')
						{
						header("Location: /rp/FacultyReviseApp");
						} 
					else if ($_POST['RequestType'] == 'Edit Extension') 
						{
						header("Location: /rp/FacultyRevExt");
						}
					else if ($_POST['RequestType'] == 'Edit Completion') 
						{
						
						$this->load->database();
						$this->load->model('project_model');
						$Path = "upload/".$ProjectID."_";
						$Files = glob($Path."*.pdf");
						$countuploaded = 0;
						foreach ($Files as $File)
							{
							$countuploaded++;			
							echo'<a href="download?file='.$File.'">'.$File.'</a><br><br>';
							echo '<br>';
							}
						echo 'Number of Deliverables uploaded: '.$countuploaded;
						$queryStr='Select * from project where ProjectId = "'.$ProjectID.'";';
						$query = $this->db->query($queryStr);
						$countpromised = 0;
						foreach($query->result() as $row)
							{
							$countpromised = $countpromised + $row->Deliverables;
							$countpromised = $countpromised + $row->cases;
							$countpromised = $countpromised + $row->journals;
							$countpromised = $countpromised + $row->chapters;
							$countpromised = $countpromised + $row->conference;
							$countpromised = $countpromised + $row->paper;
							}
						echo '<br>Number of Deliverables promised: '.$countpromised;
						echo '<br><br>';
						If ($countpromised > $countuploaded)
							{
							echo '<input id="element_5" name="element_5" class="element file" type="file"/>';
							//echo '<input type=text value="2" name=txt id=txt/>';
							for ($i=1; $i <= ($countpromised - $countuploaded); $i++)
								{
								echo '<br><input type="file" name="file_desc_'.$i.'" id="file_desc_'.$i.'" />';
								}
							echo'<input type="hidden" name="i" value="'.$i.'" />
							<br><input type="SUBMIT" value="Apply" class="btn btn-large btn-primary "></input>';
							}
							 
						}
					echo "\n\n";
					 echo '</TABLE>
					</FORM>';
                
				
				}
	
			function insert()
			{
			session_start();
					$ProjectId = $_SESSION['ProjectID'];
					//$temp = $_POST['txt'];
					//echo $temp;
					echo $ProjectId;
					$i = $_POST['i'];
					echo $i;
					$ext = end(explode('.', $_FILES["element_5"]["name"]));
					echo $ext;
					move_uploaded_file($_FILES["element_5"]["tmp_name"],"upload/".$ProjectId.'.'.$ext);
				
					for ($j=1; $j < $i ; $j++)
						{
						$ext=end(explode('/', $_FILES['file_desc_'.$j]['type']));
						move_uploaded_file($_FILES['file_desc_'.$j]["tmp_name"],"upload/" . $ProjectId.'_'.$j.$ext);		           
						}
			}
}
?>