<?PHP

class FacultyProjShowDetails extends CI_Controller {
	
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
	function load_php()
				{
				$ProjectID = $this->input->post('ProjectSelected');
				//echo $ProjectID;
				//Load the project model
				$this->load->model('project_model');
				$result= $this->project_model->projectSearchByID($ProjectID);
				//echo '<p> hello this is the Project Details Page </p>';
				// Display the results
				echo'
				
					<FORM name = "form1" METHOD=POST ACTION="FacultyProjRequest">
				
					<INPUT TYPE="HIDDEN" NAME="ProjectSelected" VALUE="'.$ProjectID.'">	
					<INPUT TYPE="HIDDEN" NAME="hidden1">	
					<INPUT TYPE="HIDDEN" NAME="hidden2">
					';
					//$Period = $_GET['period'];//document.form1.hidden1.value;
					$this->load->database();
					$this->load->model('project_model');
					$Path = "upload/".$ProjectID."_";
					$Files = glob($Path."*.*");
					$countuploaded = 0;
					foreach ($Files as $File)
						{
						$countuploaded++;			
						//echo'<a href="download?file='.$File.'">'.$File.'</a>';
						echo '<br>';
						}
					//echo 'Number of Deliverables uploaded: '.$countuploaded;
					$queryStr='Select * from project where ProjectId = "'.$ProjectID.'";';
					$query = $this->db->query($queryStr);
					$countpromised = 0;
					foreach($query->result() as $row)
						{
						echo '<INPUT TYPE="HIDDEN" NAME="Deliverables" VALUE="'.$row->Deliverables.'">';
						echo '<INPUT TYPE="HIDDEN" NAME="cases" VALUE="'.$row->cases.'">';
						echo '<INPUT TYPE="HIDDEN" NAME="journals" VALUE="'.$row->journals.'">';
						echo '<INPUT TYPE="HIDDEN" NAME="chapters" VALUE="'.$row->chapters.'">';
						echo '<INPUT TYPE="HIDDEN" NAME="conference" VALUE="'.$row->conference.'">';
						echo '<INPUT TYPE="HIDDEN" NAME="paper" VALUE="'.$row->paper.'">';
						echo '<INPUT TYPE="HIDDEN" NAME="books" VALUE="'.$row->books.'">';
						$countpromised = $countpromised + $row->Deliverables;
						$countpromised = $countpromised + $row->cases;
						$countpromised = $countpromised + $row->journals;
						$countpromised = $countpromised + $row->chapters;
						$countpromised = $countpromised + $row->conference;
						$countpromised = $countpromised + $row->paper;
						$countpromised = $countpromised + $row->books;
						}
					echo '<INPUT TYPE="HIDDEN" NAME="countpromised" VALUE="'.$countpromised.'">';
					echo '<INPUT TYPE="HIDDEN" NAME="countuploaded" VALUE="'.$countuploaded.'">';
					
					 $Query= $this->project_model->projectInfoNewProject($ProjectID);
					 echo '<table class="table table-bordered"> 
					
					 <thead>
							<tr>
							</tr>
					</thead>
					<tbody>';
					 $tableHeader = '';
					 foreach($Query->result() as $row)
					 {
					If ($row->cases!=0 OR  $row->journals!=0 OR $row->chapters!=0 OR $row->conference!=0 OR $row->paper!=0 OR $row->books!=0)
						{
						$tableHeader= '<TR><TD rowspan="2"><h4>ProjectTitle</h4></TD><TD rowspan="2"><h4>Work Order Number</h4></TD><TD rowspan="2"><h4>ProjectCategory</TD><TD rowspan="2"><h4>Reference Details (Category 2,3)</TD><TD rowspan="2"><h4>ProjectGrant</h4></TD><TD rowspan="2"><h4>App_Date</TD><TD rowspan="2"><h4>Project Duration</TD><TD rowspan="2"><h4>Researcher1</TD><TD rowspan="2"><h4>Researcher2</TD><TD rowspan="2"><h4>Researcher3 </h4></TD>';
						/*if ($_SESSION['usertype']==3)
						{$tableHeader= $tableHeader.'<TD><h4>Committee consulted</h4>';
						}*/
						$tableHeader= $tableHeader.'<TD><h4>Deliverables</h4></TD></TR><TR>';
						if ($row->cases!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Cases</h4></TD>';
						}
						if ($row->journals!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Journals</h4></TD>';
						}
						if ($row->chapters!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Chapters</h4></TD>';
						}
						if ($row->conference!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Conferences</h4></TD>';
						}
						if ($row->paper!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Papers</h4></TD>';
						}
						if ($row->books!=0)
						{
						 $tableHeader= $tableHeader.'<TD><h4>Books</h4></TD>';
						}
						
						$tableHeader= $tableHeader.'<TD><H4>Select</H4>	</TD></TR>';
						}
					else
						{
						$tableHeader= '<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Work Order Number</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>Reference Details (Category 2,3)</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Project Duration</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h4></TD><TD><h4>Select</h4></TD>';
						/*if ($_SESSION['usertype']==3)
						{$tableHeader= $tableHeader.'<TD><h4>Committee consulted</h4>';
						}*/
						
						$tableHeader= $tableHeader.'</TR>';
						}
					 echo $tableHeader;
					 }
					 //$tableHeader= $tableHeader.'</TR>';
					 
					 //echo '<TR><TD><h4>ProjectTitle</h4></TD><TD><h4>Work Order Id</h4></TD><TD><h4>ProjectCategory</TD><TD><h4>ProjectGrant</TD><TD><h4>App_Date</TD><TD><h4>Researcher1</TD><TD><h4>Researcher2</TD><TD><h4>Researcher3 </h1>';
					 foreach($Query->result() as $row)
					 {
						 echo '<TR><TD>';
						 print $row->ProjectTitle;
						 echo '</TD><TD>';
						 print $row->WorkOrderId;
						 echo '</TD><TD>';
						 print $row->ProjectCategory;
						 echo '</TD><TD>';
						 print $row->Reference;
						 echo '</TD><TD>';
						 print $row->ProjectGrant;
						 echo '</TD><TD>';
						 print $row->App_Date;
						 echo '</TD><TD>';
						 print $row->ProjectDuration;
						 echo '</TD><TD>';
						 print $row->Researcher1;
						 echo '</TD><TD>';
						 print $row->Researcher2;
						 echo '</TD><TD>';
						 print $row->Researcher3;
						 echo '</TD>';
						 /*if ($_SESSION['usertype']=='3' && $row->PStatus=='app_chairman_2')
						 {
							echo 'YES';
						 }
						 else if ($_SESSION['usertype']=='3' && $row->PStatus!='app_chairman_2')
						 {
							echo 'NO';
						 }*/
						 
						 
						if ($row->cases!=0)
						{
						 echo '</td><TD>';
						 print $row->cases;
						}
						if ($row->journals!=0)
						{
						 echo '</td><TD>';
						 print $row->journals;
						}
						if ($row->chapters!=0)
						{
						 echo '</td><TD>';
						 print $row->chapters;
						}
						if ($row->conference!=0)
						{
						 echo '</td><TD>';
						 print $row->conference;
						}
						if ($row->paper!=0)
						{
						 echo '</td><TD>';
						 print $row->paper;
						}
						if ($row->books!=0)
						{

						 echo '</td><TD>';

						 print $row->books;
						 echo '</td>';
						}
					echo '<TD><INPUT TYPE="RADIO" NAME="ProjectChoice" VALUE="'.$row->ProjectId.'"></TD></TR>';
					 	
					 }
					 echo '</tbody> </TABLE>';
					 
					echo'<a href="downloadfile?file=upload/'.$ProjectID.'_description">Download Project Description file</a><br><br>';
					
					echo '<p>Please enter comments (mandatory)*</p>
					<p><textarea name="comment" ></textarea></p>
					<INPUT TYPE=SUBMIT name ="RequestType" value="Request For Extension" onclick="myFunction()">
					<INPUT TYPE=SUBMIT name="RequestType" value="Request For Project Closure" onclick="checkdeliverables()">
					<INPUT TYPE=SUBMIT name="RequestType" value="View Detailed Budget">
					</FORM>';
                
				
				}
	
	}


?>

<script>
function myFunction()
{
var period = prompt("Please Enter the Extension Period in Months","0");
//if(period!=null)
document.form1.hidden1.value = period;

}
function checkdeliverables()
{
var Deliverables = document.form1.Deliverables.value;
var cases = document.form1.cases.value;
var journals = document.form1.journals.value;
var chapters = document.form1.chapters.value;
var conference = document.form1.conference.value;
var paper = document.form1.paper.value;
var books = document.form1.books.value;

var countpromised = document.form1.countpromised.value;
var countuploaded = document.form1.countuploaded.value;
if (countuploaded > 0)
	countuploaded = countuploaded - 1;
if (countpromised>countuploaded)
	{
	alert("Number of Deliverables Promised: "+countpromised+"\nNumber of Deliverables Uploaded: "+countuploaded+"\nNumber of Cases Promised: "+cases+"\nNumber of Journals Promised: "+journals+"\nNumber of Chapters Promised: "+chapters+"\nNumber of Conference Promised: "+conference+"\nNumber of Paper Promised: "+paper+"\nNumber of Books Promised: "+books+"\n\nPlease Upload the remaining deliverables promised...");
	var check = true;
	}
else 
	{
	var check = false;
	}
document.form1.hidden2.value = check;
document.form1.countpromised.value = countpromised;
document.form1.countuploaded.value = countuploaded;
}
</script>
