<?PHP
class Conf_search extends CI_Controller{
	
	function index() {
			$data['myClass']=$this;
			$data['action']=0;
			$this->load->view('layout',$data);
	}
	//Takes input for the search and calls Search function
	function load_php() {
			echo '<h1>Search</h1>';
            echo "<p>Please select filter</p>";
			echo '<FORM name="searchConference" method= POST action="SearchConference/search">';
            echo '<ul class="radiolist">';
            echo '<li><input type="radio" name="searchBy" value="ConferenceId" /> ConferenceId </li>
                <li><input type="radio" name="searchBy" value="Researcher" /> Researcher </li>
                <li><input type="radio" name="searchBy" value="ConferenceTitle" /> ConferenceTitle </li>
                <li><input type="radio" name="searchBy" value="ConferenceCategory" /> Conference Category </li>
                <li><input type="radio" name="searchBy" value="ConferenceGrant" /> Conference Grant </li>
                <li><input type="radio" name="searchBy" value="CStatus" /> Status</li></ul>';
			echo '<input type=text class="searchbox" name="searchValue" placeholder="Enter Search Term">';
			echo '<input type= submit value= "Search" name="search">'; 
		    echo '</FORM>';
	}
	
	
	// Loads the layout 
	function search()
	{
			$data['myClass']=$this;
		    $data['action']=3;
			$data['searchBy']=$_POST['searchBy'];
			$data['searchValue']=$_POST['searchValue'];
		    $this->load->view('layout',$data);	
	}
	
	//Loads the Project Model and searches for the projec
	function load_search($searchBy,$searchValue)
	{
		  
		  $this->load->model('conference_model');
		 // echo 'Search by '.$searchBy.' value = '.$searchValue;
		  $Query= $this->conference_model->conferenceSearch($searchBy,$searchValue);
	      
		  echo'
		  <FORM METHOD=POST ACTION="conferenceDetails">
		  <TABLE width="90%" border="1" bordercolor="#993300" align="center" cellpadding="3" cellspacing="1" class="table_border_both_left"><tr  class="heading_table_top"> 
                     ';
			foreach($Query->result() as $row)
			 {
				 echo '<TR><TD>';
				 print $row->ConferenceTitle;
				 echo '</TD><TD>';
				 print $row->ConferenceId;
				 echo '</TD><TD>';
				 print $row->App_Date;
				 echo '</TD><TD>';
				 print $row->Researcher1;
				 echo '<TD><INPUT TYPE="RADIO" NAME="Choice1" VALUE="'.$row->ConferenceId.'"></TD></TR>';
			 }
					 
			 echo '</TABLE>
			<INPUT TYPE=SUBMIT value="Show Details">
			</FORM>';
	}
    

}
?>
