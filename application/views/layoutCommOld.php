<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Research and conference Management Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" href="http://localhost/rp/static/css/bootstrap.min.css" >
    <style type="text/css">
      body {
        padding-top: 40px;
      }
    </style>
    <link href="http://localhost/rp/static/css/custom.css" rel="stylesheet" type="text/css" >
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
                <li><p class="navbar-text"><i class="icon-user icon-white"></i>    UserName </p> </li>
                <li class="divider-vertical"></li>
                <li class="logout"><a id="logoutBtn" href="#">Logout</a></li>
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
			<li><a title="Click to open or close this section" href="new_application">New Application</a> </li>
			<li><a title="Click to open or close this section" href="ongoing">Ongoing</a> </li>
			<li><a title="Click to open or close this section" href="completed">Completed</a> </li>
			<li><a title="Click to open or close this section" href="app_chairman">Chairman</a> </li>
			<li><a title="Click to open or close this section" href="app_admin">Admin</a> </li>
			<li><a title="Click to open or close this section" href="searchProject">Search</a> </li>
		</ul>
	</li>
	<li><a title="Click to open or close this section" href="#">Conference</a>
		<ul>
			<li><a title="Click to open or close this section" href="new_Capplication">New Application</a> </li>
			<li><a title="Click to open or close this section" href="Congoing">Ongoing</a> </li>
			<li><a title="Click to open or close this section" href="Ccompleted">Completed</a> </li>
			<li><a title="Click to open or close this section" href="Capp_chairman">Chairman</a> </li>
			<li><a title="Click to open or close this section" href="Capp_admin">Admin</a> </li>
			<li><a title="Click to open or close this section" href="searchConference">Search</a> </li>
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
					elseif ($action==2)
					{
					$myClass->approveMsg($msg);
					}
					elseif ($action==3)
					{
					$myClass->load_search($searchBy,$searchValue);
					}
					
			?>
             </div>
        </div>
    </div>

    <footer>
        <p>Handcrafted by Internet Solutions Group &copy; 2012</p>
    </footer>

    <script src="http://localhost/rp/static/js/jquery.min.js"></script>
    <script src="http://localhost/rp/static/js/bootstrap.min.js"></script>
    <script src="http://localhost/rp/static/js/application.js"></script>
  </body>
</html> 
