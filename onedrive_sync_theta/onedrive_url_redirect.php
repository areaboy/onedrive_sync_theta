<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>OneDrive Sync For Theta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>



<style>

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}



  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color: #B931B9;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }



  
.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}



.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.dropdown_bgcolor{

background: #B931B9;
color:white;
}

.dropdown_dashedline{
 border-bottom: 2px dotted white;
}

.navgate101:hover{
background:fuchsia;
color:white;

}




.theta_css{
 color: black;
 background-color: #ccc;
 padding:8px;
 border:none;
border-radius:20%;

}

.theta_css:hover{
 color: black;
 background-color: orange;

}



/* make modal appear at center of the page */
.modal-appear-center {
margin-top: 25%;
//width:40%;
}


/* make modal appear at center of the page */
.modal-appear-center1 {
margin-top: 15%;
//width:40%;
}
.modal-appear-center2 {
margin-top: 10%;
//width:40%;
}



.modal_head_color{
background-color: #B931B9;
padding: 6px;
color:white;
}


.modal_footer_color{
background-color: #B931B9;
padding: 6px;
color:white;
}


</style>





<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo12.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">



      <ul class="nav navbar-nav navbar-right">




      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->




</head>

<body>
<br />


<div class="row">
     
<div class="alert alert-success">

        <a class="btn btn-danger pull-right"  style='cursor:pointer;' onclick="logout()">Logout</a>
<a href='index.php' class="btn btn-primary pull-right"  style='cursor:pointer;'>Go Back to Dashboard</a>


       <center><h3>Generate OneDrive Access Token & Refresh Token</h3></center><br>

   
<span  style='color:red;'><b>NOTE:</b>  You can generate this Token Once and the  generated Access Token and Refresh token will be stored on Firebase DB</span>

<br>
          </div>
        </div>



<?php



$code= $_GET['code'];
if($code !=''){

//echo "<div style='background:green;color:white;padding:6px;border:none;'>Auth Code Successfully Generated... </div>";
}else{

echo "<div style='background:red;color:white;padding:6px;border:none;'>Auth Code Generation Failed. Please Go Back to Dashboard and try again or Contact Site Admin</div>";

}

?>



<script>
$(document).ready(function(){
$("#auth_btn").click(function(e) {

e.preventDefault();

var client_id = $('#client_id_auth').val();
var client_secret = $('#client_secret_auth').val();
var auth_code = $('#auth_code').val();
var redirect_url = $('#redirect_url_auth').val();

if(auth_code ==''){
alert('OneDrive Generated Auth Code is Empty.');
}

else if(client_id ==''){
alert('CLIENT Id cannot be Empty. Please Ensure that you completed Setup Step 1.');
}

else if(client_secret_auth ==''){
alert('Client Secret cannot be Empty. Please Ensure that you completed Setup Step 1.');
}
else{
$('#loader_auth').fadeIn(400).html('<br><span style=""><img src="loader.gif" align="absmiddle">&nbsp;Generating OneDrive Token in Progress..</span>');

var datasend = {client_id:client_id, client_secret:client_secret, auth_code:auth_code, redirect_url:redirect_url};

	
		$.ajax({
			
			type:'POST',
			url:'onedrive_token_generate_firebase.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader_auth").hide();
$('.result_auth').html(msg);
	
}
			
		});




}


});
});

</script>




  <div class='row'>
      <form id="">

 
<input class="client_idx" type="hidden" id="client_id_auth" value=''/>

<input class="client_secretx" type="hidden"  id="client_secret_auth" value=''/>

<input class="redirect_urlx" type="hidden"  id="redirect_url_auth"  value=''/>

<input type="hidden"  id="auth_code"  value='<?php echo $code; ?>'/>




<div class="col-sm-12">
<div id='loader_auth' class="col-sm-12"></div>
<div id='loader_send_tokenx' class="col-sm-12"></div>

<div class='result_auth' class="col-sm-12"></div>

<br><br>
        <button id="auth_btn" type="submit" class="btn btn-primary">Generate OneDrive Token & Send to Firebase DB Now...</button>
</div>


      </form>
   
</div>






</body>



    <!-- firebase scripts -->
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-database.js"></script>
  

<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>

<!-- Noty -->
<link href="lib/noty/noty.css" rel="stylesheet">
<link href="lib/noty/nest.css" rel="stylesheet">
<script src="lib/noty/noty.js" type="text/javascript"></script>

<!-- Firebase Config -->
<script type="text/javascript" src="./js/config/config.js"></script>
  <script src="index_firebase_onedrive.js"></script>

<!-- Functions -->
<script type="text/javascript" src="./js/notification.js"></script>
<script type="text/javascript" src="./js/login.js"></script>
<script type="text/javascript" src="./js/logout2.js"></script>
<script type="text/javascript" src="./js/register.js"></script>
<script type="text/javascript" src="./js/sendVerification.js"></script>
<script type="text/javascript" src="./js/authState.js"></script>





</html>