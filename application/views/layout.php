<!DOCTYPE html>
<!--

IIIIIIIIII   SSSSSSSSSSSSSSS         GGGGGGGGGGGGG
I::::::::I SS:::::::::::::::S     GGG::::::::::::G
I::::::::IS:::::SSSSSS::::::S   GG:::::::::::::::G
II::::::IIS:::::S     SSSSSSS  G:::::GGGGGGGG::::G
  I::::I  S:::::S             G:::::G       GGGGGG
  I::::I  S:::::S            G:::::G              
  I::::I   S::::SSSS         G:::::G              
  I::::I    SS::::::SSSSS    G:::::G    GGGGGGGGGG
  I::::I      SSS::::::::SS  G:::::G    G::::::::G
  I::::I         SSSSSS::::S G:::::G    GGGGG::::G
  I::::I              S:::::SG:::::G        G::::G
  I::::I              S:::::S G:::::G       G::::G
II::::::IISSSSSSS     S:::::S  G:::::GGGGGGGG::::G
I::::::::IS::::::SSSSSS:::::S   GG:::::::::::::::G
I::::::::IS:::::::::::::::SS      GGG::::::GGG:::G
IIIIIIIIII SSSSSSSSSSSSSSS           GGGGGG   GGGG
                                                  
-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Research and conference Management Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" href="static/css/bootstrap.min.css" >
    <link href="static/css/custom.css" rel="stylesheet" type="text/css" >
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body>

<div id="wrap">
    <div class="mast_head">
        <div class="container">
            <div id="logo"></div>
            <a class="btn logout_btn" href="logout">Logout</a>
        </div> <!-- /container -->
    </div>

    <div class="top_nav">
           <div id="tabbar" class="usual">
            <div class="container">
                <ul id="bars">
                    <li><a href="#resproj">Research Projects</a></li>
                    <li><a href="#confs">Conferences</a></li>
                </ul>
                <div id="resproj" style="display: block">
                    <ul> 
                        <li><a href="/rp/new_application">New Application</a> </li>
                        <li><a href="/rp/extension">Extension</a> </li>
						<li><a href="/rp/completion">Completion</a> </li>
                        <li><a href="/rp/ongoing">Ongoing</a> </li>
                        <li><a href="/rp/completed">Finished</a> </li>
                        <li><a href="/rp/app_chairman">Chairman</a> </li>
                        <li><a href="/rp/app_committee">Committee</a> </li>
                        <li><a href="/rp/Accounts">Accounts</a> </li>
                        <li><a href="/rp/recurring">Recurring</a> </li>
                        <li><a href="/rp/searchProject">Search</a> </li>
                    </ul>
                </div>
                <div id="confs" style="display: none">
                    <ul >
                        <li><a href="Conf_new_application">New Application</a> </li>
                        <li><a href="Conf_ongoing">Ongoing</a> </li>
                        <li><a href="Conf_completed">Completed</a> </li>
                        <li><a href="Conf_app_chairman">Chairman</a> </li>
                        <li><a href="Conf_app_committee">Committee</a> </li>
                        <li><a href="Conf_accounts">Accounts</a> </li>
                        <li><a href="Conf_search">Search</a> </li>
                        </li>
                    </ul>
                </div>
           </div> 
        </div>
    </div>

    <div class="container">
        <div>
			<?php
					if ($action==0)
					{
					$myClass->load_php();
					}
					elseif ($action==1)
					{
					$myClass->load_php($msg);
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
</div>
    <footer>
        <div id="container">
            <p>Handcrafted by Internet Solutions Group &copy; IIM Calcutta</p>
        </div>
    </footer>
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/tabs.min.js"></script>
    <script src="static/js/application.js"></script>
  </body>
</html> 
