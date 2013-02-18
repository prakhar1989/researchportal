
<head>
<style type="text/css">
* { font-family: Verdana; font-size: 96%; }
label { width: 20em; float: left; }
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
p { clear: both; }
.submit { margin-left: 12em; }
em { font-weight: bold; padding-right: 1em; vertical-align: top; }
</style>

  

</head>
<body>
 <script src="/rp/static/js/jquery-latest.js"></script>
	<script type="text/javascript" src="/rp/static/js/jquery.validate.js"></script>
	<script type="text/javascript">
  $(document).ready(function(){
    $("#commentForm").validate();
  });
  </script> 

 <form class="cmxform" id="commentForm" method="post" action="/rp/login">

   <legend>A simple comment form with submit validation and default messages</legend>
   <p>
     <label for="cname">Name</label>
     <em>*</em><input id="cname" name="name" size="25" class="required" minlength="2" />
   </p>
   <p>
     <label for="cemail">E-Mail</label>
     <em>*</em><input id="cemail" name="email" size="25"  class="required email" />
   </p>
   <p>
     <label for="curl">URL</label>
     <em>  </em><input id="curl" name="url" size="25"  class="url" value="" />
   </p>
   <p>
     <label for="ccomment">Your comment</label>
     <em>*</em><textarea id="ccomment" name="comment" cols="22"  class="required"></textarea>
   </p>
   <p>
     <input class="submit" type="submit" value="Submit"/>
   </p>

 </form>
</body>
