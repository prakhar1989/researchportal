<!DOCTYPE html>
<html lang="en">
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

  <head>
    <meta charset="utf-8">
    <title>Research and conference Management Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" href="http://localhost/rp/static/css/bootstrap.min.css" >
    <link href="http://localhost/rp/static/css/custom.css" rel="stylesheet" type="text/css" >
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>
    body {
        background: #ECEEF1;
    }
    #logo {
        float: none;
        margin: 20px auto;
    }
    .form-signin {
        text-align: left;
        max-width: 293px;
        padding: 34px 44px;
        margin: 94px auto 14px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
    
    #logo_login {
        width: 440px;
        position: relative;
        left: 109px;
        top: 65px;

    }
      h2 { color: #DD4A38; }
    small { margin: 0px auto; font-size: 15px; color: #999;}

    </style>
  </head>
  <body>
        <div class="bg_iimc">
            <div id="logo_login"></div>
            <form class="form-signin" name="login" id="login" method="POST" action="login/chklogin">
                <h2 class="form-signin-heading">Sign In</h2>
                <input type="text" name="username" class="input-block-level" placeholder="Username">
                <input type="password" name="password" class="input-block-level" placeholder="Password">
                <input type="submit" name="submit" value="Sign in">
              </form>
            <small>Handcrafted by the Internet Solutions Group</small>
        </div>
            
    </div>
    <script src="http://localhost/rp/static/js/jquery.min.js"></script>
    <script src="http://localhost/rp/static/js/bootstrap.min.js"></script>
    <script src="http://localhost/rp/static/js/application.js"></script>
  </body>
</html> 
