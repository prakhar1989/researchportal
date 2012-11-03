<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Research and Conference Management Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" href="http://localhost/ci/static/css/bootstrap.min.css" >
    <style type="text/css">
      body {
        padding-top: 40px;
      }
    </style>
    <link href="http://localhost/ci/static/css/custom.css" rel="stylesheet" type="text/css" >
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">IIM Calcutta</a>
          <div class="nav-collapse">
            <ul class="nav pull-right">
                <li><p class="navbar-text"><i class="icon-user icon-white"></i>    UserName</p> </li>
                <li class="divider-vertical"></li>
                <li class="logout"><a id="logoutBtn" href="logout">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="mast_head">
        <div class="container">
            <h1>Research and Conference Management Portal</h1>
            <h3>Some awesome tag line.</h3>
        </div> <!-- /container -->
    </div>

    <div class="container">
        <div class="row">
            <div class="span3" id = "sidemenu">
<ul id="VerColMenu">
	<li><a title="Click to open or close this section" href="#">Research Projects</a>
		<ul>
			<li><a title="Click to open or close this section" href="http://localhost/ci/index.php/FacultyProjOngoing">View Ongoing Projects</a> </li>
			<li><a title="Click to open or close this section" href="http://localhost/ci/index.php/FacultyProjApp">Apply for Project</a> </li>
			<li><a title="Click to open or close this section" href="http://localhost/ci/index.php/FacultyProjCompleted">View Completed Projects</a> </li>
		</ul>
	</li>
	<li><a title="Click to open or close this section" href="#">Conferences</a><!--vridhi  -->
		<ul>
		    <li><a title="Click to open or close this section" href="http://localhost/ci/index.php/facultyConfApp">Apply for Conference</a> </li>
			<li><a title="Click to open or close this section" href="http://localhost/ci/index.php/facultyCongoing">Ongoing Conferences</a> </li>
			<li><a title="Click to open or close this section" href="http://localhost/ci/index.php/facultyCcompleted">Past Conferences</a> </li>
		</ul>
	</li>
	
</ul>
                
 </div>
			
            <div class="span8">
			<?php
					if ($action==0)
					{
					$myClass->load_php();
					}
					elseif ($action==1)
					{
					$myClass->load_php($msg);
					}
					
			?>
             </div>
        </div>
    </div>

    <footer>
        <p>Handcrafted by Internet Solutions Group &copy; 2012</p>
    </footer>

    <script src="http://localhost/ci/static/js/jquery.min.js"></script>
    <script src="http://localhost/ci/static/js/bootstrap.min.js"></script>
    <script src="http://localhost/ci/static/js/application.js"></script>
  </body>
</html> 
