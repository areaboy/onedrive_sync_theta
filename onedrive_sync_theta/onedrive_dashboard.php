<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>OneDrive Video Sync With Theta</title>
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




.category_css{
background-color:#B931B9;
padding: 6px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
z-index: -999;
}
.category_css:hover {
background: black;
color:white;
}	


.div_center{
    width: 100px;
    height: 100px;
    background-color: red;
    
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    
    margin: auto;
}
</style>

<script>

$(document).ready(function(){


var sess_uid_id = sessionStorage.getItem('access_uid');
var sess_email_id = sessionStorage.getItem('access_email');
$('#user_email_show').html(sess_email_id);
$('#user_uid_show').html(sess_uid_id);


if (sess_uid_id== null || sess_uid_id == undefined) {
  alert('You Must go to home Page To Access this Page');
window.location='index.php';
return false;
}



});

</script>



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



 <li class="navgate_no"><a title='Go Back To Dashboard' href="index.php" style="color:white;font-size:14px;">
<button class="category_css">Go Back To Dashboard</button></a></li>


 <li class="navgate_no"><a title='View OneDrive Videos  Migrated to Theta' href="theta_video_list.php" style="color:white;font-size:14px;">
<button class="category_css">View OneDrive Videos <br> Migrated to Theta</button></a></li>


 <li class="navgate_no"><a title='Logout' style="color:white;font-size:14px;">
<button onclick="logout()" class="category_css">Logout</button></a></li>




             

      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->




</head>

<body>
<br />

<br>
<div class="row">
     
<div class="alert alert-success">

            <h4 style='color:purple'>Welcome! <span id="user_email_show">Loading ...</span>.<h4>



<div class='loader_refresh'></div>
<div class='result_refresh'></div>

<script>

// start onedrive file listing


$(document).ready(function(){
$(".list_file_btn").click(function(e) {

var access_token_value = $('.access_token_onedrive').val();
var folder_name = $('.folder_name').val();




if(access_token_value ==''){
alert('Access  Token is Empty. Wait a Little for it to Load. Also Ensure there is Internet Connection');
}


else if(folder_name ==''){
alert('Please Enter OneDrive Folder/Directory Name that You want to Migrate its Video to Theta Cloud');
}

else{
$('.loader_listx').fadeIn(400).html('<br><span style=""><img src="loader.gif" align="absmiddle">&nbsp;Please Wait.. Listing Onedrive Video Files..</span>');

var datasend = {access_token_value:access_token_value, folder_name:folder_name};

	
		$.ajax({
			
			type:'POST',
			url:'onedrive_video_list.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$(".loader_listx").hide();
$('.result_listx').html(msg);
$('.alerts_fadesx').delay(5000).fadeOut('slow');
	
}
			
		});




}


});
});



//end onedrive file listing








//Migrate Onedrive video to Theta Cloud Starts here

$(document).ready(function(){
$(document).on( 'click', '.file_migrate_btn', function(){ 

var file = $(this).data('file');
var filename = $(this).data('filename');
var id = $(this).data('id');

var theta_api_keyx = $('.theta_api_keyx').val();
var theta_api_secretx = $('.theta_api_secretx').val();


var mime_type = $(this).data('mime_type');


// start sending data to firebase.

if(file ==''){
alert('Video File to be Migrated Cannot be Empty....');
}

else if(theta_api_keyx ==''){
alert('Theta API Key Cannot be Empty. Please Set it on Settings Pages...');
}

else if(theta_api_secretx ==''){
alert('Theta API Secret Cannot be Empty. Please Set it on Settings Pages...');
}
else{



$("#loaderlx_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><img src="loader.gif" align="absmiddle">&nbsp;Please Wait.. Migrating Video to Theta Cloud</div>');

var datasend = {file:file, filename:filename, theta_api_keyx:theta_api_keyx, theta_api_secretx:theta_api_secretx, mime_type:mime_type, id:id};
	
		$.ajax({
			
			type:'POST',
			url:'theta_onedrive_video_migrate_firebase.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){
$('#loaderlx_'+id).hide();
$('#resultlx_'+id).html(msg);
//$('#alerts_fadesx_'+id).delay(5000).fadeOut('slow');
	
}
			
		});




}







});
});
//Migrate Onedrive video to Theta Cloud Ends  here





// Refresh Token. Get a new Onedrive Access Token

$(document).ready(function(){
//$("#refresh_token_rt_btn").click(function(e) {
$(document).on( 'click', '.refresh_token_rt_btn', function(){ 


var client_id =  $('.client_id_rt').val();
var client_secret = $('.client_secret_rt').val();
var refresh_token = $('.refresh_token_rt').val();



if(refresh_token ==''){
alert('Refresh Token is Empty. Please go to Settings Page and perform all Steps there...');
}

else{
$('.loader_rtt').fadeIn(400).html('<br><span style=""><img src="loader.gif" align="absmiddle">&nbsp;Please Wait Refreshing OneDrive Token in Progress..</span>');

var datasend = {client_id:client_id, client_secret:client_secret, refresh_token:refresh_token};

	
		$.ajax({
			
			type:'POST',
			url:'onedrive_refresh_token_generate_firebase.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$(".loader_rtt").hide();
$('.result_rtt').html(msg);



	
}
			
		});




}


});
});






</script>





       <center><h3>OneDrive Video Migration to Theta Cloud</h3></center><br>
Easily Migrates all Your OneDrive Videos to Theta Video Cloud System......




          </div>
        </div>

<div class='loader_fetch'></div>
<div class='result_fetch'></div>
<br>



<input type='hidden' class='client_id_rt'     value=''/>
<input type='hidden' class='client_secret_rt' value=''/>
<input type='hidden' class='refresh_token_rt' value=''/>


<input type='hidden' class='access_token_onedrive' value=''/>
<input type='hidden' class='theta_api_keyx' value=''/>
<input type='hidden' class='theta_api_secretx' value=''/>

Please Enter OneDrive Folder/Directory Name that You want to Migrate its Video to Theta Cloud. <br>
You can get the Folder name by visiting your OneDrive Site at

<a href='https://onedrive.live.com' target='_blank' style='font-size:18px;'> <b>https://onedrive.live.com</b></a><br><br>


 <div class="form-group">
              <label>OneDrive Folder/Directory Name: </label>
 <input  type="text" class="col-sm-12 form-control folder_name"  placeholder="OneDrive Folder/Directory Name"  />
</div>

<br>

<div class='loader_listx'></div>

<br><br>

<button type="button" class="list_file_btn btn btn-primary btn-sm" id="list_file_btn" >List OneDrive Files</button>
<br>

<div class='result_listx'></div><br>



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