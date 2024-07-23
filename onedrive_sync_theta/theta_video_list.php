<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>OneDrive Video Sync With Theta</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>


<script src='https://vjs.zencdn.net/7.15.4/video.js'></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@0.12.4"></script>
<script src="https://d1ktbyo67sh8fw.cloudfront.net/js/theta.umd.min.js"></script>
<script src="https://d1ktbyo67sh8fw.cloudfront.net/js/theta-hls-plugin.umd.min.js"></script>
<script src="https://d1ktbyo67sh8fw.cloudfront.net/js/videojs-theta-plugin.min.js"></script>
  <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->

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


 <li class="navgate_no"><a title='Migrate Onedrive Video to Theta Cloud' href="onedrive_dashboard.php" style="color:white;font-size:14px;">
<button class="category_css">Migrate Onedrive Video <br> to Theta Cloud</button></a></li>


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




<script>

// start listing theta video


$(document).ready(function(){
$(".list_file_theta_btn").click(function(e) {

var theta_api_key = $('.theta_api_keyx').val();
var theta_api_secret = $('.theta_api_secretx').val();

//alert(theta_api_key);
//alert(theta_api_secret);

if(theta_api_key ==''){
alert('Theta API KEY is Empty. Wait a Little for it to Load. Also Ensure there is Internet Connection OR GO TO SETTINGS PAGE TO SET IT');
}


else if(theta_api_secret ==''){
alert('Theta API Secret is Empty. Wait a Little for it to Load. Also Ensure there is Internet Connection OR GO TO SETTINGS PAGE TO SET IT');
}

else{
$('.loader_list_t').fadeIn(400).html('<br><span style=""><img src="loader.gif" align="absmiddle">&nbsp;Please Wait.. Listing Your Theta Video Files..</span>');

var datasend = {theta_api_key:theta_api_key, theta_api_secret:theta_api_secret};

	
		$.ajax({
			
			type:'POST',
			url:'theta_video_list_action.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$(".loader_list_t").hide();
$('.result_list_t').html(msg);
$('.alerts_fades_t').delay(5000).fadeOut('slow');
	
}
			
		});




}


});
});




$(document).ready(function(){
//$('.video_btn_theta').click(function(){
$(document).on( 'click', '.video_btn_theta', function(){ 



var progress = $(this).data('progress');
var src = $(this).data('src');
var mime_type = $(this).data('mime_type');
var id = $(this).data('id');
var playback_uri = $(this).data('playback_uri');
var filename = $(this).data('filename');

//alert(playback_uri);

var theta_video =`<video id='myplayer_${id}' controls class='video-js' width='300' height='300'><source  src=${playback_uri}></video><br>`;
$('.result_theta_videox').html(theta_video);

var theta_video_name =`<h4 style='color:fuchsia'>Video Name: ${filename}</h4>`;
$('.result_theta_video_name').html(theta_video_name);

const player = videojs(`myplayer_${id}`, {
techOrder: ['theta_hlsjs', 'html5'],
readyState: 1,
paused: true,
loadstart: 1,
theta_hlsjs: {
    videoId: id,
    walletUrl: 'wss://api-wallet-service.thetatoken.org/theta/ws',
    onWalletAccessToken: null,
    hlsOpts: null
  }
});





});
});




// Theta video Code websiteEmbed

$(document).ready(function(){
//$('.video_btn_theta2').click(function(){
$(document).on( 'click', '.video_btn_theta2', function(){ 



var progress = $(this).data('progress');
var src = $(this).data('src');
var mime_type = $(this).data('mime_type');
var id = $(this).data('id');
var playback_uri = $(this).data('playback_uri');
var filename = $(this).data('filename');


//alert(playback_uri);



var theta_videox =`<iframe src='https://player.thetavideoapi.com/video/${id}' border='0' width='100%' height='100%' allowfullscreen/><br>`;


      function escapehtml() {
       var theta_video =`<iframe src='https://player.thetavideoapi.com/video/${id}' border='0' width='100%' height='100%' allowfullscreen/>`;
         let escapedData = document.createTextNode(theta_video);
         result_data.appendChild(escapedData);
      }
      escapehtml();


var theta_video_name =`<h4 style='color:fuchsia'>Video Name: ${filename}</h4>`;
$('.result_theta_video_name_code').html(theta_video_name);

});
});


// empty modalon close

// clear Modal div content on modal closef closed
$(document).ready(function(){
$('#myModal_theta2').on('hidden.bs.modal', function() {
//alert('Modal Closed');
   $('.data_clear').empty();  
//alert('Modal closed and content cleared');
 console.log("modal closed and content cleared");
 });
});

</script>

       <center><h3>View OneDrive Videos You Migrated to Theta Cloud</h3></center><br>

          </div>
        </div>

<div class='loader_fetch2'></div>
<div class='result_fetch2'></div>
<br>



<input type='hidden' class='client_id_rt'     value=''/>
<input type='hidden' class='client_secret_rt' value=''/>
<input type='hidden' class='refresh_token_rt' value=''/>


<input type='hidden' class='access_token_onedrive' value=''/>
<input type='hidden' class='theta_api_keyx' value=''/>
<input type='hidden' class='theta_api_secretx' value=''/>





<div class='loader_list_t'></div>

<br>

<button type="button" class="list_file_theta_btn btn btn-primary btn-sm" >Click to View OneDrive Videos on Theta Cloud</button>
<br>

<div class='result_list_t'></div><br>





<!-- start modal watch theta video -->


<!-- Modal -->
<div id="myModal_theta" class="modal fade  modal-appear-center2" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal_head_color">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Watch OneDrive Video from Theta Cloud...</h4>
      </div>
      <div class="modal-body">
        <p>
<h3>Watch OneDrive Video from Theta Cloud</h3><br>


  
<div class="result_theta_video_name col-sm-12"></div>

<div class="result_theta_videox col-sm-12"></div>


</p>
      </div>
      <div class="modal-footer modal_footer_color_no">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
<!-- end modal  watch theta video-->




<!-- start modal theta video code embed-->


<!-- Modal -->
<div id="myModal_theta2" class="modal fade  modal-appear-center2" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal_head_color">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Embed Theta Video Code on Website...</h4>
      </div>
      <div class="modal-body">
        <p>



<h3><center>Embed Theta Video Codes on Your Websites, Blogs, Posts etc.</center></h3>

<br>
Easily Copy and embed your generated Theta Video Codes to Your <b>Websites,  Blogs, Posts, Wordpress</b> etc. to generate Video Streaming Contents and build Traffics...

<br><br>


  
<div class="result_theta_video_name_code col-sm-12"></div>

<h4>Theta Video Web Generated Code:</h3>  <div id ="result_data" class="result_theta_videox_code data_clear col-sm-12"></div>


</p>
      </div>
      <div class="modal-footer modal_footer_color_no">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
<!-- end modal theta video code embed-->



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